<?php

namespace App\Controllers;

use App\Models\LivresModel;
use App\Models\AdherentsModel;
use App\Models\EtgModel;

class LivresController extends Controller
{
    //Affiche la liste des livres.
    public function index()
    {

        $livresModel = new LivresModel();
        $livres = $livresModel->getAllLivres();


        $data = [
            'page_title' => 'Liste des livres',
            'livres' => $livres,
        ];

        $this->render('Livres/livres', $data);
    }

    //Ajoute un nouveau livre.
    public function addLivre()
    {
        $idAdherentsDisponibles = [];
        $idEtgDisponibles = [];

        $adherentsModel = new AdherentsModel();
        $idAdherentsDisponibles = $adherentsModel->getIdAdherentsDisponibles();

        $EtgModel = new EtgModel();
        $idEtgDisponibles = $EtgModel->getIdEtgDisponibles();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'] ?? null;
            $auteur = $_POST['auteur'] ?? null;
            $date_emprunt = $_POST['date_emprunt'] ?? null;
            $date_retour = $_POST['date_retour'] ?? null;
            $id_adherent = $_POST['id_adherent'] ?? null;
            $id_etg = $_POST['id_etg'] ?? null;

            // Vérifier si l'adhérent a déjà emprunté 3 livres
            $livresModel = new LivresModel();
            $livresEmpruntes = $livresModel->getLivresEmpruntesParAdherent($id_adherent);

            if (count($livresEmpruntes) >= 3) {
                $_SESSION['error_message'] = "L'adhérent a déjà emprunté 3 livres et ne peut pas emprunter plus.";
                header('Location: index.php?controller=livres&action=addLivre');
                exit();
            }

            // Vérifier si la date de retour est dans les 3 semaines
            $dateRetour = new \DateTime($date_retour);
            $dateActuelle = new \DateTime();
            $difference = $dateActuelle->diff($dateRetour);

            if ($difference->days > 21) {
                $_SESSION['error_message'] = "La date de retour doit être dans les 3 semaines.";
                header('Location: index.php?controller=livres&action=addLivre');
                exit();
            }

            // Ajouter le livre
            $livreAdded = $livresModel->addLivre($titre, $auteur, $date_emprunt, $date_retour, $id_adherent, $id_etg);

            if ($livreAdded) {
                header('Location: index.php?controller=livres&action=index');
                exit();
            } else {
                $_SESSION['error_message'] = "Une erreur s'est produite lors de l'ajout du livre. Veuillez réessayer.";
                header('Location: index.php?controller=livres&action=addLivre');
                exit();
            }
        }

        $data = [
            'page_title' => 'Ajouter un livre',
            'idAdherentsDisponibles' => $idAdherentsDisponibles,
            'idEtgDisponibles' => $idEtgDisponibles,
        ];

        $this->render('Livres/add', $data);
    }

    //Met à jour les informations d'un livre.
    public function updateLivre($cote_livre)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'];
            $auteur = $_POST['auteur'];
            $date_emprunt = $_POST['date_emprunt'];
            $date_retour = $_POST['date_retour'];
            $id_adherent = $_POST['id_adherent'];
            $id_etg = $_POST['id_etg'];


            $livresModel = new LivresModel();
            $livresModel->updateLivre($cote_livre, $titre, $auteur, $date_emprunt, $date_retour, $id_adherent, $id_etg);


            header('Location: index.php?controller=livres&action=index');
            exit();
        }


        $livresModel = new LivresModel();
        $livre = $livresModel->getLivreByCote($cote_livre);


        $data = [
            'page_title' => 'Mettre à jour un livre',
            'livre' => $livre,
        ];

        $this->render('Livres/update', $data);
    }

    //Affiche les détails d'un livre.
    public function showLivre($cote_livre)
    {

        $livresModel = new LivresModel();
        $livre = $livresModel->getLivreByCote($cote_livre);


        $adherentsModel = new AdherentsModel();
        $idAdherentsDisponibles = $adherentsModel->getIdAdherentsDisponibles();

        $EtgModel = new EtgModel();
        $idEtgDisponibles = $EtgModel->getIdEtgDisponibles();


        $data = [
            'page_title' => "Détails du livre",
            'livre' => $livre,
            'idAdherentsDisponibles' => $idAdherentsDisponibles,
            'idEtgDisponibles' => $idEtgDisponibles,
        ];

        $this->render('Livres/show', $data);
    }


    // Suprime un livre
    public function deleteLivre($cote_livre)
    {

        $livresModel = new LivresModel();
        $livre = $livresModel->getLivreByCote($cote_livre);


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $livresModel->deleteLivre($cote_livre);


            header('Location: index.php?controller=livres&action=index');
            exit();
        }


        $data = [
            'page_title' => 'Supprimer un livre',
            'livre' => $livre,
        ];

        $this->render('Livres/delete', $data);
    }
}
