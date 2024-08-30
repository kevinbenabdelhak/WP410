jQuery(document).ready(function($) {
    $('#toggle_import_csv').on('click', function() {
        $('.import-csv').slideToggle();
    });

    $('#import_csv_button').on('click', function(event) {
        event.preventDefault();
        var fileInput = $('#csv_file')[0];
        var columnIndex = parseInt($('#csv_column_index').val());

        if (fileInput.files.length === 0) {
            alert('Veuillez sélectionner un fichier CSV.');
            return;
        }

        if (isNaN(columnIndex) || columnIndex < 0) {
            alert('Numéro de colonne invalide.');
            return;
        }

        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var contents = e.target.result;
            var lines = contents.split('\n');

            var urls = [];
            for (var i = 1; i < lines.length; i++) { // Commencer à 1 pour ignorer l'en-tête
                var line = lines[i].trim().split(',');
                if (line[columnIndex]) {
                    urls.push(line[columnIndex].trim());
                }
            }
            var existingUrls = $('#wp410_urls').val();
            if (existingUrls) {
                existingUrls = existingUrls.split('\n');
            } else {
                existingUrls = [];
            }
            var newUrls = existingUrls.concat(urls);
            newUrls = newUrls.filter(function(value, index, self) {
                return self.indexOf(value) === index;
            });
            $('#wp410_urls').val(newUrls.join('\n'));
            alert('CSV importé avec succès !');
        };

        reader.readAsText(file);
    });
});