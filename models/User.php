<?php

declare(strict_types=1);
namespace models;

use models\Model;


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
    public function __construct(string $login, string $address, string $email, $role)
    {
        parent::__construct();
        $this->login = $login;
        $this->email = $email;
        $this->role = $role;
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
}



?>