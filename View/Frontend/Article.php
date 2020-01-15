<?php ob_start(); ?>
<?php session_start(); ?>

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

    <section id="Articles">
        <?php 
            while($data = $news -> fetch())
            {
                echo '<h1>' . htmlspecialchars($data['Title']) . '</h1>';
                echo '<h2>' . htmlspecialchars($data['Date']) . '</h2>';
                echo '<div class="article_paragraphe">';
                    echo '<p>' . htmlspecialchars_decode($data["Content"]) . '</p>';
                echo '</div>';
            }
            $news -> closeCursor();
        ?> 
    </section>

    <section id="Comments">
            <h1> Commentaires </h1>
            <div id="Users_Comments">
                <?php
                    while($data = $comments -> fetch())
                    {
                        if($data["Report"] == 1)
                        {
                ?>
                            <div class="comment">
                                <h2> <?php echo htmlspecialchars($data["Username"]); ?> </h2>
                                <h3> <?php echo htmlspecialchars($data["Date"]); ?> </h3>
                                <p> Ce commentaire a été signalé </p>
                            </div>
                <?php
                        }
                        else
                        {
                ?>
                            <div class="comment">
                                <h2> <?php echo htmlspecialchars($data["Username"]); ?> </h2>
                                <h3> <?php echo htmlspecialchars($data["Date"]); ?> </h3>
                                <?php echo htmlspecialchars($data["Content"]); ?> <br>
                                <form method="post" action="index.php?action=Report_Comment&amp;<?php echo 'News_Owner=' . htmlspecialchars($data["News_Owner"]) . '&amp;' . 'Comment_Id=' . htmlspecialchars($data["Id"]); ?>">
                                    <input name="report" value="Signaler" type="submit">
                                </form>
                            </div>
                <?php
                        }
                    }
                    $comments -> closeCursor();
                ?>

                <?php
                    if(isset($_SESSION["username"]))
                    {
                ?>
                    <form method="post" action='index.php?action=Set_Comment&amp;<?php echo "Id=" . htmlspecialchars($_GET["Id"]); ?>' id="Comment_Post">
                        <input id="User_Name_Input" type="text" name="actual_user" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" readonly="readonly">

                        <textarea id="Current_Comment" name="current_comment" placeholder="Ecrivez votre commentaire ici !" required></textarea>
                        <input id="Send_Comment" type="submit">
                    </form>
                <?php
                    }
                    else
                    {
                        echo '<p id="Comment_Post_Unvailable"> Pour laisser un commentaire vous devez être' .  '<a href="index.php?action=To_Connect"> connecter </p>';
                    }
                ?>
                
            </div>
    </section>
<?php $content = ob_get_clean(); ?>
<?php include("View/Frontend/template.php");