<?php $title = "À propos de nous" ?>

<h2 class="m-5">À propos de nous</h2>
<div class="row">
    <div class="col-10">
        <p>Création de la gestion de bibliothèque.</p>
        <p>Structure MVC. </p>
        <p>J'ai séparé les vues livres des vues adhérent, j'ai créé des vues communes à toutes les pages (navbar, footer) et des vues annexes pour les pages additionnelles (à propos, contact).</p>
        <p>Pour le fichier SQL, j'ai dû retravailler le code. Mais maintenant, lors d'une importation, cela fonctionne correctement.</p>
        <p>Je dois avoir un problème de logique dans mon MCD. Je ne suis pas revenu dessus.</p>
        <p>J'ai ajouté des pop-up alertes pour : si un adhérent prend plus de trois livres, et si la date de retour est supérieure à 3 semaines, soit 21 jours à partir de la date actuelle. Au départ, j'étais parti sur un système de mails à l'adhérent pour signaler qu'il a dépassé 3 semaines, mais par manque de temps, j'ai choisi une méthode plus simple.</p>
        <p>Ajout d'une fenêtre pop-up rouge dans le cas où l'étagère existe déjà.</p>
        <p>Le formulaire de contact n'est pas fonctionnel.</p>
        <p>Je possédais déjà une base de structure MVC, je l'ai donc reprise et ajouté les fonctionnalités pour ajouter une étagère, ajouter un adhérent (j'ai repris un ancien code pour cette partie) et j'ai calqué les méthodes pour les livres.</p>
        <p>J'espère que l'application répond bien à la demande de l'exercice.</p>
    </div>
</div>