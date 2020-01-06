<?php 
require_once("View/Backend/Manager.php");
class ConnexionManager extends Manager
{
    private $bdd;
    private $check;
    private $username;
    private $password;

    public function __construct()
    {
        $this->username = $_POST['user_name'];
        $this->password = $_POST['user_password'];
    }

    public function checkConnection()
    {
        $bdd = $this -> connect_To_Database();
        $this->check = $bdd -> prepare('SELECT * FROM user WHERE Username = :username');
        $this->check -> execute(array('username' => $this->username));
        $this->data = $this->check -> fetch();

        if(password_verify($this->password, $this->data['Password']))
        {
            session_start();
            $_SESSION['username'] = $this->username;
            $_SESSION['user_password'] = $this->data['Password'];
            $_SESSION['name'] = $this->data['Name'];
            $_SESSION['surname'] = $this->data['Surname'];
            header('Location: index.php'); //Connexion réussi on redirige vers la page principale.
        }
        else
        {
            header('Location: index.php?action=To_Connect'); //Utilisateur non existant, on redirige vers la page de connexion pour réessayer.
        }
        return $this->check;
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php');
    }
}
?>