<?php

if (!defined('ABSPATH')) {
    exit;
}


add_action('admin_menu', 'wp410_add_admin_menu');

function wp410_add_admin_menu() {
    add_options_page('WP410 Options', 'WP410', 'manage_options', 'wp410', 'wp410_options_page');
}

function wp410_options_page() {
    ?>
    <div class="wrap">
        <h1>WP410</h1>
        <p>Entrez les URLs que vous souhaitez marquer comme 410 dans la zone de texte ci-dessous.</p>
        <p>Astuce : Vous pouvez utiliser un astérisque (*) comme joker pour marquer un sous-arborescence entière d'une URL. Par exemple, ajouter <code>https://votresite.local/categorie1/*</code> marquera toutes les pages sous <code>/categorie1/</code> comme 410.</p>
        <form action='options.php' method='post'>
            <?php
            settings_fields('wp410');
            do_settings_sections('wp410');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}