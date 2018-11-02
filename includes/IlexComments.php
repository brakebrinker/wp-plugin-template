<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.itransition.com
 *
 * @package    IlexComments
 * @subpackage IlexComments/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @package    IlexComments
 * @subpackage IlexComments/includes
 * @author     Maksim Pevnev <m.pevnev@itransition.com>
 */

namespace IlexComments\Includes;

use IlexComments\Admin\IlexCommentsAdmin;
use IlexComments\Publ\IlexCommentsPublic;

class IlexComments
{

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @access protected
     * @var IlexCommentsLoader $loader Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @access protected
     * @var string $pluginName The string used to uniquely identify this plugin.
     */
    protected $pluginName;

    /**
     * The current version of the plugin.
     *
     * @access protected
     * @var string $version The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     */
    public function __construct()
    {
        if (defined('PLUGIN_NAME_VERSION')) {
            $this->version = PLUGIN_NAME_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->pluginName = 'ilex-comments';

        $this->loadDependencies();
        $this->setLocale();
        $this->defineAdminHooks();
        $this->definePublicHooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * @access private
     */
    private function loadDependencies()
    {
        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(__DIR__) . 'includes/IlexCommentsLoader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path(__DIR__) . 'includes/IlexCommentsI18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(__DIR__) . 'admin/IlexCommentsAdmin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path(__DIR__) . 'public/IlexCommentsPublic.php';

        $this->loader = new IlexCommentsLoader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * @access private
     */
    private function setLocale()
    {
        $pluginI18n = new IlexCommentsI18n();

        $this->loader->addAction('plugins_loaded', $pluginI18n, 'load_plugin_textdomain');
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @access private
     */
    private function defineAdminHooks()
    {
        $pluginAdmin = new IlexCommentsAdmin($this->getPluginName(), $this->getVersion());

        $this->loader->addAction('admin_enqueue_scripts', $pluginAdmin, 'enqueueStyles');
        $this->loader->addAction('admin_enqueue_scripts', $pluginAdmin, 'enqueueScripts');
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @access private
     */
    private function definePublicHooks()
    {
        $pluginPublic = new IlexCommentsPublic($this->getPluginName(), $this->getVersion());

        $this->loader->addAction('wp_enqueue_scripts', $pluginPublic, 'enqueueStyles');
        $this->loader->addAction('wp_enqueue_scripts', $pluginPublic, 'enqueueScripts');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @return string The name of the plugin.
     */
    public function getPluginName()
    {
        return $this->pluginName;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @return IlexCommentsLoader Orchestrates the hooks of the plugin.
     */
    public function getLoader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @return string The version number of the plugin.
     */
    public function getVersion()
    {
        return $this->version;
    }
}
