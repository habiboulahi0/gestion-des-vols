<?php
session_start();

if ($_SESSION['username'] != true)
    header("location: ../frond-office/index.php");


//Récupérer l'ID de la réservation à supprimer
$id_reservation = $_GET['id_reservation'];

//Se connecter à la BDD
require_once "../connexion_db/conn_db.php";

//Ecrire la requête
$requete = "DELETE FROM reservation WHERE id = $id_reservation";

//supprimer de reservation 
mysqli_query($db, $requete) or die("Une erreur est survenue lors de la suppression : ".mysqli_error());
header("Refresh:1; url=../frond-office/liste_reservation.php");

?>