<?php
session_start();

//Récupérer les entrées du formulaire de connexion
if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $login = $_POST['login'];
    $password = sha1(trim($_POST['password']));

//Se connecter à la BDD
    require_once "../connexion_db/conn_db.php";

//Récupérer les infos d'authentification de la BDD
    $requete = "SELECT login, mdp FROM admin WHERE login = '$login' AND mdp = '$password'";

    $admin_brute = mysqli_query($db, $requete);

    if (mysqli_num_rows($admin_brute) == 1) {
        $_SESSION['isAdmin'] = true;
        header( "location:liste_compte.php");
    } else {
        header('Location: connexion_admin.php?erreur=1'); // utilisateur ou mot de passe incorrect
    }
}
?>
<!--afficher le formulaire d’authentification-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
    form{
        width: 600px;
        height: 600px;
        margin-left:300px;
    }
</style>
</head>
<body>
    <form action="connexion_admin.php" method="POST">
    <h1>AUTHENTIFICATION</h1>
    <br>

    <div>
        <label for="login">Login</label>
        <input type="text" name="login" required>
    </div>

    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <a href="../frond-office/form_authentification.php">Se connecter en tant que client</a><br>
    </div>

    <div>
        <input type="submit" name="connexion" value="Se connecter"> </button>
    </div>
    <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1)
                        echo "<p style='color:red'>Nom Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
</form>

</body>
</html>


