<?php
session_start();

if ($_SESSION['username'] != true)
    header("location:../frond-office/index.php");

//Récupérer des informations de utilisateur soumis par le formulaire à modifier
if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['depart']) && !empty($_POST['arriver']))
{
    $id_reservation = $_POST['id_reservation'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $ville_arr = $_POST['arriver'];
    $ville_dep = $_POST['depart'];
    $annee_dep = $_POST['annee_dep'];
    $mois_dep = $_POST['mois_dep'];
    $jour_dep = $_POST['jour_dep'];
    // Pour la date de retour qui ne pas obligatoire
    if(!empty($_POST['annee_arr']) && !empty($_POST['mois_arr']) && !empty($_POST['jour_arr'])){
        $annee_arr = $_POST['annee_arr'];
        $mois_arr = $_POST['mois_arr'];
        $jour_arr = $_POST['jour_arr'];
        $dat_arr= "$annee_arr-$mois_arr-$jour_arr";
    }else{
        $dat_arr=Null;
    }
}
$dat_dep= "$annee_dep-$mois_dep-$jour_dep";

//Se connecter à la base de donnée
require_once "../connexion_db/conn_db.php";

//Requête de Modification 
$requete = "UPDATE reservation SET nom = '$nom', prenom = '$prenom', ville_dep = '$ville_dep', ville_arr = '$ville_arr', dat_dep = '$dat_dep', dat_arr = '$dat_arr' WHERE id = $id_reservation";

//modifier un enregistrement de la table participant.
$isUpdated = mysqli_query($db, $requete) or die("Une erreur est survenue lors de la modification: ".mysqli_error($db));

header( "Refresh:1; url=../frond-office/liste_reservation.php");
?>