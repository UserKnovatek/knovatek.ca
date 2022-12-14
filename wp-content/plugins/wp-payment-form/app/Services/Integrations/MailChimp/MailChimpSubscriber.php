<?php

namespace WPPayForm\App\Services\Integrations\MailChimp;

use WPPayForm\App\Services\ConditionAssesor;
use WPPayForm\Framework\Support\Arr;

// use WPPayForm\App\Services\Integrations\LogResponseTrait;


trait MailChimpSubscriber
{
    // use LogResponseTrait;

    /**
     * Enabled MailChimp feed settings.
     *
     * @var array $feeds
     */
    protected $feeds = [];

    /**
     * Required for api response logging
     * @var string
     */
    protected $metaKey = 'wppayform_mailchimp_feed';

    /**
     * Form input data.
     *
     * @param array $formData
     */
    public function setApplicableFeeds($formData)
    {
        $feeds = $this->getAll();

        foreach ($feeds as $feed) {
            if ($this->isApplicable($feed, $formData)) {
                $email = Arr::get(
                    $formData,
                    Arr::get($feed->formattedValue, 'fieldEmailAddress')
                );

                if (is_string($email) && is_email($email)) {
                    $feed->formattedValue['fieldEmailAddress'] = $email;

                    $this->feeds[] = $feed;
                }
            }
        }
    }

    /**
     * Determine if the feed is eligible to be applied.
     *
     * @param $feed
     * @param $formData
     *
     * @return bool
     */
    public function isApplicable(&$feed, &$formData)
    {
        return Arr::get($feed->formattedValue, 'enabled') &&
            Arr::get($feed->formattedValue, 'list_id') &&
            ConditionAssesor::evaluate($feed->formattedValue, $formData);
    }

    /**
     * Subscribe a user to the list on form submission.
     *
     * @param $feed
     * @param $formData
     * @param $entry
     * @param $form
     * @return array|bool|false
     * @throws \Exception
     */
    public function subscribe($feed, $formData, $entry, $formId)
    {
        $feedData = $feed['processedValues'];

        if (!is_email($feedData['fieldEmailAddress'])) {
            $feedData['fieldEmailAddress'] = Arr::get($formData, $feedData['fieldEmailAddress']);
        }

        if (!is_email($feedData['fieldEmailAddress'])) {
            return false;
        }

        $mergeFields = array_filter(Arr::get($feedData, 'merge_fields'));
        $status = Arr::isTrue($feedData, 'doubleOptIn') ? 'pending' : 'subscribed';

        $listId = $feedData['list_id'];

        $arguments = [
            'email_address' => $feedData['fieldEmailAddress'],
            'status_if_new' => $status,
            'double_optin' => Arr::isTrue($feedData, 'doubleOptIn'),
            'vip' => Arr::isTrue($feedData, 'markAsVIP'),
        ];

        if ($mergeFields) {
            $arguments['merge_fields'] = (object)$mergeFields;
        }

        if ($entry->ip) {
            $arguments['ip_signup'] = $entry->ip;
        }

        $tags = $this->getSelectedTagIds($feedData, $formData, 'tags');
        if (!is_array($tags)) {
            $tags = explode(',', $tags);
        }

        $tags = array_map('trim', $tags);
        $tags = array_filter($tags);

        //explode dynamic commas values to array
        $tagsFormatted = [];
        foreach ($tags as $tag) {
            if (strpos($tag, ',') !== false) {
                $innerTags = explode(',', $tag);
                foreach ($innerTags as $t) {
                    $tagsFormatted[] = $t;
                }
            } else {
                $tagsFormatted[] = $tag;
            }
        }
        if ($tags) {
            $arguments['tags'] = array_map('trim', $tagsFormatted);
        }

        $note = '';
        if ($feedData['note']) {
            $note = esc_attr($feedData['note']);
        }

        $arguments['interests'] = [];

        $contactHash = md5(strtolower($arguments['email_address']));

        $existingMember = $this->getMemberByEmail($listId, $arguments['email_address']);

        $isNew = true;
        if (!empty($existingMember['id'])) {
            $isNew = false;
            if (Arr::isTrue($feedData, 'resubscribe')) {
                //for resubscribing unsubscribed contact ; status = subscribed || pending
                $arguments['status'] = $status;
            }
            // We have members so we can merge the values
            if (apply_filters('wppayform_mailchimp_keep_existing_interests', true, $formId)) {
                $arguments['interests'] = Arr::get($existingMember, 'interests', []);
            }

            if (isset($arguments['tags'])) {
                if (apply_filters('wppayform_mailchimp_keep_existing_tags', true, $formId)) {
                    $tags = Arr::get($existingMember, 'tags', []);
                    $tagNames = [];
                    foreach ($tags as $tag) {
                        $tagNames[] = $tag['name'];
                    }
                    $allTags = wp_parse_args($arguments['tags'], $tagNames);
                    $arguments['tags'] = array_unique($allTags);
                }
            }
        }

        if (Arr::get($feedData, 'interest_group.sub_category') &&
            Arr::get($feedData, 'interest_group.category')
        ) {
            $interestGroup = Arr::get($feedData, 'interest_group.sub_category');
            $arguments['interests'][$interestGroup] = true;
        }

        $arguments = array_filter($arguments);
        $settings = get_option('_wppayform_mailchimp_details');
        $MailChimp = new MailChimp($settings['apiKey']);
        $endPoint = 'lists/' . $listId . '/members/' . $contactHash;


        $result = $MailChimp->put($endPoint, $arguments);

        if ($result && !is_wp_error($result) && isset($result['id'])) {
            $noteEnpoint = 'lists/' . $listId . '/members/' . $contactHash . '/notes';
            if ($note) {
                $MailChimp->post($noteEnpoint, [
                    'note' => $note
                ]);
            }

            // Let's sync the tags
            if (!$isNew && isset($arguments['tags'])) {
                $currentTags = [];
                foreach ($result['tags'] as $tag) {
                    $currentTags[] = $tag['name'];
                }
                $newTags = $arguments['tags'];
                sort($newTags);
                sort($currentTags);

                if ($newTags != $currentTags) {
                    $tagEnpoint = 'lists/' . $listId . '/members/' . $contactHash . '/tags';
                    if ($newTags) {
                        $formattedtags = [];
                        foreach ($newTags as $tag) {
                            $formattedtags[] = [
                                'name' => $tag,
                                'status' => 'active'
                            ];
                        }
                        $MailChimp->post($tagEnpoint, [
                            'tags' => $formattedtags
                        ]);
                    }
                }
            }
            return true;
        }

        return $result;
    }

    /**
     * Get a specific MailChimp list member.
     *
     */
    public function getMemberByEmail($list_id, $email_address)
    {
        $settings = get_option('_wppayform_mailchimp_details');
        $MailChimp = new MailChimp($settings['apiKey']);
        // Prepare subscriber hash.
        $subscriber_hash = md5(strtolower($email_address));
        return $MailChimp->get('lists/' . $list_id . '/members/' . $subscriber_hash);
    }
}
