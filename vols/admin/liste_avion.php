<?php
session_start();

if ($_SESSION['isAdmin'] != true)
    header("location:connexion_admin.php");

//se connecter à la BDD.
require_once "../connexion_db/conn_db.php"; 

//écrire la requête SQL pour récupérer la liste des participants.
$requete = "SELECT * FROM avion ";

//exécuter la requête SQL
$liste_brute = mysqli_query($db, $requete) or die("Erreur d'extraction ".mysqli_error());

//récupérer la liste des participants.
$liste_avion = mysqli_fetch_all($liste_brute, MYSQLI_ASSOC);
?>
<link rel="stylesheet" type="text/css" href="../style.css">
<?php
include "navigation.php";
?>

<h1 align="center">LISTE DES AVIONS</h1>
<table>
    <tr>
        <th>Modification</th>
        <th>Suppression</th>
        <th>ID avoin</th>
        <th>Type d'avoin</th>
        <th>Capacité</th>
        <th>Localisation</th>
        <th>Remarque</th>
        
    </tr>
    <?php foreach ($liste_avion as $avion) : ?>

        <tr>
            <?php echo "
                    <td><a href='fiche_avion.php?id={$avion["idav"]}'>Modifier</a></td>
                    <td><a href='supprim_avion.php?id={$avion['idav']}'>Supprimer</a></td>
                    <td>{$avion["idav"]}</td>
                    <td>{$avion["typeav"]}</td>
                    <td>{$avion["cap"]}</td>
                    <td>{$avion["loc"]}</td>
                    <td>{$avion["remarq"]}</td>";?>
        </tr>
    <?php endforeach;?>
</table>
