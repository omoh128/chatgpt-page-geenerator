<?php

// Include the file that contains the ChatGPT class
require_once plugin_dir_path(__FILE__) . 'chatgpt-class.php';

function generate_new_page_content($template, $prompt) {
    // Generate the new page based on the form data
    $new_page_content = ChatGPT::generate($template, $prompt);

    return $new_page_content;
}

function create_new_page($keyword, $new_page_content) {
    // Create the new page
    $new_page_id = ChatGPT::createNewPage($keyword, $new_page_content);

    return $new_page_id;
}





