<?php

namespace WPPayForm\App\Services;

use WPPayForm\App\Modules\Entry\Entry;
use WPPayForm\App\Modules\Entry\MetaData;
use WPPayForm\Framework\Support\Arr;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Placeholder Parser for a submission
 * @since 1.0.0
 */
class PlaceholderParser
{
    /**
     * @param $string
     * @param $submission
     *
     * Possible Submission Parameters: [can be found on submission.ATRRIBUTE_NAME]
     * {submission.id}
     * {submission.submission_hash}
     * {submission.customer_name}
     * {submission.customer_email}
     * {submission.payment_total}
     * {submission.payment_status}
     *
     * Possible Input Item Parameters [can be found on submission.form_data_formatted.INPUTNAME]
     * {input.INPUTNAME}
     *
     * Possible Product Items [can be found on submission -> wpf_order_items  where submission_id = submission.id and parent_holder = INPUTNAME]
     * {payment_item.INPUTNAME}
     *
     * Possible Quantity items: [can be found on submission.form_data_raw.INPUTNAME]
     * {quantity.INPUTNAME}
     */
    public static function parse($string, $submission)
    {
        $parsables = self::parseShortcode($string);
        if (!$parsables) {
            return $string;
        }
        $formattedParsables = array();
        foreach ($parsables as $parsableKey => $parsable) {
            // Get Parsed Group
            $group = strtok($parsable, '.:');
            $itemExt = str_replace(array($group . '.', $group . ':'), '', $parsable);
            $formattedParsables[$group][$parsableKey] = $itemExt;
        }

        $entry = new Entry($submission);

        $submissionPlaceholders = Arr::only($formattedParsables, array(
            'input', 'quantity', 'payment_item', 'submission'
        ));


        $submissionParseItems = self::parseInpuFields($submissionPlaceholders, $entry);


        $wpPlaceholders = Arr::only($formattedParsables, array(
            'wp', 'post_meta', 'user_meta', 'querystring', 'other'
        ));

        $wpParseItems = self::parseWPFields($wpPlaceholders, $entry);

        $parseItems = array_merge($submissionParseItems, $wpParseItems);

        $parseItems = apply_filters('wppayform/submission_placeholders_parsed', $parseItems, $submission, $parsables);

        $formatedParsedItems = [];
        foreach ($parseItems as $parsedKey => $parseItem) {
            if (is_array($parseItem)) {
                $parseItem = implode(', ', $parseItem);
            }
            $formatedParsedItems[$parsedKey] = $parseItem;
        }

        return str_replace(array_keys($formatedParsedItems), array_values($formatedParsedItems), $string);
    }

    public static function parseArray($arrayItems, $submission)
    {
        if (is_array($arrayItems)) {
            foreach ($arrayItems as $key => $item) {
                if (!is_array($item)) {
                    $arrayItems[$key] = self::parse($item, $submission);
                }
            }
        }
        return $arrayItems;
    }

    public static function parseInpuFields($placeholders, $entry)
    {
        $parsedData = array();

        foreach ($placeholders as $groupKey => $values) {
            foreach ($values as $placeholder => $targetItem) {
                if ($groupKey == 'input') {
                    $parsedData[$placeholder] = $entry->getInput($targetItem);
                } elseif ($groupKey == 'quantity') {
                    $parsedData[$placeholder] = $entry->getItemQuantity($targetItem);
                } elseif ($groupKey == 'payment_item') {
                    $parsedData[$placeholder] = implode(', ', $entry->getPaymentItems($targetItem));
                } elseif ($groupKey == 'submission') {
                    $parsedData[$placeholder] = $entry->{$targetItem};
                }
            }
        }
        return $parsedData;
    }

    public static function parseWPFields($placeHolders, $entry)
    {
        $parsedData = array();
        $metaData = new MetaData($entry);
        foreach ($placeHolders as $groupKey => $values) {
            foreach ($values as $placeholder => $targetItem) {
                if ($groupKey == 'wp') {
                    $parsedData[$placeholder] = $metaData->getWPValues($targetItem);
                } elseif ($groupKey == 'post_meta') {
                    $parsedData[$placeholder] = $metaData->getPostMeta($targetItem);
                } elseif ($groupKey == 'user_meta') {
                    $parsedData[$placeholder] = $metaData->getuserMeta($targetItem);
                } elseif ($groupKey == 'querystring') {
                    $parsedData[$placeholder] = $metaData->getFromUrlQuery($targetItem);
                } elseif ($groupKey == 'other') {
                    $parsedData[$placeholder] = $metaData->getOtherData($targetItem);
                }
            }
        }
        return $parsedData;
    }

    public static function parseShortcode($string)
    {
        $parsables = [];
        preg_replace_callback('/{+(.*?)}/', function ($matches) use (&$parsables) {
            $parsables[$matches[0]] = $matches[1];
        }, $string);
        return $parsables;
    }
}
