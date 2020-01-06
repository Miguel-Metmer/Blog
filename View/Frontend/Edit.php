<?php
    ob_start();
    session_start();
?>
    <?php 
        if(isset($_SESSION['username']) && $_SESSION['username'] == "Miguel.Metmer")
        {
    ?>
            <div id="Top">
                <header>
                        <a href="../index.php"> <strong> Jean Forteroche </strong> </a>
                </header>
                <nav>
                    <ul>
                        <li> 
                            <a href="../index.php"> Retour </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <section id="Create">
                <h1> Bienvenue </h1>
                <form method="post" action='../index.php' id="Articles_List_Form">
                    <label for="articles_list"> Articles : </label>
                    <select name="articles" id="articles_list">
                        <?php 
                            while($data = $news -> fetch())
                            {
                                echo '<option value=' . htmlspecialchars($data["Id"]) . '>'. htmlspecialchars($data["Title"]) . '</option>';    
                            }       
                            $news -> closeCursor();
                        ?>
                    </select>

                    <input type="submit" name="Delete_Article" value="Supprimer"> 
                    <input type="submit" name="Edit" value="Modifier"> 
                </form>

                <form method="post" action="../index.php?action=Create_Article">
                    <div id="Article_Title">
                        <label for="title"> Titre </label>
                        <input type="text" name="title" placeholder="Nom de l'article" required>
                    </div>
                    
                    <textarea id="Article" name="article" placeholder="Insérez du texte ici !"></textarea>
                    <input type="submit" id="Publish">
                </form>
                
            </section>
    <?php
        }
        else
        {
            echo '<p class=' . 'forbiden_access' . '> Accés interdit </p>';
        }
    ?>
<?php
   $content = ob_get_clean();
   include_once("template.php");
?>