<?php include_once'navigation.php'; ?>
<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="../style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            
            <form class="form" action="../back-office/verification.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Pseudo</b></label>
                <input type="text" placeholder="Entrer votre pseudo" name="pseudo" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <a href="form_inscription.php">Crée un compte</a><br>
                
                <a href="../admin/connexion_admin.php"> Connexion Administrateur</a><br>

                <input type="submit" id='submit' value='LOGIN'>
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Pseudo existe déjà ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>
    </body>
</html>