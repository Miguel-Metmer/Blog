<?php ob_start(); ?>
<div id="Top">
        <header>
                <a href="../index.php"> <strong> Jean Forteroche </strong> </a>
        </header>
        <nav>
            <ul>
                <li> <a href="index.php?action=To_Connect"> <i class="fas fa-user-tie"></i> Connexion </a> </li>
            </ul>
        </nav>
    </div>
    <section id="Connexion">
        <h1> Inscription </h1>
        <img src="../Images/main_logo.png" alt="logo">

        <form method="post" action="../index.php?action=Register_New_User">
            <div>
                <label for="surname"> <i class="fas fa-address-card fa-fw"></i> </label>
                <input type="text" id="surname" name="surname" placeholder="Prénom"  required>
            </div>
            <hr>
            <div>
                <label for="name"> <i class="fas fa-id-badge  fa-fw"></i> </label>
                <input type="text" id="name" name="name" placeholder="Nom"  required>
            </div>
            <hr>
            <div>
                <label for="username"> <i class="fas fa-user fa-fw"></i> </label>
                <input type="text" id="username" name="user_name" placeholder="Nom d'utilisateur"  required>
            </div>
            <hr>
            <div>
                <label for="password"> <i class="fas fa-key fa-fw"></i> </label>
                <input type="password" id="password" name="user_password" placeholder="Mot de passe" required>
            </div>
            <input id="submit" type="submit">      
        </form>
        <div>
            <p> Si le "Nom d'utilisateur" existe déjà, le formulaire sera remis à zéro. </p>
        </div>
    </section>
<?php 
    $content = ob_get_clean(); 
    include("template.php");
?>