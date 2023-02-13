<?php
session_start();

if ($_SESSION['isAdmin'] != true)
    header("location:connexion_admin.php");

//se connecter à la BDD.
require_once "../connexion_db/conn_db.php"; 

//écrire la requête SQL pour récupérer la liste des participants.
$requete = "SELECT * FROM compte ";

//exécuter la requête SQL
$liste_brute = mysqli_query($db, $requete) or die("Erreur d'extraction ".mysqli_error());

//récupérer la liste des participants.
$liste_compte = mysqli_fetch_all($liste_brute, MYSQLI_ASSOC);
?>
<link rel="stylesheet" type="text/css" href="../style.css">

<?php
include "navigation.php";
?>

<h1 align="center">LISTE DES COMPTES</h1>
<table>
    <tr>
        <th>Modification</th>
        <th>Suppression</th>
        <th>ID</th>
        <th>pseudo</th>
        <th>E-mail</th>
        <th>Mot de passe</th>
    </tr>
    <?php foreach ($liste_compte as $liste) : ?>

        <tr>
            <?php echo "
                    <td><a href='fiche_compte.php?id={$liste["id"]}'>Modifier</a></td>
                    <td><a href='supprim_compte.php?id={$liste['id']}'>Supprimer</a></td>
                    <td>{$liste["id"]}</td>
                    <td>{$liste["pseudo"]}</td>
                    <td>{$liste["email"]}</td>
                    <td>{$liste["mdp"]}</td>";?>
        </tr>
    <?php endforeach;?>
</table>

