<?php

namespace App\Controllers;

use App\Core\DbConnect;
use App\Models\AdherentsModel;

class AdherentsController extends Controller
{
    // Affiche la liste des adhérents
    public function index()
    {
        $adherentsModel = new AdherentsModel();
        $adherents = $adherentsModel->getAllAdherents();

        $data = [
            'page_title' => 'Adhérants',
            'adherents' => $adherents,
        ];

        $this->render('Adherents/adherents', $data);
    }

    // Ajoute un nouvel adhérent
    public function addAdherent()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];
            $email = $_POST['email'];

            $adherentsModel = new AdherentsModel();
            $adherentsModel->addAdherent($nom, $prenom, $adresse, $email);

            header('Location: index.php?controller=adherents&action=index');
            exit();
        }

        $data = [
            'page_title' => 'Ajouter un adhérent',
        ];

        $this->render('Adherents/add', $data);
    }

    // Met à jour un adhérent existant
    public function updateAdherent($id_adherent)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];
            $email = $_POST['email'];

            $adherentsModel = new AdherentsModel();
            $adherentsModel->updateAdherent($id_adherent, $nom, $prenom, $adresse, $email);

            header('Location: index.php?controller=adherents&action=index');
            exit();
        }

        $adherentsModel = new AdherentsModel();
        $adherent = $adherentsModel->getAdherentById($id_adherent);

        $data = [
            'page_title' => 'Mettre à jour un adhérent',
            'adherent' => $adherent,
        ];

        $this->render('Adherents/update', $data);
    }

    // Affiche les détails d'un adhérent et les livres empruntés
    public function showAdherent($id_adherent)
    {
        $adherentsModel = new AdherentsModel();
        $adherent = $adherentsModel->getAdherentById($id_adherent);
        $livres = $adherentsModel->getLivresParIdAdherent($id_adherent);

        $data = [
            'page_title' => "Détails de l'adhérent",
            'adherent' => $adherent,
            'livres' => $livres,
        ];

        $this->render('Adherents/show', $data);
    }

    // Supprime un adhérent
    public function deleteAdherent($id_adherent)
    {
        $adherentsModel = new AdherentsModel();
        $adherent = $adherentsModel->getAdherentById($id_adherent);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $suppressionReussie = $adherentsModel->deleteAdherent($id_adherent);

            if ($suppressionReussie) {
                header('Location: index.php?controller=adherents&action=index');
                exit();
            } else {
                // Afficher une alerte indiquant que la suppression n'est pas possible
                $alertMessage = "Impossible de supprimer l'adhérent. Des livres sont associés.";
            }
        }

        $data = [
            'page_title' => 'Supprimer un adhérent',
            'adherent' => $adherent,
            'alertMessage' => $alertMessage ?? null,
        ];

        $this->render('Adherents/delete', $data);
    }
}
