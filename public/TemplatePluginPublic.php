<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.itransition.com
 *
 * @package    TemplatePlugin
 * @subpackage TemplatePlugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    TemplatePlugin
 * @subpackage TemplatePlugin/public
 * @author     Maksim Pevnev <m.pevnev@itransition.com>
 */

namespace IlexComments\Publ;

class TemplatePluginPublic
{

    /**
     * The ID of this plugin.
     *
     * @access private
     * @var string $pluginName The ID of this plugin.
     */
    private $pluginName;

    /**
     * The version of this plugin.
     *
     * @access private
     * @var string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $pluginName The name of the plugin.
     * @param string $version The version of this plugin.
     */
    public function __construct($pluginName, $version)
    {
        $this->pluginName = $pluginName;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     */
    public function enqueueStyles()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in TemplatePluginLoader as all of the hooks are defined
         * in that particular class.
         *
         * The TemplatePluginLoader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style(
            $this->pluginName,
            plugin_dir_url(__FILE__) . 'css/template-plugin-public.css',
            [],
            $this->version,
            'all'
        );
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueueScripts()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in TemplatePluginLoader as all of the hooks are defined
         * in that particular class.
         *
         * The TemplatePluginLoader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script(
            $this->pluginName,
            plugin_dir_url(__FILE__) . 'js/template-plugin-public.js',
            ['jquery'],
            $this->version,
            false
        );
    }
}
