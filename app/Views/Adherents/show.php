<?php $title = "Détails de l'adhérent" ?>

<div class="container col-7 mt-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Détails de l'adhérent</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Numéro adhérent :</strong> <?= $adherent->id_adherent ?></li>
                <li class="list-group-item"><strong>Nom :</strong> <?= $adherent->nom ?></li>
                <li class="list-group-item"><strong>Prénom :</strong> <?= $adherent->prenom ?></li>
                <li class="list-group-item"><strong>Adresse :</strong> <?= $adherent->adresse ?></li>
                <li class="list-group-item"><strong>Email :</strong> <?= $adherent->email ?></li>
            </ul>
        </div>
    </div>
</div>

<div class="container mt-4 col-10">
    <h3>Livres Possédés :</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Auteur</th>
                <th scope="col">Date d'emprunt</th>
                <th scope="col">Date de retour</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livres as $key => $livre) : ?>
                <tr class="<?= $key % 2 === 0 ? 'even-row' : 'odd-row' ?>">
                    <td><?= $livre->titre ?></td>
                    <td><?= $livre->auteur ?></td>
                    <td><?= $livre->date_emprunt ?></td>
                    <td><?= $livre->date_retour ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<a href="index.php?controller=adherents&action=index" class="btn btn-primary my-3">Retour à la liste</a>