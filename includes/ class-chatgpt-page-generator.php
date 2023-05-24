<?php

require_once plugin_dir_path(__FILE__) . 'helper-functions.php';

class ChatGPT_Page_Generator {
    public function __construct() {
        // Add hooks and actions here
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
    }

    // Add admin menu
    public function add_admin_menu() {
          
        // Register the settings
    register_setting('chatgpt_page_generator_settings', 'chatgpt_api_key');


        // Add your admin menu code here
        add_menu_page(
            'ChatGPT Page Generator', // Page title
            'ChatGPT Generator', // Menu title
            'manage_options', // Capability
            'chatgpt-page-generator', // Menu slug
            array($this, 'render_admin_page'), // Callback function to render the admin page
            'dashicons-admin-generic', // Menu icon
            99 // Menu position
        );
    }

    // Enqueue admin stylesheets and scripts
    public function enqueue_admin_scripts() {
        // Enqueue your admin stylesheets and scripts here
        wp_enqueue_style('chatgpt-page-generator-admin', plugin_dir_url(__FILE__) . 'css/admin.css', array(), '1.0.0');
        wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
        wp_enqueue_script('chatgpt-page-generator-admin', plugin_dir_url(__FILE__) . 'js/admin.js', array('jquery'), '1.0.0', true);
    }

    // Render the admin page
    public function render_admin_page() {

         // Handle form submission and save the API key
    if (isset($_POST['submit'])) {
        $api_key = sanitize_text_field($_POST['chatgpt_api_key']);
        update_option('chatgpt_api_key', $api_key);
        echo '<div class="notice notice-success"><p>API key saved successfully.</p></div>';
    }

        include plugin_dir_path(__FILE__) . 'settings-page.php';

        ?>
        <div class="wrap">
            <h1>ChatGPT Page Generator</h1>
            <p>Welcome to the ChatGPT Page Generator admin page.</p>
            <!-- Add your HTML markup and admin page content here -->
            <h2>New Page Generation</h2>
           <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">

            <label for="keyword">Keyword:</label>
            <input type="text" name="keyword" id="keyword" placeholder="Enter keyword">

            <label for="template">Select Published Page:</label>
            <select name="template" id="template">
            <?php
            $pages = get_pages(); // Get all published pages

            foreach ($pages as $page) {
                $page_id = $page->ID;
                $page_title = $page->post_title;
                echo '<option value="' . $page_id . '">' . $page_title . '</option>';
            }
            ?>
        </select>

            <label for="prompt">Prompt for ChatGPT:</label>
            <textarea name="prompt" id="prompt" placeholder="Enter prompt"></textarea>

            <button type="submit" name="generate_page">Generate Page</button>
        </form>

        <?php
// Handle form submission and page generation logic here

    if (isset($_POST['generate_page'])) {
        // Get the form data
        $keyword = sanitize_text_field($_POST['keyword']);
        $template = sanitize_text_field($_POST['template']);
        $prompt = sanitize_textarea_field($_POST['prompt']);

        // Generate the new page based on the form data
        $new_page_content = generate_new_page_content($template, $prompt);
        
        // Create the new page
        $new_page_id = create_new_page($keyword, $new_page_content);

        if ($new_page_id) {
            // Display success message
            echo '<div class="notice notice-success"><p>New page created successfully. Page ID: ' . $new_page_id . '</p></div>';
        } else {
            // Display error message
            echo '<div class="notice notice-error"><p>Failed to create the new page.</p></div>';
        }
    }
    ?>

        </div>
        <?php
    }

    
}
// Instantiate the ChatGPT_Page_Generator class
$chatgpt_page_generator = new ChatGPT_Page_Generator();
