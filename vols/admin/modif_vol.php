<?php
session_start();

if ($_SESSION['isAdmin'] != true)
    header("connexion_admin.php");

if (!empty($_POST['annuler'])) {
    header('location: liste_vol.php');
}else{

    //Récupérer 
    if (!empty($_POST['idpil']) && !empty($_POST['idav']) && !empty($_POST['villedep']) && !empty($_POST['villearr']) && !empty($_POST['hdep']) && !empty($_POST['harr']) && !empty($_POST['annee_dep']) && !empty($_POST['mois_dep']) && !empty($_POST['jour_dep']))
    {
        $idvol = $_POST['id_vol'];
        $idpil = $_POST['idpil'];
        $idav = $_POST['idav'];
        $ville_dep = $_POST['villedep'];
        $ville_arr = $_POST['villearr'];
        $hdep = $_POST['hdep'];
        $harr = $_POST['harr'];
        $annee_dep = $_POST['annee_dep'];
        $mois_dep = $_POST['mois_dep'];
        $jour_dep = $_POST['jour_dep'];
    }
    $dat= "$annee_dep-$mois_dep-$jour_dep";

    //Se connecter à la BDD
    require_once "../connexion_db/conn_db.php";

    //Requête
    $requete = "UPDATE vol SET  idpil = '$idpil',idav='$idav', villedep = '$ville_dep', villearr = '$ville_arr',hdep='$hdep',harr='$harr' ,dat = '$dat' WHERE idvol = $idvol";

    //modifier un enregistrement
    $isUpdated = mysqli_query($db, $requete) or die("Une erreur est survenue lors de la modification: ".mysqli_error($db));

    header( "Refresh:1; liste_vol.php");
}


?>