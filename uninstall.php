<?php
// If uninstall.php is not called by WordPress, exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

class MyPluginUninstaller {
    public function __construct() {
        // Add any initialization or dependencies here
    }

    public function uninstall() {
        // Perform the uninstallation tasks here
        $this->deletePluginOptions();
        $this->dropCustomDatabaseTables();
        // ... any other cleanup tasks

        // Optionally, you can perform additional checks before uninstallation
    }

    private function deletePluginOptions() {
        // Delete plugin options
        delete_option('plugin_option_name');
    }

    private function dropCustomDatabaseTables() {
        // Drop custom database tables
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}custom_table");
    }
}

// Create an instance of the uninstaller and call the uninstall method
$uninstaller = new MyPluginUninstaller();
$uninstaller->uninstall();

?>
