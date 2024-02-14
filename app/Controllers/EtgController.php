<?php

namespace App\Controllers;

use App\Models\EtgModel;


class EtgController extends Controller
{
    public function ajouterEtg()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = isset($_POST['action']) ? $_POST['action'] : '';

            if ($action === 'ajouter') {
                $this->ajouterEtagere();
            } elseif ($action === 'supprimer') {
                $this->supprimerEtagere();
            }
        }

        $data = [
            'page_title' => 'Gestion des Étagères',
        ];

        $this->render('ETG/add', $data);
    }

    private function ajouterEtagere()
    {
        $idEtg = $_POST['IdEtg'];
        $etgModel = new EtgModel();

        if (!$etgModel->etgExists($idEtg)) {
            $etgModel->ajouterEtg($idEtg);
            $_SESSION['success_message'] = "L'étagère avec le numéro $idEtg a été ajoutée avec succès.";
        } else {
            $_SESSION['error_message'] = "L'étagère avec le numéro $idEtg existe déjà.";
        }

        header('Location: ?controller=etg&action=ajouterEtg');
        exit();
    }

    private function supprimerEtagere()
    {
        $idEtgASupprimer = $_POST['supprimerIdEtg'];
        $etgModel = new EtgModel();

        if ($etgModel->supprimerEtg($idEtgASupprimer)) {
            $_SESSION['success_message'] = "L'étagère avec le numéro $idEtgASupprimer a été supprimée avec succès.";
        } else {
            $_SESSION['error_message'] = "Erreur lors de la suppression de l'étagère avec le numéro $idEtgASupprimer.";
        }

        header('Location: ?controller=etg&action=ajouterEtg');
        exit();
    }
}
