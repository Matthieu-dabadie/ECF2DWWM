<!-- pop-up -->
<?php if (isset($_SESSION['error_message'])) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['error_message'] ?>
    </div>
    <?php unset($_SESSION['error_message']); ?>
<?php endif;
$title = "Gestion étagères" ?>


<div class="container mt-3">
    <h1 class="mb-4">Gestion des Étagères</h1>


    <!-- Suppression d'étagère -->
    <div class="delete-section mt-4 container">
        <h3>Supprimer une étagère</h3>
        <form method="post" action="" class="row g-3">
            <div class="col-md-2 mb-3">
                <label for="supprimerIdEtg" class="form-label"></label>
                <input type="text" class="form-control rounded-start" name="supprimerIdEtg" pattern="[1-9]\d*" title="Veuillez saisir uniquement des chiffres." required>
            </div>

            <div class="col-md-2 mb-3 d-flex align-items-end">
                <button type="submit" class="btn btn-danger rounded-end" name="action" value="supprimer">Supprimer</button>
            </div>
        </form>
    </div>

    <hr class="hr-add-etg">
    <!-- Ajout d'étagère -->
    <div class="add-section mt-4 container">
        <h3>Ajouter une étagère</h3>
        <form method="post" action="" class="row g-3">
            <div class="col-md-2 mb-3">
                <label for="IdEtg" class="form-label"></label>
                <input type="text" class="form-control rounded-start" name="IdEtg" pattern="[1-9]\d*" title="Veuillez saisir uniquement des chiffres." required>
            </div>

            <div class="col-md-2 mb-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary rounded-end" name="action" value="ajouter">Ajouter</button>
            </div>
        </form>
    </div>

    <hr class="hr-add-etg">

    <!-- Liste des étagères -->
    <h2 class="mb-3 mx-3">Liste des étagères :</h2>
    <div class="etg mt-4 pt-2">
        <div class="row mx-5">
            <?php
            $etgModel = new \App\Models\EtgModel();
            $idEtgDisponibles = $etgModel->getIdEtgDisponibles();

            foreach ($idEtgDisponibles as $idEtg) {
                $idEtgSafe = htmlspecialchars($idEtg, ENT_QUOTES, 'UTF-8');
                echo "<div class='col-md-2 mb-3'>$idEtgSafe</div>";
            }
            ?>
        </div>
    </div>
</div>