<?php
    class RegistrationManager
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
            $this->name = $_POST['name']; // on stockes les valeurs reçues dans des variables.
            $this->surname = $_POST['surname'];
            $this->username = $_POST['user_name'];
            $this->password = $_POST['user_password'];
        }
    
        private function connect_To_Database()
        {
            //On se connecte à la base de données
            try
            {
                $this->bdd = new PDO('mysql:host=localhost;dbname=maBase;charset=utf8', 'root', 'Miguel', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch(Exception $e)
            {
                die('Erreur : ' . $e->getmessage()); // On renvoie un message si il y a une erreur.
            }
        }

        public function register()
        {
            $this->connect_To_Database();
    
            $this->check = $this->bdd -> prepare('SELECT * FROM user WHERE Username = :username');
            $this->check -> execute(array('username' => $this->username));

            if($this->data = $this->check -> fetch())
            {
                header('Location: index.php?action=To_Register'); // Si utilisateur existe déjà.
            }
            else
            {    
                $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
                $this->insert = $this->bdd -> prepare('INSERT INTO user(Name, Surname, Username, Password) VALUES(:name, :surname, :username, :password)');
                $this->insert -> execute(array('name' => $this->name, 'surname' => $this->surname, 'username' => $this->username, 'password' => $hashed_password));
                header('Location: index.php?action=To_Connect.php');
            } 
        }
    }
?>