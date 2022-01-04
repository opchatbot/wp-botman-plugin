<?php

/**
 * Create settings page for the BotMan widget.
 */
function botman_add_settings_page()
{
    add_options_page(
        'BotMan Widget Settings',
        'BotMan Widget Settings',
        'manage_options',
        'botman-chatbot-options',
        'plugin_settings_page'
    );
}

if (is_admin()) {
    add_action('admin_menu', 'botman_add_settings_page');
    add_action('admin_init', 'botman_register_settings');
}

/**
 * Display the settings page for the BotMan widget.
 */
function plugin_settings_page()
{ ?>
    <div class="wrap">
        <h1>BotMan Widget Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields('botman-chatbot-options-group'); ?>
            <h2>Chatbot Settings</h2>
            <table class="form-table" role="presentation">
                <tbody>
                    <!-- botman_chat_title -->
                    <tr>
                        <th scope="row"><label for="botman_chat_title">Chat Box Title:</label></th>
                        <td>
                            <input name="botman_chat_title" type="text" id="botman_chat_title" class="large-text" value="<?php echo esc_attr(get_option('botman_chat_title')); ?>" />
                        </td>
                    </tr>
                    <!-- botman_chat_intro_message -->
                    <tr>
                        <th scope="row"><label for="botman_chat_intro_message">Introduction Message:</label></th>
                        <td>
                            <textarea name="botman_chat_intro_message" type="text" id="botman_chat_intro_message" class="large-text"><?php
                                                                                                                                        echo esc_attr(get_option('botman_chat_intro_message'));
                                                                                                                                        ?></textarea>
                        </td>
                    </tr>
                    <!-- botman_chat_widget_image -->
                    <tr>
                        <th scope="row"><label for="botman_chat_widget_image">Chat Widget Image URL:</label></th>
                        <td>
                            <input name="botman_chat_widget_image" type="text" id="botman_chat_widget_image" class="large-text" value="<?php echo esc_attr(get_option('botman_chat_widget_image')); ?>" />
                        </td>
                    </tr>
                    <!-- botman_chat_about_text -->
                    <tr>
                        <th scope="row"><label for="botman_chat_about_text">About Text:</label></th>
                        <td>
                            <input name="botman_chat_about_text" type="text" id="botman_chat_about_text" class="large-text" value="<?php echo esc_attr(get_option('botman_chat_about_text')); ?>" />
                        </td>
                    </tr>
                    <!-- botman_chat_about_link -->
                    <tr>
                        <th scope="row"><label for="botman_chat_about_link">About Link:</label></th>
                        <td>
                            <input name="botman_chat_about_link" type="text" id="botman_chat_about_link" class="large-text" value="<?php echo esc_attr(get_option('botman_chat_about_link')); ?>" />
                        </td>
                    </tr>
                    <!-- botman_chat_widget_color -->
                    <tr>
                        <th scope="row"><label for="botman_chat_widget_color">Widget Color:</label></th>
                        <td>
                            <input name="botman_chat_widget_color" type="color" id="botman_chat_widget_color" value="<?php echo esc_attr(get_option('botman_chat_widget_color')); ?>" />
                        </td>
                    </tr>
                    <!-- botman_chat_iframe -->
                    <tr>
                        <th scope="row"><label for="botman_chat_iframe">iFrame Endpoint:</label></th>
                        <td>
                            <input name="botman_chat_iframe" type="text" id="botman_chat_iframe" class="large-text" value="<?php echo esc_attr(get_option('botman_chat_iframe')); ?>" />
                        </td>
                    </tr>
                    <!-- botman_chat_server -->
                    <tr>
                        <th scope="row"><label for="botman_chat_server">Chat Server:</label></th>
                        <td>
                            <input name="botman_chat_server" type="text" id="botman_chat_server" class="large-text" value="<?php echo esc_attr(get_option('botman_chat_server')); ?>" />
                        </td>
                    </tr>
                    <!-- botman_chat_base_url -->
                    <tr>
                        <th scope="row"><label for="botman_chat_base_url">Chat Base URL:</label></th>
                        <td>
                            <input name="botman_chat_base_url" type="text" id="botman_chat_base_url" class="large-text" value="<?php echo esc_attr(get_option('botman_chat_base_url')); ?>" />
                        </td>
                    </tr>
                    <!-- botman_chat_placeholder_text -->
                    <tr>
                        <th scope="row"><label for="botman_chat_placeholder_text">Placeholder Text:</label></th>
                        <td>
                            <input name="botman_chat_placeholder_text" type="text" id="botman_chat_placeholder_text" class="large-text" value="<?php echo esc_attr(get_option('botman_chat_placeholder_text')); ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
<?php }

/**
 * Register the settings used for the BotMan widget plugin.
 */
function botman_register_settings()
{
    register_setting('botman-chatbot-options-group', 'botman_chat_title');
    register_setting('botman-chatbot-options-group', 'botman_chat_server');
    register_setting('botman-chatbot-options-group', 'botman_chat_iframe');
    register_setting('botman-chatbot-options-group', 'botman_chat_base_url');
    register_setting('botman-chatbot-options-group', 'botman_chat_intro_message');
    register_setting('botman-chatbot-options-group', 'botman_chat_widget_image');
    register_setting('botman-chatbot-options-group', 'botman_chat_widget_color');
    register_setting('botman-chatbot-options-group', 'botman_chat_placeholder_text');
    register_setting('botman-chatbot-options-group', 'botman_chat_about_text');
    register_setting('botman-chatbot-options-group', 'botman_chat_about_link');
}
