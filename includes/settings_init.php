<?php

if (!defined('ABSPATH')) {
    exit;
}


add_action('admin_init', 'wp410_settings_init');

function wp410_settings_init() {
    register_setting('wp410', 'wp410_urls');
    register_setting('wp410', 'wp410_remove_from_sitemap');
    register_setting('wp410', 'wp410_remove_from_rss');
    register_setting('wp410', 'wp410_apply_to_parents');
    register_setting('wp410', 'wp410_410_page_id');
    register_setting('wp410', 'wp410_auto_410_on_delete');

    add_settings_section('wp410_section', __('', 'wp410'), '', 'wp410');
    add_settings_field('wp410_textarea', __('Ajouter des URLs', 'wp410'), 'wp410_textarea_render', 'wp410', 'wp410_section');
    add_settings_field('wp410_import_csv', __('Importer des URLs depuis un fichier CSV', 'wp410'), 'wp410_import_csv_render', 'wp410', 'wp410_section');

    add_settings_section('wp410_additional_section', __('Options supplémentaires', 'wp410'), '', 'wp410');
    add_settings_field('wp410_remove_from_sitemap', __('Exclure les URLs du sitemap XML', 'wp410'), 'wp410_remove_from_sitemap_render', 'wp410', 'wp410_additional_section');
    add_settings_field('wp410_remove_from_rss', __('Exclure les URLs du flux RSS', 'wp410'), 'wp410_remove_from_rss_render', 'wp410', 'wp410_additional_section');
    add_settings_field('wp410_apply_to_parents', __('Appliquer aux URL parents (*)', 'wp410'), 'wp410_apply_to_parents_render', 'wp410', 'wp410_additional_section');
    add_settings_field('wp410_auto_410_on_delete', __('Activer 410 automatique à la suppression des publications', 'wp410'), 'wp410_auto_410_on_delete_render', 'wp410', 'wp410_additional_section');
    add_settings_field('wp410_410_page_id', __('Modèle de page 410', 'wp410'), 'wp410_410_page_id_render', 'wp410', 'wp410_additional_section');
}