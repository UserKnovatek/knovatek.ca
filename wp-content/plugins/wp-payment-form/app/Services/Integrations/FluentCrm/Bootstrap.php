<?php

namespace WPPayForm\App\Services\Integrations\FluentCrm;

use FluentCrm\App\Models\CustomContactField;
use FluentCrm\App\Models\Lists;
use FluentCrm\App\Models\Subscriber;
use FluentCrm\App\Models\Tag;
use FluentCrm\Includes\Helpers\Arr;
use WPPayForm\App\Services\ConditionAssesor;
use WPPayForm\App\Services\Integrations\IntegrationManager;
use WPPayForm\Framework\Foundation\App;

class Bootstrap extends IntegrationManager
{
    public $hasGlobalMenu = false;

    public $disableGlobalSettings = 'yes';

    public function __construct()
    {
        parent::__construct(
            App::getInstance(),
            'FluentCRM',
            'fluentcrm',
            '_wppayform_fluentcrm_settings',
            'fluentcrm_feeds',
            10
        );

        $this->logo = WPPAYFORM_URL . 'assets/images/integrations/fluentcrm-logo.png';

        $this->description = __('Connect FluentCRM with WPPayForm and subscribe a contact when a form is submitted.', 'wppayform');

        $this->registerAdminHooks();

        // add_filter('wppayform_notifying_async_fluentcrm', '__return_false');
    }

    public function pushIntegration($integrations, $formId)
    {
        $integrations[$this->integrationKey] = [
            'title' => $this->title . ' Integration',
            'logo' => $this->logo,
            'is_active' => $this->isConfigured(),
            'configure_title' => __('Configuration required!', 'wppayform'),
            'global_configure_url' => '#',
            'configure_message' => __('FluentCRM is not configured yet! Please configure your FluentCRM api first', 'wppayform'),
            'configure_button_text' => __('Set FluentCRM', 'wppayform')
        ];
        return $integrations;
    }

    public function getIntegrationDefaults($settings, $formId)
    {
        return [
            'name' => '',
            'full_name' => '',
            'email' => '',
            'other_fields' => [
                [
                    'item_value' => '',
                    'label' => ''
                ]
            ],
            'list_id' => '',
            'tag_ids' => [],
            'tag_ids_selection_type' => 'simple',
            'tag_routers' => [],
            'skip_if_exists' => false,
            'double_opt_in' => false,
            'conditionals' => [
                'conditions' => [],
                'status' => false,
                'type' => 'all'
            ],
            'enabled' => true
        ];
    }

