<?php $title = "Contact" ?>

<div class="container col-4 mt-5">
    <h2>Formulaire de Contact</h2>
    <form action="#" method="post">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom">
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone : (facultatif) </label>
            <input type="tel" class="form-control" id="telephone" name="telephone">
        </div>

        <button type="submit" class="btn btn-primary mt-5">Envoyer</button>
    </form>
</div>



<!-- ------------------Infos------------------- -->
<div class="mt-5">
    <pre> form action="#" method="post" Formulaire a réaliser</pre>
</div>