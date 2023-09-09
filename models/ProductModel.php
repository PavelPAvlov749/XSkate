<?php

namespace models;

use models;


use PDOException;
use PDO;
use PhpParser\Error;


class ProductModel extends Model
{
    public $products = [];

    public function __construct()
    {

        try {
            parent::__construct();
            $query = $this->db->prepare("SELECT * FROM `products`");
            $query->execute();
            $this->products = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "DB ERROR : " . $e->getMessage();
        }


    }

    public function get_product_by_id(string $id)
    {
        try {
            $query = $this->db->prepare("SELECT * FROM `products` WHERE `id` = '$id'");
            $query->execute();
            $product = $query->fetchAll(PDO::FETCH_ASSOC);
            return $product;
    
        }
        catch (PDOException $e) {
            echo "ERROR : " . $e->getMessage();
        }


    }
}

?>