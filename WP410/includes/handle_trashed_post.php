<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_trash_post', 'wp410_handle_post_trashed', 10, 1);
add_action('untrash_post', 'wp410_handle_post_restored', 10, 1);

function wp410_handle_post_trashed($post_id) {
    $auto_410_on_delete = get_option('wp410_auto_410_on_delete');
    if ($auto_410_on_delete) {
        $url = get_permalink($post_id);

        $urls_config = get_option('wp410_urls');
        $urls = array_filter(array_map('trim', explode("\n", $urls_config)));
        $urls[] = $url;

        $urls = array_unique($urls);
        update_option('wp410_urls', implode("\n", $urls));
    }
}

function wp410_handle_post_restored($post_id) {
    $auto_410_on_delete = get_option('wp410_auto_410_on_delete');
    if ($auto_410_on_delete) {
        $url = get_permalink($post_id);

        $urls_config = get_option('wp410_urls');
        $urls = array_filter(array_map('trim', explode("\n", $urls_config)));
        
        $urls = array_filter($urls, function($stored_url) use ($url) {
            return $stored_url !== $url;
        });

        update_option('wp410_urls', implode("\n", $urls));
    }
}