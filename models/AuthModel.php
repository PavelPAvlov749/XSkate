<?php



namespace models;

use models;


use PDO;
use PDOException;


// Start the session at the beginning of the file
session_start();

/**
 * Class Auth handling user authentication
 */
class AuthModel extends Model
{
    private ?string $user_id = null;
    private bool $is_auth = false;

    /**
     * Auth constructor checks if user_id exists in the session
     */
    public function __construct()
    {
        parent::__construct();
        if (array_key_exists('user_id', $_SESSION)) {
            $this->user_id = $_SESSION['user_id'];
            $this->is_auth = true;
        }
    }

    /**
     * Checks if user is authenticated
     *
     * @return bool
     */
    public function check_auth(): bool
    {
        return array_key_exists('user_id', $_SESSION);
    }

    /**
     * Authenticates a user using their login and password
     *
     * @param string $login
     * @param string $password
     * @return bool
     */
    public function authenticate(string $login, string $password) : bool | array
    {
        try {
            $md5Pass = md5($password);
            $query = $this->db->prepare("SELECT * FROM `Users` WHERE `login` = :login AND `password` = :password");
            $query->execute([':login' => $login, ':password' => $md5Pass]);
            $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "ERROR : " . $ex->getMessage();
            return false;
        }
    }

    /**
     * Creates a new user with the given parameters
     *
     * @param string $user_name
     * @param string $password
     * @param string $login
     * @param string $address
     */
    public function create_user(string $password, string $login, string $address,string $email) : array | bool
    {
        try {
            $encrypted_password = md5($password);
            $user_address = strlen($address) > 1 ? $address : null;
            $query = $this->db->prepare("INSERT INTO `Users` (`id`,`password`,`login`,`adress`,`email`)
                    VALUES (NULL,:encrypted_password, :login, :user_address, :email)");

            $query->execute([
                ':encrypted_password' => $encrypted_password,
                ':login' => $login,
                ':user_address' => $user_address,
                ':email' => $email
            ]);
            $user = $query->fetchAll(PDO::FETCH_ASSOC);
            return $user;


        } catch (PDOException $ex) {
            echo "ERROR : " . $ex->getMessage();
            return false;
            
        }
    }

    /**
     * Validate register form data
     * 
     * @param string $login
     * @param string $password
     * @param string $repeat_password
     * @param string $email
     * 
     * @return bool
     * 
     */
    private function validate (string $login,string $password,string $repeat_password,string $email) : bool {
        
    }
}




?>