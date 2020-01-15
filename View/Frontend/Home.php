<?php ob_start(); ?>
<?php session_start(); ?>
    <div id="Top">
        <header>
             <a href="index.php"> <strong> Jean Forteroche </strong> </a>
        </header>
        <nav>
            <ul>
                <?php
                    if(isset($_SESSION['username'])  && ($_SESSION['username']) == 'Miguel.Metmer')
                    {
                        echo '<li>';
                            echo '<a href="index.php?action=Get_Reported_Comments"> Modérer </a>'; 
                            echo '<a href="index.php?action=Get_Articles"> Editer </a>';  
                            echo '<a href="index.php?action=Show_Informations"> Compte </a>';
                        echo '</li>';
                    }
                    else if(isset($_SESSION['username']))
                    {
                        echo '<li>';
                            echo '<a href="index.php?action=Show_Informations">' . htmlspecialchars($_SESSION['username']) . '</a>' ;
                        echo '</li>';
                    }
                    else
                    {
                        echo "<li> <a href='index.php?action=To_Connect'> <i class='fas fa-user-tie'></i> Connexion </a> </li>";
                    } 
                ?>
            </ul>
        </nav>
    </div>
    <div id="Middle-Slider">
        <img src="Images/Alaska.jpg" alt="Image de slider">
    </div>

    
    <section id="Articles">
        <h1> Articles </h1>

        <div id="Articles_Box">
            <?php 
                while($data = $news->fetch())
                {
                    if(isset($data))
                    {
                        echo '<div class="articles">';
                            echo '<h2>' . '<a href=' . 'index.php?action=Get_Article&amp;Id=' . htmlspecialchars($data["Id"]) . '>' . htmlspecialchars($data['Title']) . '<img src="/Images/Image.jpg">' . '</a>' . '</h2>';
                            echo '<h3>' . htmlspecialchars($data['Date']) . '</h3>';
                            echo '<div class="paragraphe_box">';
                                echo '<p>' . substr(strip_tags($data['Content']), 0, 270) . '...' . '</p>';
                            echo '</div>';
                        echo '</div>';
                    }
                    else
                    {
                        echo '<div class="articles">';
                            echo '<h2>' . 'Aucun articles' . '</h2>';
                        echo '</div>';
                    }
                }
                $news -> closeCursor();
            ?>
        </div>
    </section>
    


<?php $content = ob_get_clean(); ?>
<?php include("View/Frontend/Template.php");