<?php
session_start();

if ($_SESSION['isAdmin'] != true)
    header("location:index.php");

//Récupérer l'ID du candidat à supprimer
$idpil = $_GET['id'];

//Se connecter à la BDD
require_once "../connexion_db/conn_db.php";

//Ecrire la requête
$requete = "SELECT  *  FROM pilote  WHERE idpil = $idpil";

$infos_brutes = mysqli_query($db, $requete) or die("Une erreur est survenue  durant l'exécution de la requête: ".mysqli_error());

$infos_utilisateur = mysqli_fetch_assoc($infos_brutes);

//var_dump($infos_participant);

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
<form action="modif_pilote.php?" method="POST">
    <h1>FORMULAIRE DE MODIFICATION</h1>
    <br>

    <div>
        <input type="hidden" name="idpil" value="<?php echo $idpil;?>">
    </div>

    <br>
    <div>
        <label for="nom">Nom Pilote</label>
        <input type="text" name="nompil" value="<?php echo $infos_utilisateur['nompil']; ?>">
    </div>
    <br>
    <div>
        <label for="nom">Date de naissance</label>
        <input type="text" name="dnaiss" value="<?php echo $infos_utilisateur['dnaiss']; ?>">
    </div>
    <br>
    <div>
        <label for="nom">Adresse</label>
        <input type="text" name="adr" value="<?php echo $infos_utilisateur['adr']; ?>">
    </div>
    <div>
        <div>
            <label for="nom">N°téléphone</label>
            <input type="text" name="tel" value="<?php echo $infos_utilisateur['tel']; ?>">
        </div>
    </div>
        <div>
            <label for="nom">Salaire</label>
            <input type="text" name="sal" value="<?php echo $infos_utilisateur['sal']; ?>">
        </div>
    
    <div>
        <input type="submit" name="enregistrer" value="Enregistrer">
    </div>
    <div>
        <input type="submit" name="annuler" value="Annuler">
    </div>

</form>
