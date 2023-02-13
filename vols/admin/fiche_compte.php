<?php
session_start();

if ($_SESSION['isAdmin'] != true)
    header("location:connexion_admin.php");

//Récupérer l'ID du candidat à supprimer
$id_compte = $_GET['id'];

//Se connecter à la BDD
require_once "../connexion_db/conn_db.php";

//Ecrire la requête
$requete = "SELECT  *  FROM compte  WHERE id = $id_compte";

$infos_brutes = mysqli_query($db, $requete) or die("Une erreur est survenue  durant l'exécution de la requête: ".mysqli_error());

$infos_compte = mysqli_fetch_assoc($infos_brutes);

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
<form action="modif_compte.php?" method="POST">
    <h1>FORMULAIRE DE MODIFICATION</h1>
    <br>

    <div>
        <input type="hidden" name="id_compte" value="<?php echo $id_compte;?>">
    </div>

    <br>
    <div>
        <label for="nom">Pseudo</label>
        <input type="text" name="pseudo" value="<?php echo $infos_compte['pseudo']; ?>">
    </div>
    <br>
    <div>
        <label for="nom">E-mail</label>
        <input type="text" name="email" value="<?php echo $infos_compte['email']; ?>">
    </div>
    <br>
    <div>
        <label for="nom">Mot de passe</label>
        <input type="password" name="mdp" value="<?php echo $infos_compte['mdp']; ?>">
    </div>
    
    <div>
        <input type="submit" name="enregistrer" value="Enregistrer">
    </div>
    <div>
        <input type="submit" name="annuler" value="Annuler">
    </div>

</form>
