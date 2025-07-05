<?php

if (!defined('ABSPATH')) {
    exit;
}


add_action('template_redirect', 'wp410_handle_410');

function wp410_handle_410() {
    $urls_config = get_option('wp410_urls');
    $apply_to_parents = get_option('wp410_apply_to_parents');
    $page_id = get_option('wp410_410_page_id');

    if ($urls_config) {
        $urls = array_filter(array_map('trim', explode("\n", $urls_config)));
        $current_url = home_url($_SERVER['REQUEST_URI']);

        foreach ($urls as $url) {
            if (strpos($url, '*') !== false) {
                $url = rtrim($url, '*');
                if (strpos($current_url, $url) === 0) {
                    if (!$apply_to_parents && rtrim($current_url, '/') == rtrim($url, '/')) {
                        continue;
                    }
                    status_header(410);
                    nocache_headers();
                    if ($page_id) {
                        $GLOBALS['wp_query'] = new WP_Query(array(
                            'page_id' => $page_id
                        ));
                        include(get_page_template());
                        exit();
                    } else {
                        echo '410 Gone';
                        exit();
                    }
                }
            } else if ($current_url === $url) {
                status_header(410);
                nocache_headers();
                if ($page_id) {
                    $GLOBALS['wp_query'] = new WP_Query(array(
                        'page_id' => $page_id
                    ));
                    include(get_page_template());
                    exit();
                } else {
                    echo '410 Gone';
                    exit();
                }
            }
        }
    }
}