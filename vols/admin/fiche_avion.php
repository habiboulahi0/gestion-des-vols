<?php
session_start();

if ($_SESSION['isAdmin'] != true)
    header("location:connexion_admin.php");

//Récupérer l'ID du candidat à supprimer
$idav = $_GET['id'];

//Se connecter à la BDD
require_once "../connexion_db/conn_db.php";

//Ecrire la requête
$requete = "SELECT  *  FROM avion  WHERE idav = $idav";

$infos_brutes = mysqli_query($db, $requete) or die("Une erreur est survenue  durant l'exécution de la requête: ".mysqli_error());

$infos_compte = mysqli_fetch_assoc($infos_brutes);

$result = mysqli_query($db, "SELECT idvol,villedep,villearr FROM vol") or die("Erreur dans la récupération des données : ". mysqli_error());
    
     $villes = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!--
afficher un formulaire de modification des informations d’un candidat
-->
<link rel="stylesheet" type="text/css" href="../style.css">
<style>
    form{
        width: 600px;
        height: 600px;
        margin-left:300px;
    }
</style>

<?php
include "navigation.php";
?>
<form action="modif_avion.php?" method="POST">
    <h1>FORMULAIRE DE MODIFICATION</h1>
    <br>

    <div>
        <input type="hidden" name="idav" value="<?php echo $idav;?>">
    </div>

    <br>
    <div>
        <label for="nom">Type d'avion</label>
        <input type="text" name="typeav" value="<?php echo $infos_compte['typeav']; ?>">
    </div>
    <br>
    <div>
        <label for="nom">Capacité</label>
        <input type="number" name="cap" value="<?php echo $infos_compte['cap']; ?>">
    </div>
    <br>
    <div>
        <label for="nom">Localisation</label>
        <input type="text" name="loc" value="<?php echo $infos_compte['loc']; ?>">
    </div>
    <div>
        <div>
            <label for="nom">Remarque</label>
            <input type="text" name="remarq" value="<?php echo $infos_compte['remarq']; ?>">
        </div>
    </div>
    
    <div>
        <input type="submit" name="enregistrer" value="Enregistrer">
    </div>
    <div>
        <input type="submit" name="annuler" value="Annuler">
    </div>

</form>
