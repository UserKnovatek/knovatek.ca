<?php

namespace WPPayForm\App\Services;

/**
 * Countries
 *
 * Returns an array of countries and codes.
 *
 * @author      WooThemes
 * @category    i18n
 * @package     payform/i18n
 * @version     2.5.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class CountryNames
{
    public static function getAll()
    {
        $country_names = array(
            'AF' => __('Afghanistan', 'payform'),
            'AX' => __('Åland Islands', 'payform'),
            'AL' => __('Albania', 'payform'),
            'DZ' => __('Algeria', 'payform'),
            'AS' => __('American Samoa', 'payform'),
            'AD' => __('Andorra', 'payform'),
            'AO' => __('Angola', 'payform'),
            'AI' => __('Anguilla', 'payform'),
            'AQ' => __('Antarctica', 'payform'),
            'AG' => __('Antigua and Barbuda', 'payform'),
            'AR' => __('Argentina', 'payform'),
            'AM' => __('Armenia', 'payform'),
            'AW' => __('Aruba', 'payform'),
            'AU' => __('Australia', 'payform'),
            'AT' => __('Austria', 'payform'),
            'AZ' => __('Azerbaijan', 'payform'),
            'BS' => __('Bahamas', 'payform'),
            'BH' => __('Bahrain', 'payform'),
            'BD' => __('Bangladesh', 'payform'),
            'BB' => __('Barbados', 'payform'),
            'BY' => __('Belarus', 'payform'),
            'BE' => __('Belgium', 'payform'),
            'PW' => __('Belau', 'payform'),
            'BZ' => __('Belize', 'payform'),
            'BJ' => __('Benin', 'payform'),
            'BM' => __('Bermuda', 'payform'),
            'BT' => __('Bhutan', 'payform'),
            'BO' => __('Bolivia', 'payform'),
            'BQ' => __('Bonaire, Saint Eustatius and Saba', 'payform'),
            'BA' => __('Bosnia and Herzegovina', 'payform'),
            'BW' => __('Botswana', 'payform'),
            'BV' => __('Bouvet Island', 'payform'),
            'BR' => __('Brazil', 'payform'),
            'IO' => __('British Indian Ocean Territory', 'payform'),
            'VG' => __('British Virgin Islands', 'payform'),
            'BN' => __('Brunei', 'payform'),
            'BG' => __('Bulgaria', 'payform'),
            'BF' => __('Burkina Faso', 'payform'),
            'BI' => __('Burundi', 'payform'),
            'KH' => __('Cambodia', 'payform'),
            'CM' => __('Cameroon', 'payform'),
            'CA' => __('Canada', 'payform'),
            'CV' => __('Cape Verde', 'payform'),
            'KY' => __('Cayman Islands', 'payform'),
            'CF' => __('Central African Republic', 'payform'),
            'TD' => __('Chad', 'payform'),
            'CL' => __('Chile', 'payform'),
            'CN' => __('China', 'payform'),
            'CX' => __('Christmas Island', 'payform'),
            'CC' => __('Cocos (Keeling) Islands', 'payform'),
            'CO' => __('Colombia', 'payform'),
            'KM' => __('Comoros', 'payform'),
            'CG' => __('Congo (Brazzaville)', 'payform'),
            'CD' => __('Congo (Kinshasa)', 'payform'),
            'CK' => __('Cook Islands', 'payform'),
            'CR' => __('Costa Rica', 'payform'),
            'HR' => __('Croatia', 'payform'),
            'CU' => __('Cuba', 'payform'),
            'CW' => __('Cura&ccedil;ao', 'payform'),
            'CY' => __('Cyprus', 'payform'),
            'CZ' => __('Czech Republic', 'payform'),
            'DK' => __('Denmark', 'payform'),
            'DJ' => __('Djibouti', 'payform'),
            'DM' => __('Dominica', 'payform'),
            'DO' => __('Dominican Republic', 'payform'),
            'EC' => __('Ecuador', 'payform'),
            'EG' => __('Egypt', 'payform'),
            'SV' => __('El Salvador', 'payform'),
            'GQ' => __('Equatorial Guinea', 'payform'),
            'ER' => __('Eritrea', 'payform'),
            'EE' => __('Estonia', 'payform'),
            'ET' => __('Ethiopia', 'payform'),
            'FK' => __('Falkland Islands', 'payform'),
            'FO' => __('Faroe Islands', 'payform'),
            'FJ' => __('Fiji', 'payform'),
            'FI' => __('Finland', 'payform'),
            'FR' => __('France', 'payform'),
            'GF' => __('French Guiana', 'payform'),
            'PF' => __('French Polynesia', 'payform'),
            'TF' => __('French Southern Territories', 'payform'),
            'GA' => __('Gabon', 'payform'),
            'GM' => __('Gambia', 'payform'),
            'GE' => __('Georgia', 'payform'),
            'DE' => __('Germany', 'payform'),
            'GH' => __('Ghana', 'payform'),
            'GI' => __('Gibraltar', 'payform'),
            'GR' => __('Greece', 'payform'),
            'GL' => __('Greenland', 'payform'),
            'GD' => __('Grenada', 'payform'),
            'GP' => __('Guadeloupe', 'payform'),
            'GU' => __('Guam', 'payform'),
            'GT' => __('Guatemala', 'payform'),
            'GG' => __('Guernsey', 'payform'),
            'GN' => __('Guinea', 'payform'),
            'GW' => __('Guinea-Bissau', 'payform'),
            'GY' => __('Guyana', 'payform'),
            'HT' => __('Haiti', 'payform'),
            'HM' => __('Heard Island and McDonald Islands', 'payform'),
            'HN' => __('Honduras', 'payform'),
            'HK' => __('Hong Kong', 'payform'),
            'HU' => __('Hungary', 'payform'),
            'IS' => __('Iceland', 'payform'),
            'IN' => __('India', 'payform'),
            'ID' => __('Indonesia', 'payform'),
            'IR' => __('Iran', 'payform'),
            'IQ' => __('Iraq', 'payform'),
            'IE' => __('Ireland', 'payform'),
            'IM' => __('Isle of Man', 'payform'),
            'IL' => __('Israel', 'payform'),
            'IT' => __('Italy', 'payform'),
            'CI' => __('Ivory Coast', 'payform'),
            'JM' => __('Jamaica', 'payform'),
            'JP' => __('Japan', 'payform'),
            'JE' => __('Jersey', 'payform'),
            'JO' => __('Jordan', 'payform'),
            'KZ' => __('Kazakhstan', 'payform'),
            'KE' => __('Kenya', 'payform'),
            'KI' => __('Kiribati', 'payform'),
            'KW' => __('Kuwait', 'payform'),
            'KG' => __('Kyrgyzstan', 'payform'),
            'LA' => __('Laos', 'payform'),
            'LV' => __('Latvia', 'payform'),
            'LB' => __('Lebanon', 'payform'),
            'LS' => __('Lesotho', 'payform'),
            'LR' => __('Liberia', 'payform'),
            'LY' => __('Libya', 'payform'),
            'LI' => __('Liechtenstein', 'payform'),
            'LT' => __('Lithuania', 'payform'),
            'LU' => __('Luxembourg', 'payform'),
            'MO' => __('Macao S.A.R., China', 'payform'),
            'MK' => __('Macedonia', 'payform'),
            'MG' => __('Madagascar', 'payform'),
            'MW' => __('Malawi', 'payform'),
            'MY' => __('Malaysia', 'payform'),
            'MV' => __('Maldives', 'payform'),
            'ML' => __('Mali', 'payform'),
            'MT' => __('Malta', 'payform'),
            'MH' => __('Marshall Islands', 'payform'),
            'MQ' => __('Martinique', 'payform'),
            'MR' => __('Mauritania', 'payform'),
            'MU' => __('Mauritius', 'payform'),
            'YT' => __('Mayotte', 'payform'),
            'MX' => __('Mexico', 'payform'),
            'FM' => __('Micronesia', 'payform'),
            'MD' => __('Moldova', 'payform'),
            'MC' => __('Monaco', 'payform'),
            'MN' => __('Mongolia', 'payform'),
            'ME' => __('Montenegro', 'payform'),
            'MS' => __('Montserrat', 'payform'),
            'MA' => __('Morocco', 'payform'),
            'MZ' => __('Mozambique', 'payform'),
            'MM' => __('Myanmar', 'payform'),
            'NA' => __('Namibia', 'payform'),
            'NR' => __('Nauru', 'payform'),
            'NP' => __('Nepal', 'payform'),
            'NL' => __('Netherlands', 'payform'),
            'NC' => __('New Caledonia', 'payform'),
            'NZ' => __('New Zealand', 'payform'),
            'NI' => __('Nicaragua', 'payform'),
            'NE' => __('Niger', 'payform'),
            'NG' => __('Nigeria', 'payform'),
            'NU' => __('Niue', 'payform'),
            'NF' => __('Norfolk Island', 'payform'),
            'MP' => __('Northern Mariana Islands', 'payform'),
            'KP' => __('North Korea', 'payform'),
            'NO' => __('Norway', 'payform'),
            'OM' => __('Oman', 'payform'),
            'PK' => __('Pakistan', 'payform'),
            'PS' => __('Palestinian Territory', 'payform'),
            'PA' => __('Panama', 'payform'),
            'PG' => __('Papua New Guinea', 'payform'),
            'PY' => __('Paraguay', 'payform'),
            'PE' => __('Peru', 'payform'),
            'PH' => __('Philippines', 'payform'),
            'PN' => __('Pitcairn', 'payform'),
            'PL' => __('Poland', 'payform'),
            'PT' => __('Portugal', 'payform'),
            'PR' => __('Puerto Rico', 'payform'),
            'QA' => __('Qatar', 'payform'),
            'RE' => __('Reunion', 'payform'),
            'RO' => __('Romania', 'payform'),
            'RU' => __('Russia', 'payform'),
            'RW' => __('Rwanda', 'payform'),
            'BL' => __('Saint Barth&eacute;lemy', 'payform'),
            'SH' => __('Saint Helena', 'payform'),
            'KN' => __('Saint Kitts and Nevis', 'payform'),
            'LC' => __('Saint Lucia', 'payform'),
            'MF' => __('Saint Martin (French part)', 'payform'),
            'SX' => __('Saint Martin (Dutch part)', 'payform'),
            'PM' => __('Saint Pierre and Miquelon', 'payform'),
            'VC' => __('Saint Vincent and the Grenadines', 'payform'),
            'SM' => __('San Marino', 'payform'),
            'ST' => __('S&atilde;o Tom&eacute; and Pr&iacute;ncipe', 'payform'),
            'SA' => __('Saudi Arabia', 'payform'),
            'SN' => __('Senegal', 'payform'),
            'RS' => __('Serbia', 'payform'),
            'SC' => __('Seychelles', 'payform'),
            'SL' => __('Sierra Leone', 'payform'),
            'SG' => __('Singapore', 'payform'),
            'SK' => __('Slovakia', 'payform'),
            'SI' => __('Slovenia', 'payform'),
            'SB' => __('Solomon Islands', 'payform'),
            'SO' => __('Somalia', 'payform'),
            'ZA' => __('South Africa', 'payform'),
            'GS' => __('South Georgia/Sandwich Islands', 'payform'),
            'KR' => __('South Korea', 'payform'),
            'SS' => __('South Sudan', 'payform'),
            'ES' => __('Spain', 'payform'),
            'LK' => __('Sri Lanka', 'payform'),
            'SD' => __('Sudan', 'payform'),
            'SR' => __('Suriname', 'payform'),
            'SJ' => __('Svalbard and Jan Mayen', 'payform'),
            'SZ' => __('Swaziland', 'payform'),
            'SE' => __('Sweden', 'payform'),
            'CH' => __('Switzerland', 'payform'),
            'SY' => __('Syria', 'payform'),
            'TW' => __('Taiwan', 'payform'),
            'TJ' => __('Tajikistan', 'payform'),
            'TZ' => __('Tanzania', 'payform'),
            'TH' => __('Thailand', 'payform'),
            'TL' => __('Timor-Leste', 'payform'),
            'TG' => __('Togo', 'payform'),
            'TK' => __('Tokelau', 'payform'),
            'TO' => __('Tonga', 'payform'),
            'TT' => __('Trinidad and Tobago', 'payform'),
            'TN' => __('Tunisia', 'payform'),
            'TR' => __('Turkey', 'payform'),
            'TM' => __('Turkmenistan', 'payform'),
            'TC' => __('Turks and Caicos Islands', 'payform'),
            'TV' => __('Tuvalu', 'payform'),
            'UG' => __('Uganda', 'payform'),
            'UA' => __('Ukraine', 'payform'),
            'AE' => __('United Arab Emirates', 'payform'),
            'GB' => __('United Kingdom (UK)', 'payform'),
            'US' => __('United States (US)', 'payform'),
            'UM' => __('United States (US) Minor Outlying Islands', 'payform'),
            'VI' => __('United States (US) Virgin Islands', 'payform'),
            'UY' => __('Uruguay', 'payform'),
            'UZ' => __('Uzbekistan', 'payform'),
            'VU' => __('Vanuatu', 'payform'),
            'VA' => __('Vatican', 'payform'),
            'VE' => __('Venezuela', 'payform'),
            'VN' => __('Vietnam', 'payform'),
            'WF' => __('Wallis and Futuna', 'payform'),
            'EH' => __('Western Sahara', 'payform'),
            'WS' => __('Samoa', 'payform'),
            'YE' => __('Yemen', 'payform'),
            'ZM' => __('Zambia', 'payform'),
            'ZW' => __('Zimbabwe', 'payform'),
        );

        return apply_filters('payform_editor_countries', $country_names);
    }
}
