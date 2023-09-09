<?php
namespace models;

use models\Model;
use PDOException;
use PDO;



class Cart extends Model {
    private array $products = [];

    public function __construct(string $user_id) {
        try {
            $query = $this->db->prepare("SELECT * FROM `cart` WHERE `user_id` = '$user_id'");
            $query->execute();
            $products = $query->fetchAll(PDO::FETCH_ASSOC);
            $this->products = $products[0];

        }
        catch (PDOException $ex) {
            echo "ERROR : " . $ex->getMessage();
            
        }
    }
    public function get_cart_products () {
        return $this->products;
    }

}



?>