    public function getSettingsFields($settings, $formId)
    {
        $fieldOptions = [];
        foreach (Subscriber::mappables() as $key => $column) {
            $fieldOptions[$key] = $column;
        }

        foreach ((new CustomContactField)->getGlobalFields()['fields'] as $field) {
            $fieldOptions[$field['slug']] = $field['label'];
        }

        unset($fieldOptions['email']);
        unset($fieldOptions['first_name']);
        unset($fieldOptions['last_name']);

        return [
            'fields' => [
                [
                    'key' => 'name',
                    'label' => __('Feed Name', 'wppayform'),
                    'required' => true,
                    'placeholder' => __('Your Feed Name', 'wppayform'),
                    'component' => 'text'
                ],
                [
                    'key' => 'list_id',
                    'label' => __('FluentCRM List', 'wppayform'),
                    'placeholder' => __('Select FluentCRM List', 'wppayform'),
                    'tips' => __('Select the FluentCRM List you would like to add your contacts to.', 'wppayform'),
                    'component' => 'select',
                    'required' => true,
                    'options' => $this->getLists(),
                ],
                [
                    'key' => 'CustomFields',
                    'require_list' => false,
                    'label' => __('Primary Fields', 'wppayform'),
                    'tips' => __('Associate your FluentCRM merge tags to the appropriate WPPayForm fields by selecting the appropriate form field from the list.', 'wppayform'),
                    'component' => 'map_fields',
                    'field_label_remote' => __('FluentCRM Field', 'wppayform'),
                    'field_label_local' => __('Form Field', 'wppayform'),
                    'primary_fileds' => [
                        [
                            'key' => 'email',
                            'label' => __('Email Address', 'wppayform'),
                            'required' => true,
                            'input_options' => 'emails'
                        ],
                        [
                            'key' => 'full_name',
                            'label' => __('Full Name', 'wppayform'),
                            'help_text' => __('If First Name & Last Name is not available full name will be used to get first name and last name', 'wppayform')
                        ]
                    ]
                ],
                [
                    'key' => 'other_fields',
                    'require_list' => false,
                    'label' => __('Other Fields', 'wppayform'),
                    'tips' => 'Select which WPPayForm fields pair with their<br /> respective FlunentCRM fields.',
                    'component' => 'dropdown_many_fields',
                    'field_label_remote' => __('FluentCRM Field', 'wppayform'),
                    'field_label_local' => __('Form Field', 'wppayform'),
                    'options' => $fieldOptions
                ],
                [
                    'key' => 'tag_ids',
                    'require_list' => false,
                    'label' => __('Contact Tags', 'wppayform'),
                    'placeholder' => __('Select Tags', 'wppayform'),
                    'component' => 'selection_routing',
                    'simple_component' => 'select',
                    'routing_input_type' => 'select',
                    'routing_key' => 'tag_ids_selection_type',
                    'settings_key' => 'tag_routers',
                    'is_multiple' => true,
                    'labels' => [
                        'choice_label' => __('Enable Dynamic Tag Selection', 'wppayform'),
                        'input_label' => '',
                        'input_placeholder' => __('Set Tag', 'wppayform')
                    ],
                    'options' => $this->getTags()
                ],
                [
                    'key' => 'skip_if_exists',
                    'require_list' => false,
                    'checkbox_label' => __('Skip if contact already exist in FluentCRM', 'wppayform'),
                    'component' => 'checkbox-single'
                ],
                [
                    'key' => 'double_opt_in',
                    'require_list' => false,
                    'checkbox_label' => __('Enable Double Option for new contacts', 'wppayform'),
                    'component' => 'checkbox-single'
                ],
                [
                    'require_list' => false,
                    'key'          => 'conditionals',
                    'label'        => __('Conditional Logics', 'fluent-crm'),
                    'tips'         => __('Allow FluentCRM integration conditionally based on your submission values', 'fluent-crm'),
                    'component'    => 'conditional_block'
                ],
                [
                    'require_list' => false,
                    'key' => 'enabled',
                    'label' => 'Status',
                    'component' => 'checkbox-single',
                    'checkbox_label' => __('Enable This feed', 'wppayform')
                ]
            ],
            'button_require_list' => false,
            'integration_title' => $this->title
        ];
    }

    public function getMergeFields($list, $listId, $formId)
    {
        return [];
    }

    protected function getLists()
    {
        $lists = Lists::get();
        $formattedLists = [];
        foreach ($lists as $list) {
            $formattedLists[$list->id] = $list->title;
        }
        return $formattedLists;
    }

    protected function getTags()
    {
        $tags = Tag::get();
        $formattedTags = [];
        foreach ($tags as $tag) {
            $formattedTags[strval($tag->id)] = $tag->title;
        }
        return $formattedTags;
    }

