<?php 
require_once("Model/CommentManager.php");

class CommentsController
{
    public function Set_Comment($news_id)
    {
        $CommentManager = new CommentManager();
        $CommentManager -> set_Comment($news_id);

        header('Location: Index.php');
    }

    public function Get_Mentions()
    {
        require("View/Frontend/Mentions.php");
    }

    public function Report_Comment($news_id, $comment_id)
    {
        $CommentManager = new CommentManager();
        $CommentManager -> report_Comment($news_id, $comment_id);
        header('Location: Index.php');
    }

    public function Get_Reported_Comments()
    {

        $CommentManager = new CommentManager();
        $reported = $CommentManager -> get_Reported_Comments();

        require('View/Backend/Moderate.php');
    }

    public function Delete_Comment()
    {
        $CommentManager = new CommentManager();
        $CommentManager -> delete_Comment();
        header("Location: Index.php");
    }

    public function Authorize_Comment()
    {
        $CommentManager = new CommentManager();
        $CommentManager -> authorize_Comment();
        header("Location: Index.php");
    }
}
?>
