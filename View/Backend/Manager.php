<?php
    class Manager
    {
        protected function connect_To_Database()
        {
            //On se connecte à la base de données
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=maBase;charset=utf8', 'root', 'Miguel', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch(Exception $e)
            {
                die('Erreur : ' . $e->getmessage()); // On renvoie un message si il y a une erreur.
            }

            return $bdd;
        }
    }