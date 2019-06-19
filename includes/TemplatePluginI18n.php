<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.itransition.com
 * @since      1.0.0
 *
 * @package    TemplatePlugin
 * @subpackage TemplatePlugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    TemplatePlugin
 * @subpackage TemplatePlugin/includes
 * @author     Maksim Pevnev <m.pevnev@itransition.com>
 */

namespace TemplatePlugin\Includes;

class TemplatePluginI18N
{
    /**
     * Load the plugin text domain for translation.
     */
    public function load_plugin_textdomain()
    {
        load_plugin_textdomain(
            'template-plugin',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );
    }
}
