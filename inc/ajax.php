<?php
/**
 * AJAX Handlers with Nonce Verification
 *
 * @package Nasq
 */

if (!defined('ABSPATH')) exit;

class Nasq_AJAX {

    /**
     * Initialize AJAX handlers
     */
    public static function init() {
        add_action('wp_ajax_nasq_contact', [__CLASS__, 'contact_form']);
        add_action('wp_ajax_nopriv_nasq_contact', [__CLASS__, 'contact_form']);
    }

    /**
     * Handle contact form submission
     */
    public static function contact_form() {
        // Verify nonce
        if (!isset($_POST['nasq_nonce']) || !wp_verify_nonce($_POST['nasq_nonce'], 'nasq_contact_action')) {
            wp_send_json_error(['message' => __('Security check failed', 'nasq')]);
        }

        // Check capabilities if user is logged in
        if (is_user_logged_in() && !current_user_can('publish_posts')) {
            wp_send_json_error(['message' => __('Unauthorized', 'nasq')]);
        }

        // Sanitize inputs
        $name = sanitize_text_field($_POST['name'] ?? '');
        $email = sanitize_email($_POST['email'] ?? '');
        $message = sanitize_textarea_field($_POST['message'] ?? '');

        // Validate inputs
        if (empty($name) || empty($email) || empty($message)) {
            wp_send_json_error(['message' => __('Please fill all fields', 'nasq')]);
        }

        if (!is_email($email)) {
            wp_send_json_error(['message' => __('Invalid email address', 'nasq')]);
        }

        // Process contact form (send email, save to database, etc.)
        $to = get_option('admin_email');
        $subject = sprintf(__('New contact from %s', 'nasq'), $name);
        $body = sprintf(
            __('Name: %s\nEmail: %s\n\nMessage:\n%s', 'nasq'),
            $name,
            $email,
            $message
        );

        $sent = wp_mail($to, $subject, $body);

        if ($sent) {
            wp_send_json_success(['message' => __('Message sent successfully', 'nasq')]);
        } else {
            wp_send_json_error(['message' => __('Failed to send message', 'nasq')]);
        }
    }
}

Nasq_AJAX::init();
