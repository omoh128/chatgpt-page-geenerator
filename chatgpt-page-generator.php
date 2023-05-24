<?php
/**
 * Plugin Name: ChatGPT Page Generator
 * Description: A plugin to generate new pages using ChatGPT API.
 * Version: 1.0
 * Author: Omomoh Agiogu
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
        // Activation tasks, if any
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