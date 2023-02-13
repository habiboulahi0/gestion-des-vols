<?php
session_start();

if ($_SESSION['isAdmin'] != true)
    header("location:connexion_admin.php");

if (!empty($_POST['annuler'])) {
    header('location: liste_avion.php');
}else{
//Récupérer
if (!empty($_POST['typeav']) && !empty($_POST['cap']) && !empty($_POST['loc']) && !empty($_POST['remarq']))
{
    $idav= $_POST['idav'];
    $typeav= $_POST['typeav'];
    $loc = $_POST['loc'];
    $cap = $_POST['cap'];
    $remarq = $_POST['remarq'];
    
}
//Se connecter à la BDD
require_once "../connexion_db/conn_db.php";
//Requête
$requete = "UPDATE avion SET idav ='$idav',typeav = '$typeav', cap = '$cap', loc='$loc', remarq='$remarq'  WHERE idav = $idav";

//modifier un enregistrement
$isUpdated = mysqli_query($db, $requete) or die("Une erreur est survenue lors de la modification: ".mysqli_error($db));

header( "Refresh:1; url=liste_avion.php");
}

?>