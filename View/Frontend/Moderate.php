<?php ob_start(); ?>
<?php session_start(); ?>

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

        <section id="Comments">
            <h1> Commentaires </h1>
                <?php 
                    while($data = $reported -> fetch())
                    {
                        if(isset($data["Report"]) == 0)
                        {
                            echo "lol";
                        }
                        else
                        {
                            echo '<div id="Users_Comments">';
                                echo '<div class="comment">';
                                    echo '<h2>' . htmlspecialchars($data["Username"]) . '</h2>';
                                    echo '<h3>' . htmlspecialchars($data["Date"]) . '</h3>';
                                    echo '<p>' . htmlspecialchars($data["Content"]) . '</p>';

                                    echo '<form method="post" action="index.php">';
                                        echo '<input type="hidden" name="Comment_Id" value=' . htmlspecialchars($data["Id"]) . '>';
                                        echo '<input type="submit" name="Delete_Comment" value="Supprimer"/>';
                                        echo '<input type="submit" name="Authorize_Comment" value="Autoriser"/>';
                                    echo '</form>';
                                echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
        </section>
<?php
    }
    else
    {
        echo '<p class=' . 'forbiden_access' . '> Accés interdit </p>';
    }
?>          
<?php $content = ob_get_clean(); ?>
<?php include("template.php"); ?>
