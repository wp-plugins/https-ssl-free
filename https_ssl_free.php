<?php
/*
Plugin Name: Https SSL Free
Plugin URI: http://mediusproject.org
Description: This plugin allows you to log into your wordpress using the free https service from medius project inc.
Version: 1.0
Author: Medius Project
Coded by: Leandro D. Pompeo (lp at mediusproject.org)
Idea by: Andrés Meggiotto (am at mediusproject.org)
Author URI: http://mediusproject.org
License: GPLv3
*/

/*
Copyright (C) 2012 Medius Project

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


/**
 * Convert an url to https one format and revert it
 * 
 * @param string $scheme protocol (http or https)
 */
function convert ($scheme) {
    global $wpdb;

    // Get url from the database
    $result = $wpdb->get_row("SELECT option_value FROM $wpdb->options WHERE option_name = 'siteurl'");
    $pURL = parse_url($result->option_value);

    if (strcmp($scheme, 'https') == 0) {
        // Convert to one format
        $host = str_replace('.', '_', $pURL['host']);
        $converted_host = 'https://'.$host.'.1.com.ar';
    } else {
        // Convert to original format
        $host_uno = explode('.', $pURL['host']);
        $host = str_replace('_', '.', $host_uno[0]);

        $url_new = $pURL['scheme'].'://'.$host.$pURL['path'];
        $converted_host =  preg_replace('/^https:\/\//', 'http://', $url_new);
    }

    // Update the db with the url converted
    $wpdb->update($wpdb->options, array('option_value' => $converted_host), array('option_name' => 'siteurl'));
}

/**
 * Active the plugin
 */
function activate_one() {
    convert('https');
}

/**
 * Deactive the plugin
 */
function deactivate_one() {
    convert('http');
}

/**
 * Return a secure url
 */
function http_to_https($url) {
    $aURL = explode('?', $url);
    
    return $aURL[0];
}

/**
 * Return an unsecure url
 */
function https_to_http($url) {
        return $url;
}



/**
 * Register hooks
 */
register_activation_hook( __FILE__, 'activate_one' );
register_deactivation_hook(__FILE__, 'deactivate_one');


/**
 * Filters
 */
// Secure
add_filter('login_url', 'http_to_https');
add_filter('logout_url', 'http_to_https');
?>
