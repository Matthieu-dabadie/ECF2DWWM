<?php

namespace App\Models;

use App\Core\DbConnect;
use PDO;

class EtgModel
{
    protected $db;

    public function __construct()
    {
        $this->db = DbConnect::getInstance()->getConnection();
    }

    public function getIdEtgDisponibles()
    {
        $query = "SELECT id_etg FROM etg";
        $result = $this->db->query($query);

        $idEtg = [];
        while ($row = $result->fetchColumn()) {
            $idEtg[] = $row;
        }

        return $idEtg;
    }

    public function etgExists($idEtg)
    {
        $query = "SELECT COUNT(*) FROM etg WHERE id_etg = :idEtg";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idEtg', $idEtg, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

    public function ajouterEtg($idEtg)
    {
        $query = "INSERT INTO etg (id_etg) VALUES (:idEtg)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idEtg', $idEtg, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function supprimerEtg($idEtg)
    {
        if ($this->etgExists($idEtg)) {
            $query = "DELETE FROM etg WHERE id_etg = :idEtg";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':idEtg', $idEtg, PDO::PARAM_INT);

            return $stmt->execute();
        } else {
            $_SESSION['error_message'] = "L'étagère avec le numéro $idEtg n'existe pas.";
            return false;
        }
    }
}
