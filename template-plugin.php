<?php

/**
 * @link              https://www.itransition.com
 * @since             1.0.0
 * @package           Template_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Template plugin
 * Description:       WP template plugin.
 * Version:           1.0.0
 * Author:            Maksim Pevnev
 * Author URI:        https://www.itransition.com
 * Text Domain:       template_plugin
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
 * This action is documented in includes/TemplatePluginActivatoror.php
 */
function activate_template_plugin() {
    require_once plugin_dir_path(__FILE__) . 'includes/TemplatePluginActivator.phphp';
    \TemplatePlugin\Includes\TemplatePluginActivator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/TemplatePluginDeactivator.phphp
 */
function deactivate_template_plugin() {
    require_once plugin_dir_path(__FILE__) . 'includes/TemplatePluginDeactivator.phphp';
    \TemplatePlugin\Includes\TemplatePluginDeactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_template_plugin');
register_deactivation_hook(__FILE__, 'deactivate_template_plugin');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/TemplatePlugin.phphp';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 */
function run_template_plugin() {
    $plugin = new \TemplatePlugin\Includes\TemplatePlugin();
    $plugin->run();
}
run_template_plugin();
