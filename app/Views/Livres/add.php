<!-- POP-UP -->
<?php if (isset($_SESSION['error_message'])) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['error_message'] ?>
    </div>
    <?php unset($_SESSION['error_message']);
    ?>
<?php endif;

$title = "Ajouter un livre" ?>

<h2>Ajouter un livre</h2>

<form action="index.php?controller=livres&action=addLivre" method="post">
    <div class="form-group my-3 col-md-8 col-lg-5">
        <label for="titre">Titre du livre :</label>
        <input type="text" class="form-control" id="titre" name="titre" required>
    </div>

    <div class="form-group my-3 col-md-8 col-lg-5">
        <label for="auteur">Auteur :</label>
        <input type="text" class="form-control" id="auteur" name="auteur" required>
    </div>

    <div class="form-group my-3 col-md-4 col-lg-2">
        <label for="date_emprunt">Date d'emprunt :</label>
        <input type="date" class="form-control" id="date_emprunt" name="date_emprunt" required>
    </div>

    <div class="form-group my-3 col-md-4 col-lg-2">
        <label for="date_retour">Date de retour :</label>
        <input type="date" class="form-control" id="date_retour" name="date_retour">
    </div>


    <div class="form-group my-3 col-md-6 col-lg-3 position-relative">
        <label for="id_adherent">Numéro d'adhérent:</label>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownIdAdherent" data-bs-toggle="dropdown" aria-expanded="false">
                Sélectionnez un adhérent
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownIdAdherent">
                <?php foreach ($idAdherentsDisponibles as $idAdherent) : ?>
                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="updateDropdownText('dropdownIdAdherent', '<?= $idAdherent ?>')"><?= $idAdherent ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="form-group my-3 col-md-6 col-lg-3 position-relative">
        <label for="id_etg">Numéro d'étagère':</label>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownIdEtg" data-bs-toggle="dropdown" aria-expanded="false">
                Sélectionnez une étagère
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownIdEtg">
                <?php foreach ($idEtgDisponibles as $idEtg) : ?>
                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="updateDropdownText('dropdownIdEtg', '<?= $idEtg ?>')"><?= $idEtg ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <input type="hidden" id="id_adherent_hidden" name="id_adherent" value="">
    <input type="hidden" id="id_etg_hidden" name="id_etg" value="">

    <button type="submit" class="btn btn-success">Ajouter</button>
</form>

<script>
    // Fonction pour mettre à jour la liste déroulante
    function updateDropdownText(dropdownId, selectedText) {

        // Met à jour la liste déroulante avec l'ID spécifié
        document.getElementById(dropdownId).innerText = selectedText;

        // Vérifie si la liste déroulante est celle des adhérents
        if (dropdownId === 'dropdownIdAdherent') {
            // Met à jour la valeur d'un champ caché associé aux adhérents
            document.getElementById('id_adherent_hidden').value = selectedText;

            // Vérifie si la liste déroulante est celle des étagère
        } else if (dropdownId === 'dropdownIdEtg') {
            // Met à jour la valeur étagère
            document.getElementById('id_etg_hidden').value = selectedText;
        }
    }
</script>