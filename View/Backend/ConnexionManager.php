<<<<<<< HEAD
<?php 
    class ConnexionManager
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

        private function connect_To_Database()
        {
            try
            {
                $this->bdd = new PDO('mysql:host=localhost;dbname=maBase;charset=utf8', 'root', 'Miguel', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch(Exception $e)
            {
                die('Erreur : ' . $e -> getmessage()); // On renvoie un message si il y a une erreur.
            }
        }

        public function checkConnection()
        {
            $this->connect_To_Database();
            $this->check = $this->bdd -> prepare('SELECT * FROM user WHERE Username = :username');
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
=======
<?php 
    class ConnexionManager
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

        private function connect_To_Database()
        {
            try
            {
                $this->bdd = new PDO('mysql:host=localhost;dbname=maBase;charset=utf8', 'root', 'Miguel', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch(Exception $e)
            {
                die('Erreur : ' . $e -> getmessage()); // On renvoie un message si il y a une erreur.
            }
        }

        public function checkConnection()
        {
            $this->connect_To_Database();
            $this->check = $this->bdd -> prepare('SELECT * FROM user WHERE Username = :username');
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
>>>>>>> 0c7bf490fc2a2f1e6e70ecad2518241c1da474da
?>