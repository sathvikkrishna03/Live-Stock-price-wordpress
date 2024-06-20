<?php
/**
 * Plugin Name: Live_stock_price_Plugin
 * Description: Get the data from the api and store the data in a Dynamic Shortcode so that it can be used any at any part of the website.
 */


add_shortcode('dynamic_shortcode', 'dynamic_shortcode_callback');


function dynamic_shortcode_callback($atts) {
        $dynamic_data = get_transient('dynamic_data_cache');

    if (false === $dynamic_data) {
        $dynamic_data = get_dynamic_data();
        set_transient('dynamic_data_cache', $dynamic_data, 30);
    }

   
    $content = $dynamic_data;
    return $content;
}


function get_dynamic_data() {
    $api_url = 'https://sviksolution.com/test/angleone/POWERMECH.txt'; // Replace with your API endpoint URL

    
    $response = wp_remote_get($api_url);

        if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
        return 'Error retrieving dynamic data.';
    }

    $body = wp_remote_retrieve_body($response);

    $dynamic_data = json_decode($body, true);
    $price = $dynamic_data['data']['ltp'];

        return $price;
}


add_action('init', 'update_shortcode_on_page_load');

function update_shortcode_on_page_load() {
    add_filter('do_shortcode_tag', 'modify_shortcode_output', 10, 4);
}

function modify_shortcode_output($output, $tag, $attr, $m) {
    if ($tag === 'dynamic_shortcode') {
        $updated_output = $output;
        return $updated_output;
    }

    return $output;
}
?>
