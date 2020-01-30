<?php 
require_once("Model/RegistationManager.php");
require_once("Model/ConnexionManager.php");

class UsersController
{
    public function Register_New_User()
    {
        $RegistrationManager = new RegistrationManager();
        $RegistrationManager -> register();
    }

    public function Connect_User()
    {
        $ConnexionManager = new ConnexionManager();
        $ConnexionManager -> checkConnection();
    }

    public function Disconnect()
    {
        $ConnexionManager = new ConnexionManager();
        $ConnexionManager -> logout();
    }

    public function Show_Informations()
    {
        require("View/Frontend/Profile.php");
    }

    public function To_Connect()
    {
        require("View/Frontend/Connexion.php");
    }

    public function To_Register()
    {
        require("View/Frontend/Registration.php");
    }

    public function Get_Mentions()
    {
        require("View/Frontend/Mentions.php");
    }
}

?>
