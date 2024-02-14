<?php $title = "Détails du livre" ?>

<div class="container col-6 mt-4">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title text-center"><?= $livre->titre ?></h1>
            <p class="card-text mt-4"><strong>Auteur:</strong> <?= $livre->auteur ?></p>
            <p class="card-text"><strong>Date d'emprunt:</strong> <?= $livre->date_emprunt ?></p>
            <p class="card-text"><strong>Date de retour:</strong> <?= $livre->date_retour ?></p>
            <p class="card-text"><strong>Numéro d'adhérent:</strong> <?= $livre->id_adherent ?></p>
            <p class="card-text"><strong>Numéro de rayon:</strong> <?= $livre->id_etg ?></p>
            <a href="index.php?controller=livres&action=index" class="btn btn-primary mt-5">Retour à la liste des livres</a>
        </div>
    </div>
</div>