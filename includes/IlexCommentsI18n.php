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
 * @package    IlexComments
 * @subpackage IlexComments/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    IlexComments
 * @subpackage IlexComments/includes
 * @author     Maksim Pevnev <m.pevnev@itransition.com>
 */

namespace IlexComments\Includes;

class IlexCommentsI18n
{
    /**
     * Load the plugin text domain for translation.
     */
    public function load_plugin_textdomain()
    {
        load_plugin_textdomain(
            'ilex-comments',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );
    }
}
