<?php

/*
  Plugin Name: JSON CUD API for Buddypress
  Plugin URI: https://github.com/J333P/JSON-CUD-API-for-BuddyPress
  Description: Extends the JSON API to be used with Buddypress
  Version: sous-bêta -2.5
  Author: L'HOSTIS Jean-Pierre
  Author URI: www.jnprlh.com
  License: GPL
 */

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
define('JSON_CUD_API_FOR_BUDDYPRESS_HOME', dirname(__FILE__));

function my_plugin_init() {
  load_plugin_textdomain('json-CUD-api-for-buddypress', false, 'json-CUD-api-for-buddypress/languages');
}
add_action('init', 'my_plugin_init');

if (!is_plugin_active('buddypress/bp-loader.php')) {
    add_action('admin_notices', 'draw_notice_buddypress');
    return;
}

if (!is_plugin_active('json-api/json-api.php')) {
    add_action('admin_notices', 'draw_notice_json_api');
    return;
}

add_filter('json_api_controllers', 'addJsonApiController');
add_filter('json_api_buddypressCUD_controller_path', 'setBuddypressCUDControllerPath');

function draw_notice_buddypress() {
    echo '<div id="message" class="error fade"><p style="line-height: 150%">';
    _e('<strong>JSON CUD API for Buddypress</strong> requires the BuddyPress plugin to be activated. Please <a href="http://buddypress.org">install / activate BuddyPress</a> first, or <a href="plugins.php">deactivate JSON CUD API for Buddypress</a>.', 'json-CUD-api-for-buddypress');
    echo '</p></div>';
}

function draw_notice_json_api() {
    echo '<div id="message" class="error fade"><p style="line-height: 150%">';
    _e('<strong>JSON CUD API for Buddypress</strong> requires the JSON API plugin to be activated. Please <a href="http://wordpress.org/plugins/json-api/">install / activate JSON API</a> first, or <a href="plugins.php">deactivate JSON CUD API for Buddypress</a>.', 'json-CUD-api-for-buddypress');    echo '</p></div>';
}

function addJsonApiController($aControllers) {
    $aControllers[] = 'BuddypressCUD';
    return $aControllers;
}

function setBuddypressCUDControllerPath($sDefaultPath) {
    return dirname(__FILE__) . '/controllers/BuddypressCUD.php';
}