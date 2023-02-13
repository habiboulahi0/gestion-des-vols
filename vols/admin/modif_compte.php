<?php
session_start();

if ($_SESSION['isAdmin'] != true)
    header("location:connexion_admin.php");
if (!empty($_POST['annuler'])) {
    header('location: liste_compte.php');
}else{
//Récupérer
if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['mdp']))
{
    $id_compte= $_POST['id_compte'];
    $pseudo= $_POST['pseudo'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    
}
//Se connecter à la BDD
require_once "../connexion_db/conn_db.php";
//Requête
$requete = "UPDATE compte SET pseudo = '$pseudo', email = '$email', mdp='$mdp'  WHERE id = $id_compte";

//modifier un enregistrement
$isUpdated = mysqli_query($db, $requete) or die("Une erreur est survenue lors de la modification: ".mysqli_error($db));

header( "Refresh:1; url=liste_compte.php");
}


?>