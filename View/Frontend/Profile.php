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
    
    <section id="Profil">
        <div id="Informations">
            <h1> Profil </h1>
            <p> Nom : <?php echo htmlspecialchars($_SESSION['name']); ?></p>
            <p> Prénom : <?php echo htmlspecialchars($_SESSION['surname']); ?> </p>
            <p> Nom d'utilisateur :  <?php echo htmlspecialchars($_SESSION['username']); ?> </p>
            <p> Mot de passe : <?php echo htmlspecialchars('***********') ?></p>
        </div>
        <div id="Logout">
            <a href='../index.php?action=Logout'> Se déconnecter </a> 
        </div>
        
    </section>
<?php $content = ob_get_clean(); ?>
<?php include("template.php"); ?>
