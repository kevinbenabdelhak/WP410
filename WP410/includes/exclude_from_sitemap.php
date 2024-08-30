<?php

if (!defined('ABSPATH')) {
    exit;
}

add_filter('wp_sitemaps_posts_query_args', 'wp410_exclude_from_sitemap');
add_filter('wpseo_sitemap_entry', 'wp410_exclude_from_yoast_sitemap', 10, 3);
add_filter('rank_math/sitemap/enable_caching', '__return_false');
add_filter('rank_math/sitemap/entry', 'wp410_exclude_from_rankmath_sitemap', 10, 3);

function wp410_get_exclude_ids() {
    $urls_config = get_option('wp410_urls');
    $apply_to_parents = get_option('wp410_apply_to_parents');
    $exclude_ids = [];

    if ($urls_config) {
        $urls = array_filter(array_map('trim', explode("\n", $urls_config)));

        foreach ($urls as $url) {
            if (strpos($url, '*') !== false) {
                $url = rtrim($url, '*');
                $posts = get_posts(['post_type' => 'any', 'numberposts' => -1]);
                
                foreach ($posts as $post) {
                    if (strpos(get_permalink($post->ID), $url) === 0) {
                        if (!$apply_to_parents && rtrim(get_permalink($post->ID), '/') == rtrim($url, '/')) {
                            continue;
                        }
                        $exclude_ids[] = $post->ID;
                    }
                }
            } else {
                $post = get_page_by_path(str_replace(home_url(), '', $url), OBJECT, get_post_types(['public' => true]));
                if ($post) {
                    $exclude_ids[] = $post->ID;
                }
            }
        }
    }

    return array_unique($exclude_ids);
}



/* supprimer publication dans sitemap standard WP*/ 

function wp410_exclude_from_sitemap($args) {
    $remove_from_sitemap = get_option('wp410_remove_from_sitemap');
    if ($remove_from_sitemap) {
        $exclude_ids = wp410_get_exclude_ids();
        if ($exclude_ids) {
            $args['post__not_in'] = array_merge($args['post__not_in'] ?: [], $exclude_ids);
        }
    }

    return $args;
}





/* supprimer publication sur yoast et rankmath*/ 
function wp410_exclude_from_yoast_sitemap($url, $type, $post) {
    $remove_from_sitemap = get_option('wp410_remove_from_sitemap');
    if ($remove_from_sitemap) {
        $exclude_ids = wp410_get_exclude_ids();
        if (in_array($post->ID, $exclude_ids)) {
            return false;
        }
    }

    return $url;
}

function wp410_exclude_from_rankmath_sitemap($url, $type, $object) {
    $remove_from_sitemap = get_option('wp410_remove_from_sitemap');
    if ($remove_from_sitemap && $type === 'post') {
        $exclude_ids = wp410_get_exclude_ids();
        if (in_array($object->ID, $exclude_ids)) {
            return false;
        }
    }

    return $url;
}