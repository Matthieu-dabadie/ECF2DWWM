<?php

namespace App\Models;

use PDO;
use App\Core\DbConnect;

require_once __DIR__ . '/../Core/DbConnect.php';

class LivresModel
{
    private $db;

    public function __construct()
    {
        $this->db = DbConnect::getInstance()->getConnection();
    }

    public function getAllLivres()
    {
        $query = "SELECT * FROM livres";
        $stmt = $this->db->query($query);


        $livres = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $livres;
    }

    public function getLivreByCote($cote_livre)
    {
        $query = "SELECT * FROM livres WHERE cote_livre = :cote_livre";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':cote_livre', $cote_livre, PDO::PARAM_INT);
        $stmt->execute();


        $livre = $stmt->fetch(PDO::FETCH_OBJ);

        return $livre;
    }

    public function addLivre($titre, $auteur, $date_emprunt, $date_retour, $id_adherent, $id_etg)
    {

        $query = "INSERT INTO livres (titre, auteur, date_emprunt, date_retour, id_adherent, id_etg) VALUES (:titre, :auteur, :date_emprunt, :date_retour, :id_adherent, :id_etg)";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
        $stmt->bindParam(':auteur', $auteur, PDO::PARAM_STR);
        $stmt->bindParam(':date_emprunt', $date_emprunt, PDO::PARAM_STR);
        $stmt->bindParam(':date_retour', $date_retour, PDO::PARAM_STR);
        $stmt->bindParam(':id_adherent', $id_adherent, PDO::PARAM_INT);
        $stmt->bindParam(':id_etg', $id_etg, PDO::PARAM_INT);

        $livreAjoute = $stmt->execute();
        return $livreAjoute;
    }

    public function deleteLivre($cote_livre)
    {
        $query = "DELETE FROM livres WHERE cote_livre = :cote_livre";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':cote_livre', $cote_livre, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function updateLivre($cote_livre, $titre, $auteur, $date_emprunt, $date_retour, $id_adherent, $id_etg)
    {

        $query = "UPDATE livres SET titre = :titre, auteur = :auteur, date_emprunt = :date_emprunt, date_retour = :date_retour, id_adherent = :id_adherent, id_etg = :id_etg WHERE cote_livre = :cote_livre";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':cote_livre', $cote_livre, PDO::PARAM_INT);
        $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
        $stmt->bindParam(':auteur', $auteur, PDO::PARAM_STR);
        $stmt->bindParam(':date_emprunt', $date_emprunt, PDO::PARAM_STR);
        $stmt->bindParam(':date_retour', $date_retour, PDO::PARAM_STR);
        $stmt->bindParam(':id_adherent', $id_adherent, PDO::PARAM_INT);
        $stmt->bindParam(':id_etg', $id_etg, PDO::PARAM_INT);

        $livreMisAJour = $stmt->execute();
        return $livreMisAJour;
    }

    public function getLivresEmpruntesParAdherent($id_adherent)
    {
        $query = "SELECT * FROM livres WHERE id_adherent = :id_adherent";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_adherent', $id_adherent, PDO::PARAM_INT);
        $stmt->execute();

        $livresEmpruntes = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $livresEmpruntes;
    }
}
