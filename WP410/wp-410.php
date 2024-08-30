<?php
/**
 * Plugin Name: WP410
 * Plugin URI: https://kevin-benabdelhak.fr/plugins/wp410/
 * Description: WP410 est un plugin conçu pour vous donner un contrôle total sur la gestion des statuts HTTP 410 sur votre site. Le statut 410 indique que la ressource demandée a été supprimée de façon permanente et que cette suppression est intentionnelle et définitive. 
 * Version: 1.0
 * Author: Kevin Benabdelhak
 * Author URI: https://kevin-benabdelhak.fr/
 * Text Domain: wp410
 * Contributors: kevinbenabdelhak
 */

if (!defined('ABSPATH')) {
    exit;
}

define('WP410_PLUGIN_DIR', plugin_dir_path(__FILE__));

require_once WP410_PLUGIN_DIR . 'includes/admin_menu.php';
require_once WP410_PLUGIN_DIR . 'includes/settings_init.php';
require_once WP410_PLUGIN_DIR . 'includes/settings_render.php';
require_once WP410_PLUGIN_DIR . 'includes/handle_410.php';
require_once WP410_PLUGIN_DIR . 'includes/exclude_from_sitemap.php';
require_once WP410_PLUGIN_DIR . 'includes/handle_trashed_post.php';
require_once WP410_PLUGIN_DIR . 'includes/exclude_from_rss.php';

add_action('admin_enqueue_scripts', function() {
    wp_enqueue_script('wp410-admin', plugin_dir_url(__FILE__) . 'assets/js/admin.js', array('jquery'), '1.0', true);
});