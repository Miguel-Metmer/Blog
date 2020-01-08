<?php
require_once("Model/Manager.php");
class CommentManager extends Manager
{
    private $bdd;
    private $comments;
    private $insert;
    private $content;
    private $user;

    public function _construct()
    {
    }

    private function get_User_Id_By_Surname()
    {
        $bdd = $this -> connect_To_Database();
        $user_Id = $bdd -> prepare("SELECT Id FROM user WHERE Username = :username");
        $user_Id -> execute(array("username" => $_POST["actual_user"]));
        return $user_Id;
    }

    public function get_Comments($id)
    {
        $bdd = $this -> connect_To_Database();
        $this->comments = $bdd -> prepare('SELECT user.Username, comments.Content, comments.Date, comments.News_Owner, comments.Report, comments.Id FROM user 
                                                INNER JOIN comments ON user.Id = comments.User_Owner WHERE comments.News_Owner = :id');                                    
        $this->comments -> execute(array("id" => $id));                                                

        return $this->comments;
    }

    public function set_Comment($news_id)
    {
        $bdd = $this -> connect_To_Database();
        $this->content = $_POST["current_comment"];
        $date = date('Y-m-d H:i:s');

        $user_owner = $this -> get_User_Id_By_Surname() -> fetch();

        $this->insert = $bdd -> prepare('INSERT INTO comments(Content, User_Owner, Date, News_Owner) VALUES(:content, :user, :date, :news)');
        $this->insert -> execute(array("content" => $this->content, "user" => $user_owner["Id"], "date" => $date, "news" => $news_id));
    }

    public function report_Comment($news_id, $comment_id)
    {
        $report = 1;
        $bdd = $this -> connect_To_Database();
        $this->comments = $bdd -> prepare("UPDATE comments SET Report = :report WHERE comments.Id = :comment_id AND comments.News_Owner = :news_id");
        $this->comments -> execute(array("report" => $report, "comment_id" => $comment_id, "news_id" => $news_id));
    }

    public function get_Reported_Comments()
    {
        $report = 1;
        $bdd = $this -> connect_To_Database();
        $this->reported = $bdd -> prepare("SELECT comments.Id, comments.Content, comments.Report, comments.User_Owner, comments.Date, user.Username FROM comments INNER JOIN user ON user.Id = comments.User_Owner WHERE Report = :report");
        $this->reported -> execute(array("report" => $report));

        return $this->reported;
    }

    public function delete_Comment()
    {
        $bdd = $this -> connect_To_Database();
        $this->comments = $bdd -> prepare("DELETE FROM comments WHERE Id = :id");
        $this->comments -> execute(array("id" => $_POST["Comment_Id"]));
    }

    public function authorize_Comment()
    {
        $report = 0;
        $bdd = $this -> connect_To_Database();
        $this->comments = $bdd -> prepare("UPDATE comments SET Report = :report WHERE Id = :id");
        $this->comments -> execute(array("report"=> $report, "id" => $_POST["Comment_Id"]));
    }
}

?>