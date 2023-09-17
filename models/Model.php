<?php

namespace models;
use PDO;
use PDOException;
class Model {
    private string $hostname = "localhost";
    private string $login = "root";
    private string $db_password = "zPJ39FswVnwdNKBX";
    private string $db_name = "XSkate";
    
    protected PDO $db;


    public function __construct() {
        try {
            $this->db = new PDO(
                "mysql:host=" . $this->hostname . ";dbname=" . $this->db_name,
                $this->login,
                $this->db_password);
                
            
        }catch (PDOException $e) {
            echo "DB ERROR : " . $e->getMessage();
        }
    }
}


?>