    /*
     * Form Submission Hooks Here
     */
    public function notify($feed, $formData, $entry, $formId)
    {
        $data = $feed['processedValues'];
        $contact = Arr::only($data, ['email']);

        if (!is_email(Arr::get($contact, 'email'))) {
            $contact['email'] = Arr::get($formData, 'customer_email');
        }

        $fullName = Arr::get($data, 'full_name');
        if ($fullName) {
            $nameArray = explode(' ', $fullName);
            if (count($nameArray) > 1) {
                $contact['last_name'] = array_pop($nameArray);
                $contact['first_name'] = implode(' ', $nameArray);
            } else {
                $contact['first_name'] = $fullName;
            }
        }

        foreach (Arr::get($data, 'other_fields') as $field) {
            if ($field['item_value']) {
                $contact[$field['label']] = $field['item_value'];
            }
        }

        if ($entry->ip) {
            $contact['ip'] = $entry->ip;
        }

        if (!is_email($contact['email'])) {
            $this->addLog(
                __('FluentCRM API called skipped because no valid email available', 'wppayform'),
                $formId,
                $entry->id,
                'failed'
            );
            return false;
        }

        $subscriber = Subscriber::where('email', $contact['email'])->first();

        if ($subscriber && Arr::isTrue($data, 'skip_if_exists')) {
            $this->addLog(
                __('Contact creation has been skipped because contact already exist in the database, Subscriber #', 'wppayform') . $subscriber->id,
                $formId,
                $entry->id,
                'failed'
            );
            return false;
        }

        if ($subscriber) {
            if ($subscriber->ip && isset($contact['ip'])) {
                unset($contact['ip']);
            }
        }

        $user = get_user_by('email', $contact['email']);

        if ($user) {
            $contact['user_id'] = $user->ID;
        }

        $tags = $this->getSelectedTagIds($data, $formData, 'tag_ids');

        if ($tags) {
            $contact['tags'] = $tags;
        }

        if (!$subscriber) {
            if (empty($contact['source'])) {
                $contact['source'] = 'WPPayForms';
            }

            if (Arr::isTrue($data, 'double_opt_in')) {
                $contact['status'] = 'pending';
            } else {
                $contact['status'] = 'subscribed';
            }

            if ($listId = Arr::get($data, 'list_id')) {
                $contact['lists'] = [$listId];
            }

            $subscriber = FluentCrmApi('contacts')->createOrUpdate($contact, false, false);
            if ($subscriber->status == 'pending') {
                $subscriber->sendDoubleOptinEmail();
            }

            $contactUrl = admin_url('admin.php?page=fluentcrm-admin#/subscribers/' . $subscriber->id);
            $content = __('Contact has been created in FluentCRM. Contact ID: ', 'wppayform') . "<a href='$contactUrl' >$subscriber->id</a>";
            $this->addLog(
                $content,
                $formId,
                $entry->id,
                'success'
            );

            do_action('fluentcrm_contact_added_by_wppayform', $subscriber, $entry, $formId, $feed);
        } else {
            if ($listId = Arr::get($data, 'list_id')) {
                $contact['lists'] = [$listId];
            }

            $hasDouBleOptIn = Arr::isTrue($data, 'double_opt_in');

            $forceSubscribed = !$hasDouBleOptIn && ($subscriber->status != 'subscribed');

            if ($forceSubscribed) {
                $contact['status'] = 'subscribed';
            }

            $subscriber = FluentCrmApi('contacts')->createOrUpdate($contact, $forceSubscribed, false);

            if ($hasDouBleOptIn && ($subscriber->status == 'pending' || $subscriber->status == 'unsubscribed')) {
                $subscriber->sendDoubleOptinEmail();
            }

            do_action('fluentcrm_contact_updated_by_wppayform', $subscriber, $entry, $formId, $feed);

            $this->addLog(
                __('FleuntCRM Contact added Successfully on', 'wppayform') . $feed['settings']['name'],
                $formId,
                $entry->id,
                'success'
            );
        }
    }

    public function isConfigured()
    {
        return true;
    }

    public function isEnabled()
    {
        return true;
    }

    /*
     * We will remove this in future
     */
    protected function getSelectedTagIds($data, $inputData, $simpleKey = 'tag_ids', $routingId = 'tag_ids_selection_type', $routersKey = 'tag_routers')
    {
        $routing = Arr::get($data, $routingId, 'simple');
        if (!$routing || $routing == 'simple') {
            return Arr::get($data, $simpleKey, []);
        }

        $routers = Arr::get($data, $routersKey);
        if (empty($routers)) {
            return [];
        }

        return $this->evaluateRoutings($routers, $inputData);
    }

    /*
     * We will remove this in future
     */
    protected function evaluateRoutings($routings, $inputData)
    {
        $validInputs = [];
        foreach ($routings as $routing) {
            $inputValue = Arr::get($routing, 'input_value');
            if (!$inputValue) {
                continue;
            }
            $condition = [
                'conditionals' => [
                    'status' => true,
                    'is_test' => true,
                    'type' => 'any',
                    'conditions' => [
                        $routing
                    ]
                ]
            ];

            if (ConditionAssesor::evaluate($condition, $inputData)) {
                $validInputs[] = $inputValue;
            }
        }

        return $validInputs;
    }
}
