<?php if (isset($alertMessage)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $alertMessage ?>
    </div>
<?php endif;
$title = "Supprimer un adhérent" ?>

<h2>Supprimer un adhérent</h2>

<p>Êtes-vous sûr de vouloir supprimer l'adhérent <?= $adherent->nom ?> <?= $adherent->prenom ?> ?</p>

<form action="index.php?controller=adherents&action=deleteAdherent&id_adherent=<?= $adherent->id_adherent ?>" method="post">
    <button type="submit" class="btn btn-danger">Supprimer</button>
</form>