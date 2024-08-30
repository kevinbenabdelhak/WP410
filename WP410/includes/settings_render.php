<?php

if (!defined('ABSPATH')) {
    exit;
}


function wp410_textarea_render() {
    $options = get_option('wp410_urls');
    ?>
    <textarea rows='10' cols='100' name='wp410_urls' id='wp410_urls'><?php echo esc_textarea($options); ?></textarea>
    <?php
}

function wp410_import_csv_render() {
    ?>
    <button type="button" id="toggle_import_csv">Afficher/Masquer Importer CSV</button>
    <div class="import-csv" style="display: none;">
        <label for="csv_file">Importer depuis un fichier CSV :</label>
        <input type="file" id="csv_file" accept=".csv" />
        <br>
        <label for="csv_column_index">Indiquez le numéro de la colonne contenant les URLs :</label>
        <input type="number" id="csv_column_index" min="0" value="0" />
        <button type="button" id="import_csv_button">Importer CSV</button>
    </div>
    <?php
}

function wp410_remove_from_sitemap_render() {
    $options = get_option('wp410_remove_from_sitemap');
    ?>
    <input type='checkbox' name='wp410_remove_from_sitemap' value='1' <?php checked($options, 1); ?>>
    <span class="description"><?php _e("Exclure les URLs du sitemap", "wp410"); ?></span>
    <?php
}

function wp410_apply_to_parents_render() {
    $options = get_option('wp410_apply_to_parents');
    ?>
    <input type='checkbox' name='wp410_apply_to_parents' value='1' <?php checked($options, 1); ?>>
    <span class="description"><?php _e("Appliquer aux URL parents les exclusions avec des astérisques", "wp410"); ?></span>
    <?php
}

function wp410_remove_from_rss_render() {
    $options = get_option('wp410_remove_from_rss');
    ?>
    <input type='checkbox' name='wp410_remove_from_rss' value='1' <?php checked($options, 1); ?>>
    <span class="description"><?php _e("Exclure les URLs du flux RSS", "wp410"); ?></span>
    <?php
}

function wp410_auto_410_on_delete_render() {
    $options = get_option('wp410_auto_410_on_delete');
    ?>
    <input type='checkbox' name='wp410_auto_410_on_delete' value='1' <?php checked($options, 1); ?>>
    <span class="description"><?php _e("Activer 410 automatique lorsque des publications sont supprimées", "wp410"); ?></span>
    <?php
}

function wp410_410_page_id_render() {
    $option = get_option('wp410_410_page_id');
    $pages = get_pages();
    ?>
    <select name="wp410_410_page_id">
        <option value=""><?php _e('Sélectionnez une page 410', 'wp410'); ?></option>
        <?php
        foreach ($pages as $page) {
            $selected = ($page->ID == $option) ? 'selected="selected"' : '';
            echo '<option value="' . esc_attr($page->ID) . '" ' . $selected . '>' . esc_html($page->post_title) . '</option>';
        }
        ?>
    </select>
    <?php
}