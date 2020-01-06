<?php   
require_once("View/Backend/Manager.php");
class ArticleManager extends Manager
{
    private $article;
    private $title;
    private $date;
    private $bdd;
    private $news;


    public function __construct()
    {
    }

    public function create_Article()
    {
        $bdd = $this -> connect_To_Database();
        $this->news = $bdd -> prepare("INSERT INTO news(Content, Date, Title) VALUES(:content, :date, :title)");
        $this->news -> execute(array("content" => $_POST['article'], "date" => date('Y-m-d H:i:s'), "title" => $_POST['title']));
    }

    public function edit_Article()
    {
        $bdd = $this -> connect_To_Database();
        $edit = $bdd -> prepare("SELECT * FROM news WHERE Id = :id");
        $edit -> execute(array("id" => $_POST['articles']));

        return $edit;
    }

    public function modify_Article()
    {
        $bdd = $this -> connect_To_Database();
        $edit = $bdd -> prepare("UPDATE news SET Content = :content, Title = :title WHERE Id = :id");
        $edit -> execute(array("content" => $_POST["article"], "title" => $_POST["title"], "id" => $_POST["id"]));
    }

    public function get_Articles()
    {
        $bdd = $this -> connect_To_Database();
        $this->news = $bdd -> query('SELECT * FROM news');
        return $this->news;
    }

    public function get_Article($id)
    {
        $bdd = $this -> connect_To_Database();
        $this->news = $bdd -> prepare('SELECT * FROM news WHERE Id = :id');
        $this->news -> execute(array("id" => $id));

        return $this->news;
    }

    public function delete_Article()
    {
        $bdd = $this -> connect_To_Database();
        $this->news = $bdd -> prepare('DELETE news, comments FROM news LEFT JOIN comments ON comments.News_Owner = news.Id WHERE news.Id = :id');
        $test = $_POST['articles'];
        $this->news -> execute(array('id' => $test ));
    }
}
?>
