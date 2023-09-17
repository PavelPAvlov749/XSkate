<?php

declare(strict_types=1);
namespace models;

use models\Model;
use PDOException;
use PDO;


// The User class represents a User with basic attributes like first name, last name, username, and email
class User extends Model
{
    private string $login;
    private string $adress;
    private string $email;

    private string $role;


    // Constructor for the User class
    /**
     *

     * @param string $password
     * @param string $login
     * @param string $address
     */
    public function __construct(string $login, ?string $address, string $email)
    {
        parent::__construct();
        $this->login = $login;
        $this->email = $email;

    }

    // Getters for private properties
    public function get_user_login(): string
    {
        return $this->login;
    }

    public function get_user_role(): string
    {
        return $this->role;
    }




    // Changes the email of the user
    public function changeEmail(string $newEmail): void
    {
        if (filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
            $this->email = $newEmail;
        } else {
            echo "Invalid email address." . PHP_EOL;
        }
    }


    /**
     * GET USER`S DELIVERY ADRESS
     * @param int $user_id
     * 
     * @return array | null
     * 
     */
    public function get_user_adress (int $user_id) : array | null {
        try {
            $query = $this->db->prepare("SELECT * FROM `adresses` WHERE `user_id` = '$user_id'");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            if($result) {
                return $result;
            }
            else 
            {
                return null;
            }
        }   
        catch(PDOException $ex)
        {
            $_SESSION['error-message'] = "Unexpected DB error Can`t get user adress";
            return null;
        }
    }
    /**
     * SET USERS DELIVERY ADRESS
     * @param string $country
     * @param string $city
     * @param string $street
     * @param string $building
     * @param int $user_id
     * 
     * @return bool 
     */

}



?>