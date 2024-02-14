<?php $title = "Détails du livres" ?>

<h2>Liste des livres</h2>
<a href='index.php?controller=livres&action=addLivre' class='btn btn-primary my-2'>Ajouter un livre</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Cote Livre</th>
            <th scope="col">Titre</th>
            <th scope="col">Auteur</th>
            <th scope="col">Date Emprunt</th>
            <th scope="col">Date Retour</th>
            <th scope="col">Numéro Adhérent</th>
            <th scope="col">Numéro d'étagère</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($livres as $livre) : ?>
            <tr>
                <td><?= $livre->cote_livre ?></td>
                <td><?= $livre->titre ?></td>
                <td><?= $livre->auteur ?></td>
                <td><?= $livre->date_emprunt ?></td>
                <td><?= $livre->date_retour ?></td>
                <td><?= $livre->id_adherent ?></td>
                <td><?= $livre->id_etg ?></td>
                <td>
                    <a href='index.php?controller=livres&action=showLivre&cote_livre=<?= $livre->cote_livre ?>' class='btn btn-info'><i class='fas fa-eye'></i></a>
                    <a href='index.php?controller=livres&action=updateLivre&cote_livre=<?= $livre->cote_livre ?>' class='btn btn-warning'><i class='fas fa-pen'></i></a>
                    <a href='index.php?controller=livres&action=deleteLivre&cote_livre=<?= $livre->cote_livre ?>' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>