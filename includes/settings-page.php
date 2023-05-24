<div class="wrap">
    <h1>ChatGPT Page Generator Settings</h1>

    <form method="post" action="post.php">

        <?php settings_fields('chatgpt_page_generator_settings'); ?>
        <?php do_settings_sections('chatgpt_page_generator_settings'); ?>

        <table class="form-table">
            <tr>
                <th scope="row">ChatGPT API Key</th>
                <td>
                    <input type="text" name="chatgpt_api_key" value="<?php echo esc_attr(get_option('chatgpt_api_key')); ?>" />
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>
    </form>
</div>
