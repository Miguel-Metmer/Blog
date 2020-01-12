<?php 

function Auto_Load_Class($className)
{
    require('Model/' . $className . '.php');
}
spl_autoload_register("Auto_Load_Class");

function Register_New_User()
{
    $RegistrationManager = new RegistrationManager();
    $RegistrationManager -> register();
}

function Connect_User()
{
    $ConnexionManager = new ConnexionManager();
    $ConnexionManager -> checkConnection();
}

function Disconnect()
{
    $ConnexionManager = new ConnexionManager();
    $ConnexionManager -> logout();
}

function Show_Articles()
{
    $ArticleManager = new ArticleManager();
    $news = $ArticleManager -> get_Articles();

    require("View/Frontend/Home.php");
}

function Get_Articles()
{
    $ArticleManager = new ArticleManager();
    $news = $ArticleManager -> get_Articles();

    require("View/Frontend/Edit.php");
}

function Get_Article($id)
{
    
    $ArticleManager = new ArticleManager();
    $CommentManager = new CommentManager();

    $news = $ArticleManager -> get_Article($id);
    $comments = $CommentManager -> get_Comments($id);

    require("View/Frontend/Article.php");
}

function Create_Article()
{
    $ArticleManager = new ArticleManager();
    $ArticleManager -> create_Article();

    header("Location: Index.php");
}

function Edit_Article()
{
    $ArticleManager = new ArticleManager();
    $edit = $ArticleManager -> edit_Article();

    require("View/Frontend/Modify.php");
}

function Modify_Article()
{
    $ArticleManager = new ArticleManager();
    $ArticleManager -> modify_Article();

    header("Location: Index.php");
}

function Delete_Article()
{
    $ArticleManager = new ArticleManager();
    $ArticleManager -> delete_Article();
    header("Location: Index.php");
}

function Show_Informations()
{
    require("View/Frontend/Profile.php");
}

function To_Connect()
{
    require("View/Frontend/Connexion.php");
}

function To_Register()
{
    require("View/Frontend/Registration.php");
}

function Set_Comment($news_id)
{
    $CommentManager = new CommentManager();
    $CommentManager -> set_Comment($news_id);

    header('Location: Index.php');
}

function Get_Mentions()
{
    require("View/Frontend/Mentions.php");
}

function Report_Comment($news_id, $comment_id)
{

    $CommentManager = new CommentManager();
    $CommentManager -> report_Comment($news_id, $comment_id);
    header('Location: Index.php');
}

function Get_Reported_Comments()
{

    $CommentManager = new CommentManager();
    $reported = $CommentManager -> get_Reported_Comments();

    require('View/Frontend/Moderate.php');
}

function Delete_Comment()
{
    $CommentManager = new CommentManager();
    $CommentManager -> delete_Comment();
    header("Location: Index.php");
}

function Authorize_Comment()
{
    $CommentManager = new CommentManager();
    $CommentManager -> authorize_Comment();
    header("Location: Index.php");
}
?>
