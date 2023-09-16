<?php

namespace models;

session_start();
use models;
use PDOException;
use PDO;

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
    /**
     * Get product by id reurn fasle if product does not exist
     * 
     * @param string $product_id
     * @return array | bool
     */
    public function get_product_by_id(string $id): array|bool
    {
        try {
            $query = $this->db->prepare("SELECT * FROM `products` WHERE `id` = '$id'");
            $query->execute();
            $product = $query->fetchAll(PDO::FETCH_ASSOC);
            if ($product) {
                return $product;

            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "ERROR : " . $e->getMessage();
            return false;
        }
    }

    /**
     * GET ALL PRODUCT FROM DATABSE ORDERED BY TIMESTAMP AND LIMIT TO 20 PRODUCTS
     * 
     * @return array | bool
     * 
     */
    public function get_all_products(): array|bool
    {
        try {
            $query = $this->db->query("SELECT * FROM `products`");
            $query->execute();
            $products = $query->fetchAll(PDO::FETCH_ASSOC);
            var_dump($products);
            if ($products) {
                return $products;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "ERROR : " . $ex->getMessage();
            return false;
        }
    }

    /**
     * Add product into database return true if added succesfuly
     * 
     * @param string $product_name
     * @param string $product_description
     * @param int $price 
     * @param int $type_id 
     * @param string $photo_url
     * @return bool 
     */
    public function add_product(string $model, string $brand, string $product_description, int $price, int $type_id, string $photo_url): bool
    {
        try {
            // Используйте подготовленное выражение для вставки данных
            $query = $this->db->prepare("INSERT INTO `products` (`id`, `model`, `brand`, `description`, `price`, `type_id`, `photo`) 
                VALUES (NULL, :model, :brand, :product_description, :price, :type_id, :photo_url)");

            // Привяжите значения к параметрам подготовленного выражения
            $query->bindParam(':model', $model);
            $query->bindParam(':brand', $brand);
            $query->bindParam(':product_description', $product_description);
            $query->bindParam(':price', $price);
            $query->bindParam(':type_id', $type_id);
            $query->bindParam(':photo_url', $photo_url);

            $query->execute();
            return true;
        } catch (PDOException $ex) {
            $_SESSION['error-message'] = "ERROR: " . $ex->getMessage();
            return false;
        }
    }

    /**
     * Delete product
     * @param int $product_id
     * 
     * @return bool
     */
    public function delete_product(int $product_id): bool
    {
        try {
            $query = $this->db->query("DELETE * FROM `products` WHERE `id` = '$product_id'");
            $query->execute();
            return true;
        } catch (PDOException $ex) {
            echo "ERROR : " . $ex->getMessage();
            return false;
        }
    }
    /**
     * ADD PRODUCT TO USER CART
     * 
     * @param int $user_id
     * @param int $product_id
     *
     * @return bool 
     */

    public function add_to_cart(int $product_id): bool
    {
        try {
            $_SESSION['cart'] = $_SESSION['cart'] . (string) $product_id . ",";

            return true;
        } catch (PDOException $ex) {
            $_SESSION['error-message'] = 'Error : ' . $ex->getMessage();
            echo $ex->getMessage();
            return false;
        }
    }

    /**
     * GET USER`S product cart
     * @param int $user_id
     * 
     * @reutn array
     */
    public function get_product_cart(?string $products_id): array|bool
    {
        try {
            $query = $this->db->prepare("WITH RECURSIVE SplitStrings AS (
                SELECT
                  1 AS Id,
                  SUBSTRING_INDEX('$products_id', ',', 1) AS Value
                UNION ALL
                SELECT
                  Id + 1,
                  SUBSTRING_INDEX(SUBSTRING_INDEX('$products_id', ',', Id + 1), ',', -1) AS Value
                FROM
                  SplitStrings
                WHERE
                  Id < LENGTH('$products_id') - LENGTH(REPLACE('$products_id', ',', '')) + 1
              )
              
              SELECT
                p.*
              FROM
                products p
              JOIN
                SplitStrings s ON p.id = s.Value;
              ");

            $query->execute();
            $cart = $query->fetchAll(PDO::FETCH_ASSOC);
            if ($cart) {

                return $cart;
            } else {
                return [];
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    public function clear_cart(string $user_id): bool
    {
        try {
            $query = $this->db->query("DELETE * FROM `cart` WHERE `user_id` = '$user_id'");
            $query->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    /**
     * GET PRODUCTS BY TYPE
     * @param int $type_ud
     * 
     * @return array | bool
     */

     public function get_products_by_type (string $type_id) {
        try
        {
            $query = $this->db->prepare("SELECT * FROM `products` WHERE `type_id` = '$type_id'");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            if($result)
            {
                return $result;
            }
            else 
            {
                return false;
            }

        }
        catch(PDOException $ex)
        {
            $_SESSION['error-message'] = "ERROR : " . $ex->getMessage();
            return false;
        }
     }
     /**
      * Filer product by Brand
      *@param string $brands
      *@param string $type
      *@return array | bool
      */
      public function get_product_by_brand (string $brand,string $type) : array | bool {
        try
        {   
            $query = $this->db->prepare("SELECT * FROM `products` WHERE `brand` = '$brand' AND `type_id` = '$type'");
            $query->execute();
            $products = $query->fetchAll(PDO::FETCH_ASSOC);
            if($products)
            {
                return $products;
            }
            else
            {
                return [];
            }
        }
        catch (PDOException $ex)
        {
            $_SESSION['error-kmessage'] = $ex->getMessage();
            return false;
        }
      }

}




?>