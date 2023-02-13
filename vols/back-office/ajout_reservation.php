<?php
session_start();
if(isset($_SESSION['username'])){
    $login = $_SESSION['username'];
}
//Récupérer les informations
if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['depart']) && !empty($_POST['arriver']) && !empty($_POST['annee_dep']) && !empty($_POST['mois_dep']) && !empty($_POST['jour_dep']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $ville_dep = $_POST['depart'];
    $ville_arr = $_POST['arriver'];
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
        $dat_arr= Null;
    }

$dat_dep= "$annee_dep-$mois_dep-$jour_dep";


//Se connecter à la base donnée
include_once("../connexion_db/conn_db.php");

//Insertion d'une reservation dans la base de donnée
if($_SESSION['username']){
    $sql = "INSERT INTO reservation (nom, prenom, ville_dep,ville_arr,dat_dep,dat_arr,pseudo) VALUES('$nom', '$prenom','$ville_dep','$ville_arr','$dat_dep','$dat_arr','$login')";

    $valide = mysqli_query($db,$sql) or die("Erreur dans l'insertion des données : ". mysqli_error());
}else{
    //l'utilisateur na pas de compte
    header('location: ../frond-office/form_authentification.php');
}
}
if ($valide) {
    echo '<h3><a href="../frond-office/liste_reservation.php">Cliquez ici</a> pour consulter la liste de vos reservations</h3>';
}else{
    header('location : ../frond-office/form_reservation.php');
}