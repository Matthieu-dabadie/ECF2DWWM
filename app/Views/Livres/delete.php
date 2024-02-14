<?php $title = "Supprimer un livre" ?>

<h2>Supprimer un livre</h2>

<p>Êtes-vous sûr de vouloir supprimer le livre <?= $livre->titre ?> de l'auteur <?= $livre->auteur ?> ?</p>

<form action="index.php?controller=livres&action=deleteLivre&cote_livre=<?= $livre->cote_livre ?>" method="post">
    <button type="submit" class="btn btn-danger">Supprimer</button>
</form>