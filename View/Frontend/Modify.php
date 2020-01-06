<?php
    ob_start();
    session_start();
?>
    <?php 
        if(isset($_SESSION['username']) == "Miguel.Metmer")
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
                <form method="post" action="../index.php?action=Modify_Article">
                    <?php 
                        while($data = $edit -> fetch())
                        {
                    ?>
                            <div id="Article_Title">
                                <label for="title"> Titre </label>
                                <input type="text" name="title" value=" <?php echo htmlspecialchars($data['Title']) ?>" required>
                                <input type="hidden" name="id" value=" <?php echo htmlspecialchars($data['Id']) ?>">
                            </div>
                           <textarea id="Article" name="article"> <?php echo htmlspecialchars($data['Content']) ?> </textarea>
                    <?php
                        }
                    ?>
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