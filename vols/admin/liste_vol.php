<?php
session_start();

if ($_SESSION['isAdmin'] != true)
    header("location:connexion_admin.php");

//se connecter à la BDD.
require_once "../connexion_db/conn_db.php"; 

//écrire la requête SQL pour récupérer la liste des participants.
$requete = "SELECT * FROM vol ";

//exécuter la requête SQL
$liste_brute = mysqli_query($db, $requete) or die("Erreur d'extraction ".mysqli_error());

//récupérer la liste des participants.
$liste_vol = mysqli_fetch_all($liste_brute, MYSQLI_ASSOC);
?>
<link rel="stylesheet" type="text/css" href="../style.css">

<?php
include "navigation.php";
?>

<h1 align="center">LISTE DES VOLS</h1>
<table>
    <tr>
        <th>Modification</th>
        <th>Suppression</th>
        <th>ID vol</th>
        <th>ID Pilote</th>
        <th>ID avoin</th>
        <th>Ville de départ</th>
        <th>Ville d'arriver</th>
        <th>hdep</th>
        <th>harr</th>
        <th>date</th>
    </tr>
    <?php foreach ($liste_vol as $vol) : ?>

        <tr>
            <?php echo "
                    <td><a href='fiche_vol.php?id={$vol["idvol"]}'>Modifier</a></td>
                    <td><a href='supprim_vol.php?id={$vol['idvol']}'>Supprimer</a></td>
                    <td>{$vol["idvol"]}</td>
                    <td>{$vol["idpil"]}</td>
                    <td>{$vol["idav"]}</td>
                    <td>{$vol["villedep"]}</td>
                    <td>{$vol["villearr"]}</td>
                    <td>{$vol["hdep"]}</td>
                    <td>{$vol["harr"]}</td>
                    <td>{$vol["dat"]}</td>";?>
        </tr>
    <?php endforeach;?>
</table>
