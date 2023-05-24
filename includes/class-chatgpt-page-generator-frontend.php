<?php

class ChatGPT_Page_Generator_Frontend {
    public function __construct() {
        // Add shortcode
        add_shortcode('chatgpt_page_generator', array($this, 'render_page_generator_shortcode'));
    }

    // Shortcode callback function
    public function render_page_generator_shortcode($atts) {
        // Process shortcode attributes, if needed

        // Render the page generator form
        ob_start();
        include 'settings-page.php';
        return ob_get_clean();
    }
}
