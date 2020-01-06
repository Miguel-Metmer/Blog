<<<<<<< HEAD
<?php

class CommentManager
{
    private $bdd;
    private $comments;
    private $insert;
    private $content;
    private $user;

    public function _construct()
    {
        
    }

    private function connect_To_Database()
    {
        try
        {
            $this->bdd = new PDO('mysql:host=localhost; dbname=maBase; charset=utf8', 'root', 'Miguel', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch(Exception $e)
        {
            echo 'Erreur :' . $e->getMessage();
        }
    }

    private function get_User_Id_By_Surname()
    {
        $user_Id = $this->bdd -> prepare("SELECT Id FROM user WHERE Username = :username");
        $user_Id -> execute(array("username" => $_POST["actual_user"]));
        return $user_Id;
    }

    public function get_Comments($id)
    {
        $this -> connect_To_Database();
        $this->comments = $this->bdd -> prepare('SELECT user.Username, comments.Content, comments.Date, comments.News_Owner, comments.Report, comments.Id FROM user 
                                                INNER JOIN comments ON user.Id = comments.User_Owner WHERE comments.News_Owner = :id');                                    
        $this->comments -> execute(array("id" => $id));                                                

        return $this->comments;
    }

    public function set_Comment($news_id)
    {
        $this->content = $_POST["current_comment"];
        $date = date('Y-m-d H:i:s');
        $this -> connect_To_Database();

        $user_owner = $this -> get_User_Id_By_Surname() -> fetch();

        $this->insert = $this->bdd -> prepare('INSERT INTO comments(Content, User_Owner, Date, News_Owner) VALUES(:content, :user, :date, :news)');
        $this->insert -> execute(array("content" => $this->content, "user" => $user_owner["Id"], "date" => $date, "news" => $news_id));
    }

    public function get_Number_Comments()
    {
        $this -> connect_To_Database();
        $this->comments = $this->bdd -> query('SELECT COUNT(Title) AS title FROM comments INNER JOIN news ON comments.News_Owner = news.Id');

        return $this->comments;
    }

    public function report_Comment($news_id, $comment_id)
    {
        $report = 1;
        $this -> connect_To_Database();
        $this->comments = $this->bdd -> prepare("UPDATE comments SET Report = :report WHERE comments.Id = :comment_id AND comments.News_Owner = :news_id");
        $this->comments -> execute(array("report" => $report, "comment_id" => $comment_id, "news_id" => $news_id));
    }

    public function get_Reported_Comments()
    {
        $report = 1;
        $this -> connect_To_Database();
        $this->reported = $this->bdd -> prepare("SELECT comments.Id, comments.Content, comments.Report, comments.User_Owner, comments.Date, user.Username FROM comments INNER JOIN user ON user.Id = comments.User_Owner WHERE Report = :report");
        $this->reported -> execute(array("report" => $report));

        return $this->reported;
    }

    public function delete_Comment()
    {
        $this -> connect_To_Database();
        $this->comments = $this->bdd -> prepare("DELETE FROM comments WHERE Id = :id");
        $this->comments -> execute(array("id" => $_POST["Comment_Id"]));
    }

    public function authorize_Comment()
    {
        $report = 0;
        $this -> connect_To_Database();
        $this->comments = $this->bdd -> prepare("UPDATE comments SET Report = :report WHERE Id = :id");
        $this->comments -> execute(array("report"=> $report, "id" => $_POST["Comment_Id"]));
    }
}

=======
<?php

class CommentManager
{
    private $bdd;
    private $comments;
    private $insert;
    private $content;
    private $user;

    public function _construct()
    {
        
    }

    private function connect_To_Database()
    {
        try
        {
            $this->bdd = new PDO('mysql:host=localhost; dbname=maBase; charset=utf8', 'root', 'Miguel', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch(Exception $e)
        {
            echo 'Erreur :' . $e->getMessage();
        }
    }

    private function get_User_Id_By_Surname()
    {
        $user_Id = $this->bdd -> prepare("SELECT Id FROM user WHERE Username = :username");
        $user_Id -> execute(array("username" => $_POST["actual_user"]));
        return $user_Id;
    }

    public function get_Comments($id)
    {
        $this -> connect_To_Database();
        $this->comments = $this->bdd -> prepare('SELECT user.Username, comments.Content, comments.Date, comments.News_Owner, comments.Report, comments.Id FROM user 
                                                INNER JOIN comments ON user.Id = comments.User_Owner WHERE comments.News_Owner = :id');                                    
        $this->comments -> execute(array("id" => $id));                                                

        return $this->comments;
    }

    public function set_Comment($news_id)
    {
        $this->content = $_POST["current_comment"];
        $date = date('Y-m-d H:i:s');
        $this -> connect_To_Database();

        $user_owner = $this -> get_User_Id_By_Surname() -> fetch();

        $this->insert = $this->bdd -> prepare('INSERT INTO comments(Content, User_Owner, Date, News_Owner) VALUES(:content, :user, :date, :news)');
        $this->insert -> execute(array("content" => $this->content, "user" => $user_owner["Id"], "date" => $date, "news" => $news_id));
    }

    public function get_Number_Comments()
    {
        $this -> connect_To_Database();
        $this->comments = $this->bdd -> query('SELECT COUNT(Title) AS title FROM comments INNER JOIN news ON comments.News_Owner = news.Id');

        return $this->comments;
    }

    public function report_Comment($news_id, $comment_id)
    {
        $report = 1;
        $this -> connect_To_Database();
        $this->comments = $this->bdd -> prepare("UPDATE comments SET Report = :report WHERE comments.Id = :comment_id AND comments.News_Owner = :news_id");
        $this->comments -> execute(array("report" => $report, "comment_id" => $comment_id, "news_id" => $news_id));
    }

    public function get_Reported_Comments()
    {
        $report = 1;
        $this -> connect_To_Database();
        $this->reported = $this->bdd -> prepare("SELECT comments.Id, comments.Content, comments.Report, comments.User_Owner, comments.Date, user.Username FROM comments INNER JOIN user ON user.Id = comments.User_Owner WHERE Report = :report");
        $this->reported -> execute(array("report" => $report));

        return $this->reported;
    }

    public function delete_Comment()
    {
        $this -> connect_To_Database();
        $this->comments = $this->bdd -> prepare("DELETE FROM comments WHERE Id = :id");
        $this->comments -> execute(array("id" => $_POST["Comment_Id"]));
    }

    public function authorize_Comment()
    {
        $report = 0;
        $this -> connect_To_Database();
        $this->comments = $this->bdd -> prepare("UPDATE comments SET Report = :report WHERE Id = :id");
        $this->comments -> execute(array("report"=> $report, "id" => $_POST["Comment_Id"]));
    }
}

>>>>>>> 0c7bf490fc2a2f1e6e70ecad2518241c1da474da
?>