<?php
session_start();

if ($_SESSION['isAdmin'] != true)
    header("location:index.php");

//se connecter à la BDD.
require_once "../connexion_db/conn_db.php"; 

//écrire la requête SQL pour récupérer la liste des participants.
$requete = "SELECT * FROM pilote ";

//exécuter la requête SQL
$liste_brute = mysqli_query($db, $requete) or die("Erreur d'extraction ".mysqli_error());

//récupérer la liste des participants.
$liste_pilote = mysqli_fetch_all($liste_brute, MYSQLI_ASSOC);
?>
<link rel="stylesheet" type="text/css" href="../style.css">


<?php
include "navigation.php";
?>

<h1 align="center">LISTE DES PILOTES</h1>
<table>
    <tr>
        <th>Modification</th>
        <th>Suppression</th>
        <th>ID Pilote</th>
        <th>Nom Pilote</th>
        <th>Date de naissance</th>
        <th>Adresse</th>
        <th>N°téléphone</th>
        <th>Salaire</th>
        
    </tr>
    <?php foreach ($liste_pilote as $pilote) : ?>

        <tr>
            <?php echo "
                    <td><a href='fiche_pilote.php?id={$pilote["idpil"]}'>Editer</a></td>
                    <td><a href='supprim_pilote.php?id={$pilote['idpil']}'>Supprimer</a></td>
                    <td>{$pilote["idpil"]}</td>
                    <td>{$pilote["nompil"]}</td>
                    <td>{$pilote["dnaiss"]}</td>
                    <td>{$pilote["adr"]}</td>
                    <td>{$pilote["tel"]}</td>
                    <td>{$pilote["sal"]}</td>";?>
        </tr>
    <?php endforeach;?>
</table>
