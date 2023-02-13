<?php
session_start();

if ($_SESSION['isAdmin'] != true)
    header("location:index.php");

if (!empty($_POST['annuler'])) {
    header('location: liste_pilote.php');
}else{
//Récupérer toutes les infos de utilisateur soumis via le formulaire à modifier
    if (!empty($_POST['nompil']) && !empty($_POST['dnaiss']) && !empty($_POST['adr']) && !empty($_POST['tel']) && !empty($_POST['sal']))
    {
        $idpil= $_POST['idpil'];
        $nompil= $_POST['nompil'];
        $dnaiss = $_POST['dnaiss'];
        $adr = $_POST['adr'];
        $tel = $_POST['tel'];
        $sal = $_POST['sal'];
    }
    //Se connecter à la BDD
    require_once "../connexion_db/conn_db.php";
    //Ecrire la requête
    $requete = "UPDATE pilote SET idpil ='$idpil',nompil = '$nompil', dnaiss = '$dnaiss', adr='$adr', tel='$tel', sal='$sal'  WHERE idpil = $idpil";

    //var_dump($requete);

    //modifier un enregistrement de la table participant.
    $isUpdated = mysqli_query($db, $requete) or die("Une erreur est survenue lors de la modification: ".mysqli_error($db));

    header( "Refresh:1; url=liste_pilote.php");
}

?>