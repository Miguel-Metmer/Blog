<?php 
require_once("Model/ArticleManager.php");
require_once("Model/CommentManager.php");

class ArticlesController
{
    public function Show_Articles()
    {
        $ArticleManager = new ArticleManager();
        $news = $ArticleManager -> get_Articles();

        require("View/Frontend/Home.php");
    }

    public function Get_Articles()
    {
        $ArticleManager = new ArticleManager();
        $news = $ArticleManager -> get_Articles();

        require("View/Backend/Edit.php");
    }

    public function Get_Article($id)
    {
        
        $ArticleManager = new ArticleManager();
        $CommentManager = new CommentManager();

        $news = $ArticleManager -> get_Article($id);
        $comments = $CommentManager -> get_Comments($id);

        require("View/Frontend/Article.php");
    }

    public function Create_Article()
    {
        $ArticleManager = new ArticleManager();
        $ArticleManager -> create_Article();

        header("Location: Index.php");
    }

    public function Edit_Article()
    {
        $ArticleManager = new ArticleManager();
        $edit = $ArticleManager -> edit_Article();

        require("View/Backend/Modify.php");
    }

    public function Modify_Article()
    {
        $ArticleManager = new ArticleManager();
        $ArticleManager -> modify_Article();

        header("Location: Index.php");
    }

    public function Delete_Article()
    {
        $ArticleManager = new ArticleManager();
        $ArticleManager -> delete_Article();
        header("Location: Index.php");
    }
}
?>
