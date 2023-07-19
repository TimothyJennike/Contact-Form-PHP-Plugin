<?php
/*
Plugin Name: My Contact Form Plugin
Description: Custom contact form plugin.
*/

// Enqueue the CSS styles
function my_contact_form_enqueue_styles() {
    wp_enqueue_style( 'my-contact-form-styles', plugin_dir_url(__FILE__) . 'styles.css' );
}
add_action( 'wp_enqueue_scripts', 'my_contact_form_enqueue_styles' );

// Shortcode to display the contact form
function my_contact_form_shortcode() {
    ob_start();
    
    // Form submission handling
    if (isset($_POST['contact_form_submit'])) {
        $name = sanitize_text_field($_POST['user_name']);
        $email = sanitize_email($_POST['user_email']);
        $message = sanitize_textarea_field($_POST['user_message']);

        // Add your custom logic to process the form data
        // For example, you can send an email or store the data in a database
        
        // Display a success message
        echo '<p>Thank you for your message! We will get back to you soon.</p>';
    } else {
        // Display the contact form
        include_once( plugin_dir_path( __FILE__ ) . 'form.php' );
    }
    
    return ob_get_clean();
}
add_shortcode('my_contact_form', 'my_contact_form_shortcode');
