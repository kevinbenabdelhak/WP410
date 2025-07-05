=== WP410 ===
Contributors: kevinbenabdelhak
Tags: WordPress, Code HTTP 410, SEO, URL
Requires at least: 5.0
Tested up to: 6.5.3
Requires PHP: 7.0
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
WP410 vous permet de gérer le statut HTTP 410 pour vos URLs, améliorant ainsi l'expérience utilisateur et le référencement.

== Description ==
### WP410 - Gestionnaire de Statuts HTTP 410 pour Vos URLs

WP410 est un plugin conçu pour vous donner un contrôle total sur la gestion des statuts HTTP 410 sur votre site. Le statut 410 indique que la ressource demandée a été supprimée de façon permanente et que cette suppression est intentionnelle et définitive. Utiliser ce statut de manière appropriée améliore l'expérience utilisateur tout en optimisant le référencement de votre site en réduisant les erreurs 404.

#### Fonctionnalités principales :
1. **Marquage manuel de 410 : Ajoutez des URLs individuellement ou en utilisant des jokers (*) pour marquer des sous-arborescences complètes comme 410.
2. **Version CSV** : Importez un fichier CSV pour marquer plusieurs URLs d'un coup.
3. **Exclusions** : Excluez des URLs du sitemap XML et du flux RSS pour une gestion plus fine.
4. **410 Automatique** : Activez le marquage automatique de 410 à la suppression de publications.
5. **Modèle Personnalisé de Page 410** : Sélectionnez ou créez un modèle de page dédié pour les statuts 410.


== Installation ==
1. **Téléchargez le fichier ZIP du plugin :**
   Rendez-vous sur la page de WP410 sur https://kevin-benabdelhak.fr/plugins/wp410/ et téléchargez le fichier ZIP du plugin.

2. **Uploader le fichier ZIP du plugin :**
   - Allez dans le panneau d'administration de WordPress et cliquez sur "Extensions" > "Ajouter".
   - Cliquez sur "Téléverser une extension".
   - Choisissez le fichier ZIP que vous avez téléchargé et cliquez sur "Installer maintenant".

3. **Activer le plugin :**
   Une fois le plugin installé, cliquez sur "Activer".

4. **Utilisation du plugin :**
   - Accédez à la nouvelle section WP410 dans votre panneau d'administration.
   - Ajoutez les URLs que vous souhaitez marquer comme 410 dans la zone de texte prévue à cet effet.
   - Configurez les options supplémentaires selon vos besoins.
   - Si vous avez un problème d'accès à votre sitemap, regénérez simplement vos permaliens ("Réglages" > "Permaliens" >"Enregistrer les modifications")


== Changelog ==
= 1.0 =
* Premier lancement du plugin.
* Ajout de la gestion manuelle et automatique des statuts HTTP 410.
* Intégration d'options d'exclusion pour le sitemap XML et le flux RSS.
* Introduction de l'importation par CSV pour le marquage multiple.