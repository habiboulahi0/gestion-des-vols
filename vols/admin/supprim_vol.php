<?php
session_start();

if ($_SESSION['isAdmin'] != true)
    header("location: connexion_admin.php");


//Récupérer l'ID de la réservation à supprimer
$id_vol = $_GET['id'];

//Se connecter à la BDD
require_once "../connexion_db/conn_db.php";

//Ecrire la requête
$requete = "DELETE FROM vol WHERE idvol = $id_vol";

//supprimer un compte utilisateur de la table client.
mysqli_query($db, $requete) or die("Une erreur est survenue lors de la suppression : ".mysqli_error());
header("Refresh:1; url=liste_vol.php");
?>

