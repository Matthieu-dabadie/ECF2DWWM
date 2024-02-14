<?php $title = "Ajouter un adhérent" ?>

<h2>Ajouter un adhérent</h2>

<form action="index.php?controller=adherents&action=addAdherent" method="post">

    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="form-group">
        <label for="prenom">Prénom:</label>
        <input type="text" class="form-control" id="prenom" name="prenom" required>
    </div>
    <div class="form-group">
        <label for="adresse">Adresse:</label>
        <input type="text" class="form-control" id="adresse" name="adresse" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>