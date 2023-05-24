<?php
/**
 * Plugin Name: ChatGPT Page Generator
 * Description: A plugin to generate new pages using ChatGPT API.
 * Version: 1.0
 * Author: Omomoh Agiogu
 * Stable tag: (version number)
 *License: (license name, e.g., GPLv2 or MIT)
 *Tags: (plugin tags, separated by commas)
*Requires at least: (minimum WordPress version required)
*Tested up to: (latest WordPress version tested)
 * 
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Main plugin class
class ChatGPT_Page_Generator_Plugin {
    public function __construct() {
        // Register activation and deactivation hooks
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));

        // Load plugin dependencies
        add_action('plugins_loaded', array($this, 'load_dependencies'));

        
    }
   
    // Activation hook callback
    public function activate() {
        
    }

    // Deactivation hook callback
    public function deactivate() {
        // Deactivation tasks, if any
    }

    // Load plugin dependencies
    public function load_dependencies() {
        // Load plugin classes
        require_once plugin_dir_path(__FILE__) . '/includes/ class-chatgpt-page-generator.php';
    }
       
}

// Initialize the plugin
$chatgpt_page_generator_plugin = new ChatGPT_Page_Generator_Plugin();