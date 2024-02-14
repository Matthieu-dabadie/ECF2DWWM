<?php

namespace App\Models;

use App\Models\Model;
use PDO;

class AdherentsModel extends Model
{
    // Récupère tous les adhérents depuis la base de données
    public function getAllAdherents()
    {
        $query = "SELECT * FROM adherents";
        $stmt = $this->db->query($query);
        $adherents = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $adherents;
    }

    // Ajoute un nouvel adhérent à la base de données
    public function addAdherent($nom, $prenom, $adresse, $email)
    {
        $query = "INSERT INTO adherents (nom, prenom, adresse, email) VALUES (:nom, :prenom, :adresse, :email)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    }

    // Supprime un adhérent de la base de données en utilisant son numéro d'adhérent
    public function deleteAdherent($id_adherent)
    {
        $livresModel = new LivresModel();
        // Vérifier s'il existe des livres associés à cet adhérent
        $livresAssocies = $livresModel->getLivresEmpruntesParAdherent($id_adherent);

        if (!empty($livresAssocies)) {
            // Il y a des livres associés, ne pas supprimer l'adhérent
            return false;
        }

        // Aucun livre associé, procéder à la suppression de l'adhérent
        $query = "DELETE FROM adherents WHERE id_adherent = :id_adherent";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_adherent', $id_adherent, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    }

    // Récupère les informations d'un adhérent en fonction de son numéro d'adhérent
    public function getAdherentById($id_adherent)
    {
        $query = "SELECT * FROM adherents WHERE id_adherent = :id_adherent";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_adherent', $id_adherent, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Met à jour les informations d'un adhérent dans la base de données
    public function updateAdherent($id_adherent, $nom, $prenom, $adresse, $email)
    {
        $query = "UPDATE adherents SET nom = :nom, prenom = :prenom, adresse = :adresse, email = :email WHERE id_adherent = :id_adherent";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id_adherent', $id_adherent, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Récupère les numéros d'adhérent disponibles dans la base de données
    public function getIdAdherentsDisponibles()
    {
        $query = "SELECT id_adherent FROM adherents";
        $result = $this->db->query($query);

        $idAdherents = [];
        while ($row = $result->fetchColumn()) {
            $idAdherents[] = $row;
        }

        return $idAdherents;
    }

    // Récupère les livres empruntés par un adhérent spécifique
    public function getLivresParIdAdherent($id_adherent)
    {
        $query = "SELECT livres.* FROM livres
                  WHERE livres.id_adherent = :id_adherent";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_adherent', $id_adherent, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
