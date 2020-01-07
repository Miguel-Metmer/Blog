<?php
require_once("View/Backend/Manager.php");
class RegistrationManager extends Manager
{
    private $bdd;
    private $name;
    private $surname;
    private $username;
    private $password;
    private $data;
    private $check;
    private $insert;

    public function __construct()
    {
        $this->name = $_POST['name']; 
        $this->surname = $_POST['surname'];
        $this->username = $_POST['user_name'];
        $this->password = $_POST['user_password'];
    }

    public function register()
    {
        $bdd = $this -> connect_To_Database();
        $this->check = $bdd -> prepare('SELECT * FROM user WHERE Username = :username');
        $this->check -> execute(array('username' => $this->username));

        if($this->data = $this->check -> fetch())
        {
            header('Location: index.php?action=To_Register'); 
        }
        else
        {    
            $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
            $this->insert = $bdd -> prepare('INSERT INTO user(Name, Surname, Username, Password) VALUES(:name, :surname, :username, :password)');
            $this->insert -> execute(array('name' => $this->name, 'surname' => $this->surname, 'username' => $this->username, 'password' => $hashed_password));
            header('Location: index.php?action=To_Connect');
        } 
    }
}
?>