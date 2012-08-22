<?php
/*
Plugin Name: Https SSL Free
Plugin URI: http://mediusproject.org
Description: This plugin allows you to log into your wordpress using the free https service from intosecure inc.
Version: 1.0.1
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
 * Convert an url to https 1.com.ar format and revert it
 * 
 * @param string $scheme protocol (http or https)
 */
function convert ($scheme) {
    // Get url from the database and then parse it
    $pURL = parse_url(get_option('siteurl'));

    if (strcmp($scheme, 'https') == 0) {
        // Convert to https 1.com.ar format
        $host = str_replace('.', '_', $pURL['host']);
        $converted_host = 'https://'.$host.'.1.com.ar'.$pURL['path'];
    } else {
        // Convert to original format
        $host_uno = explode('.', $pURL['host']);
        $host = str_replace('_', '.', $host_uno[0]);

        $converted_host = 'http://'.$host.$pURL['path'];
    }

    // Update the db with the url converted
    update_option('siteurl', $converted_host);
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


/**
 * Rewrite core function bloginfo
 */
function bloginfo_mp_rep ($data) {
    $data = str_replace('_', '.', $data);
    $data = str_replace('https', 'http', $data);
    $data = str_replace('.1.com.ar', '', $data);

    return $data;
}

function bloginfo_mp ($result = '', $show = '') {
    switch ($show) {
        case 'stylesheet_url':
            $data = get_bloginfo($show, 'Display');
            echo bloginfo_mp_rep($data);
            break;

        case 'pingback_url':
            $data = get_bloginfo($show, 'Display');
            echo bloginfo_mp_rep($data);
            break;

        case 'stylesheet_directory':
            $data = get_bloginfo($show, 'Display');
            echo bloginfo_mp_rep($data);
            break;
    }
}

add_filter('bloginfo_url', 'bloginfo_mp', 1, 2);
?>
