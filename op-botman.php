<?php

/**
 * Plugin Name: WordPress ChatBot WebWidget
 * Plugin URI: https://github.com/stirrell/scc-botman-for-wp
 * Description: A WordPress plugin to add BotMan Web Widget.
 * Author: Vincent Chen
 * Version: 1.0.0
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

define('CHATBOT_PLUGIN_PATH', plugin_dir_path(__FILE__));

include CHATBOT_PLUGIN_PATH . 'includes/admin-panel.php';

/**
 * Load the JavaScript and CSS for the BotMan web widget.
 */
function scc_enqueue_pulse_chatbot()
{
    wp_enqueue_script('pma-chatbot-widget', 'https://chatbotuat.ourproperty.com.au/webwidget/build/js/widget.js', null, null, true);
}

add_action('wp_enqueue_scripts', 'scc_enqueue_pulse_chatbot');

/**
 * Add the options set by the user for the Chatbot.
 */
function scc_chatbot_add_widget_code()
{
    $botman_chat_server               = get_option('botman_chat_server', 'https://chatbotuat.ourproperty.com.au/botman');
    $botman_chat_iframe               = get_option('botman_chat_iframe', 'https://chatbotuat.ourproperty.com.au/botman/webchat');
    $botman_chat_base_url             = get_option('botman_chat_base_url', 'https://chatbotuat.ourproperty.com.au');
    $botman_chat_placeholder_text     = get_option('botman_chat_placeholder_text', 'Send a message...');
    $botman_chat_widget_color         = get_option('botman_chat_widget_color', '#408591');
    $botman_chat_about_text           = get_option('botman_chat_about_text', 'Powered by BotMan');
    $botman_chat_about_link           = get_option('botman_chat_about_link', 'https://www.ourproperty.com.au/');

    // If any required info is missing, bail out.
    if (empty($botman_chat_server)) {
        return;
    }

?>
    <script>
        var botmanWidget = {
            title: '<?php echo get_option('botman_chat_title'); ?>',
            introMessage: '<?php echo get_option('botman_chat_intro_message'); ?>',
            bubbleAvatarUrl: '<?php echo get_option('botman_chat_widget_image'); ?>',
            aboutText: '<?php echo $botman_chat_about_text; ?>',
            aboutLink: '<?php echo $botman_chat_about_link; ?>',
            mainColor: '<?php echo $botman_chat_widget_color ?>',
            frameEndpoint: '<?php echo $botman_chat_iframe; ?>',
            chatServer: '<?php echo $botman_chat_server; ?>',
            baseURL: '<?php echo $botman_chat_base_url; ?>',
            desktopHeight: "600px",
            desktopWidth: "570px",
            placeholderText: '<?php echo $botman_chat_placeholder_text; ?>',
            userId: '<?php echo wp_generate_uuid4() ?>'
        };
    </script>
<?php }

add_action('wp_footer', 'scc_chatbot_add_widget_code');