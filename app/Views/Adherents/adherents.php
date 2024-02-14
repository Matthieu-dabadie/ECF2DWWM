<?php $title = "Liste des adhérents" ?>

<h2>Liste des adhérents</h2>

<a href="index.php?controller=adherents&action=addAdherent" class="btn btn-primary my-2">Ajouter un adhérent</a>


<table class="table">
    <thead>
        <tr>
            <th scope="col">Numéro adhérent</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Adresse</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($adherents as $adherent) : ?>
            <tr>
                <td><?= $adherent->id_adherent ?></td>
                <td><?= $adherent->nom ?></td>
                <td><?= $adherent->prenom ?></td>
                <td><?= $adherent->adresse ?></td>
                <td><?= $adherent->email ?></td>
                <td>
                    <a href='index.php?controller=adherents&action=showAdherent&id_adherent=<?= $adherent->id_adherent ?>' class='btn btn-info'><i class='fas fa-eye'></i></a>
                    <a href='index.php?controller=adherents&action=updateAdherent&id_adherent=<?= $adherent->id_adherent ?>' class='btn btn-warning'><i class='fas fa-pen'></i></a>
                    <a href='index.php?controller=adherents&action=deleteAdherent&id_adherent=<?= $adherent->id_adherent ?>' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>