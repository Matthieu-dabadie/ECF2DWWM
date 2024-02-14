<?php

class DbConnect
{
    private $connection;
    private static $instance;

    private const SERVER = '127.1.1.1';
    private const PORT = '';
    private const USER = 'root';
    private const PASSWORD = '';
    private const DATABASE = 'cefiidev1380';

    private function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . self::SERVER . ';port=' . self::PORT . ';dbname=' . self::DATABASE,
                self::USER,
                self::PASSWORD,
                // array(PDO::UNIX_SOCKET => '/chemin/vers/le/fichier/socket/mysql.sock')
            );
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }


    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
