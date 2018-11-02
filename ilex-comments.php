<?php

/**
 * @link              https://www.itransition.com
 * @since             1.0.0
 * @package           Ilex_Comments
 *
 * @wordpress-plugin
 * Plugin Name:       Ilex comments
 * Plugin URI:        https://ilex.by
 * Description:       Comments plugin. Integrate ILEX Comments service.
 * Version:           1.0.0
 * Author:            Maksim Pevnev
 * Author URI:        https://www.itransition.com
 * Text Domain:       ilex-comments
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('PLUGIN_NAME_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/IlexCommentsActivator.php
 */
function activate_ilex_comments() {
    require_once plugin_dir_path(__FILE__) . 'includes/IlexCommentsActivator.php';
    \IlexComments\Includes\IlexCommentsActivator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/IlexCommentsDeactivator.php
 */
function deactivate_ilex_comments() {
    require_once plugin_dir_path(__FILE__) . 'includes/IlexCommentsDeactivator.php';
    \IlexComments\Includes\IlexCommentsDeactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_ilex_comments');
register_deactivation_hook(__FILE__, 'deactivate_ilex_comments');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/IlexComments.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 */
function run_ilex_comments() {
    $plugin = new \IlexComments\Includes\IlexComments();
    $plugin->run();
}
run_ilex_comments();
