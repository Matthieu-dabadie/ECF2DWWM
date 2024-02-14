<?php $title = "Mettre à jour un adhérent" ?>

<h2>Mettre à jour un adhérent</h2>

<form action="index.php?controller=adherents&action=updateAdherent&id_adherent=<?= $adherent->id_adherent ?>" method="post">
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?= $adherent->nom ?>" required>
    </div>
    <div class="form-group">
        <label for="prenom">Prénom:</label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $adherent->prenom ?>" required>
    </div>
    <div class="form-group">
        <label for="adresse">Adresse:</label>
        <input type="text" class="form-control" id="adresse" name="adresse" value="<?= $adherent->adresse ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $adherent->email ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>