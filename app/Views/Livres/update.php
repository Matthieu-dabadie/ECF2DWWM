<?php $title = "Mettre à jour un livre" ?>

<h2>Mettre à jour un livre</h2>

<form action="index.php?controller=livres&action=updateLivre&cote_livre=<?= $livre->cote_livre ?>" method="post">

    <div class="form-group">
        <label for="titre">Titre :</label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?= $livre->titre ?>" required>
    </div>

    <div class="form-group">
        <label for="auteur">Auteur :</label>
        <input type="text" class="form-control" id="auteur" name="auteur" value="<?= $livre->auteur ?>" required>
    </div>


    <div class="form-group">
        <label for="date_emprunt">Date d'emprunt :</label>
        <input type="date" class="form-control" id="date_emprunt" name="date_emprunt" value="<?= $livre->date_emprunt ?>" required>
    </div>

    <div class="form-group">
        <label for="date_retour">Date de retour :</label>
        <input type="date" class="form-control" id="date_retour" name="date_retour" value="<?= $livre->date_retour ?>" required>
    </div>

    <div class="form-group my-3 col-md-8 col-lg-5">
        <label for="id_adherent">Numéro d'adhérent :</label>
        <input type="text" class="form-control" id="id_adherent" name="id_adherent" value="<?= $livre->id_adherent ?>" required>
    </div>

    <div class="form-group my-3 col-md-8 col-lg-5">
        <label for="id_etg">Numéro de rayon :</label>
        <input type="text" class="form-control" id="id_etg" name="id_etg" value="<?= $livre->id_etg ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Mettre à jour le livre</button>
</form>