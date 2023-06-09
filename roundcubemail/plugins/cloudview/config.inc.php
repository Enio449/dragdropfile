<?php

use Jfcherng\Roundcube\Plugin\CloudView\Helper\PluginConst;

/**
 * This file is mean to specify all default settings.
 *
 * To use your customized config, you should copied this file into
 * "config.inc.php" and modify config in it.
 */
$config = [];

/**
 * You may want to set this if your Roundcube is set under a subdirectory or behind a reverse proxy.
 * Here's a subdirectory example: https://example.com/roundcube/
 *
 * @type string
 */
$config['custom_site_url'] = '';

/**
 * The default viewer order if the user has not set one.
 *
 * @type string
 *
 * @values PluginConst::VIEWER_GOOGLE_DOCS
 * @values PluginConst::VIEWER_MICROSOFT_OFFICE_WEB
 *
 * For more values, see "Helper/PluginConst.php"
 */
$config['viewer_order'] = implode(',', [
    PluginConst::VIEWER_GOOGLE_DOCS,
    PluginConst::VIEWER_MICROSOFT_OFFICE_WEB,
]);

/**
 * The default view button layouts if the user has not set one.
 *
 * @type int[]
 *
 * @values PluginConst::VIEW_BUTTON_IN_ATTACHMENTSLIST
 * @values PluginConst::VIEW_BUTTON_IN_ATTACHMENTOPTIONSMENU
 *
 * For more values, see "Helper/PluginConst.php"
 */
$config['view_button_layouts'] = [
    PluginConst::VIEW_BUTTON_IN_ATTACHMENTSLIST,
];

////////////////////////////////////
// for localhost dev test purpose //
////////////////////////////////////

$config['is_dev_mode'] = false;
$config['dev_mode_file_base_url'] = 'https://4272fd88.ngrok.io/';
