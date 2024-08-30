<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('pre_get_posts', 'wp410_exclude_from_rss_feed');

function wp410_exclude_from_rss_feed($query) {
    if ($query->is_feed()) {
        $remove_from_rss = get_option('wp410_remove_from_rss');
        if ($remove_from_rss) {
            $exclude_ids = wp410_get_exclude_ids();
            if ($exclude_ids) {
                $query->set('post__not_in', array_merge($query->get('post__not_in') ?: [], $exclude_ids));
            }
        }
    }
}