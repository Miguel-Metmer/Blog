<?php

class blog
{
    public function __construct()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    private function autoload($controllerName)
    {
        require 'Controller/' . $controllerName . '.php';
    }

    public function initBlog()
    {
        $articlesController = new ArticlesController();
        $commentsControler = new CommentsController();
        $usersController = new UsersController();

        try
        {
            if(isset($_GET["action"]))
            {
                if($_GET["action"] == "Register_New_User")
                {

                    $usersController->Register_New_User();
                }
                elseif($_GET["action"] == "Connect_User")
                {
                    $usersController->Connect_User();
                }
                elseif($_GET["action"] == "Logout")
                {
                    $usersController->Disconnect();
                }
                elseif($_GET["action"] == "Create_Article")
                {
                    $articlesController->Create_Article();
                }
                elseif($_GET["action"] == "Delete_Article")
                {
                    $articlesController->Delete_Article($_POST['articles']);
                }
                elseif($_GET["action"] == "Get_Article")
                {
                    $articlesController->Get_Article($_GET['Id']);
                }
                elseif($_GET["action"] == "Get_Articles")
                {
                    $articlesController->Get_Articles();
                }
                elseif($_GET["action"] == "Show_Informations")
                {
                    $usersController->Show_Informations();
                }
                elseif($_GET["action"] == "To_Connect")
                {
                    $usersController->To_Connect();
                }
                elseif($_GET["action"] == "To_Register")
                {
                    $usersController->To_Register();
                }
                elseif($_GET["action"] == "Set_Comment")
                {
                    $commentsControler->Set_Comment($_GET["Id"]);
                }
                elseif($_GET["action"] == "Modify_Article")
                {
                    $articlesController->Modify_Article();
                }
                elseif($_GET["action"] == "Get_Mentions")
                {
                    $usersController->Get_Mentions();
                }
                elseif($_GET["action"] == "Report_Comment")
                {
                    $commentsControler->Report_Comment($_GET["News_Owner"], $_GET["Comment_Id"]);
                }
                elseif($_GET["action"] == "Get_Reported_Comments")
                {
                    $commentsControler->Get_Reported_Comments();
                }
                else
                {
                    throw new Exception("L'action demandée est impossible");
                }
            }
            elseif (isset($_POST["Delete_Article"])) 
            {
                $articlesController->Delete_Article();
            }
            elseif (isset($_POST["Delete_Comment"])) 
            {
                $commentsControler->Delete_Comment();
            }
            elseif (isset($_POST["Authorize_Comment"])) 
            {
                $commentsControler->Authorize_Comment();
            }
            elseif (isset($_POST["Edit"])) 
            {
                $articlesController->Edit_Article();
            }
            else
            {
                $articlesController->Show_Articles();
            }
        }catch(Exception $e)
        {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}

$blog = new Blog();
$blog->initBlog();










   



