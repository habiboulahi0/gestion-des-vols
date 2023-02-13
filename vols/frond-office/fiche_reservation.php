<?php
session_start();
// Pas de connexion 
if ($_SESSION['username'] != true)
    header("location:index.php");

//Récupérer l'ID du candidat à supprimer ou modifer
$id_reservation = $_GET['id_reservation'];

//Se connecter à la BDD
require_once "../connexion_db/conn_db.php";

//Requête
$requete = "SELECT * FROM reservation  WHERE id = $id_reservation";
//Execution de la requête sql dans la base de donnée
$infos_brutes = mysqli_query($db, $requete) or die("Une erreur est survenue  durant l'exécution de la requête: ".mysqli_error());

$infos_compte = mysqli_fetch_assoc($infos_brutes);
//Requête
$ville = mysqli_query($db, "SELECT idvol,villedep,villearr FROM vol") or die("Erreur dans la récupération des données : ". mysqli_error());
    
    $villes = mysqli_fetch_all($ville, MYSQLI_ASSOC);

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
<form action="../back-office/modif_reservation.php?" method="POST">
    <h1>FORMULAIRE DE MODIFICATION</h1>
    <br>

    <div>
        <input type="hidden" name="id_reservation" value="<?php echo $id_reservation;?>">
    </div>

    <div>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" value="<?php echo $infos_compte['nom']; ?>">
    </div>
    <br>
    <div>
        <label for="nom">NOM</label>
        <input type="text" name="nom" value="<?php echo $infos_compte['prenom']; ?>">
    </div>
    <br>
    <br>
    <div>
        <label for="depart">Ville de départ</label>
        <select name="depart">
            <?php foreach($villes as $ville) : ?>
                <option <?php if($infos_compte['ville_dep'] == $ville['villedep']) echo "selected"; ?> value="<?php echo $ville['villedep']?>">
                    <?php echo $ville['villedep']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <br>
        <div>
        <label for="arriver">Ville d'arriver</label>
        <select name="arriver">
            <?php foreach($villes as $ville) : ?>
                <option <?php if($infos_compte['ville_arr'] == $ville['villearr']) echo "selected"; ?> value="<?php echo $ville['villearr']?>">
                    <?php echo $ville['villearr']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <br>
        <!-- formulaire date aller -->
            <div class="destination">
            <label><b>Date aller</b></label><br>
            <div class="date">
                <select name="annee_dep" >
                    <option value="">Année</option>
                    <?php
                        for ($i=2022 ; $i<= 2030; $i++)
                        {
                            echo "<option value='${i}'>${i}</option>";
                        }
                    ?>
                </select required>
            </div>
            <div class="date">
                <select name="mois_dep" >
                    <option value="">Mois</option>
                    <?php
                    for ($i=1 ; $i<= 12; $i++)
                    {
                        echo "<option value='${i}'>${i}</option>";
                    }
                    ?>
                </select required>
            </div>
            <div class="date">
                <select name="jour_dep" >
                    <option value="">Jour</option>
                    <?php
                    for ($i=1 ; $i<= 30; $i++)
                    {
                        echo "<option value='${i}'>${i}</option>";
                    }
                    ?>
                </select required>
            </div>
            <!-- formulaire date retour -->
            <div class="destination">
            <label><b>Date retour</b></label><br>
            <div class="date">
                <select name="annee_arr">
                    <option value="">Année</option>
                    <?php
                        for ($i=2022 ; $i<= 2030; $i++)
                        {
                            echo "<option value='${i}'>${i}</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="date">
                <select name="mois_arr">
                    <option value="">Mois</option>
                    <?php
                    for ($i=1 ; $i<= 12; $i++)
                    {
                        echo "<option value='${i}'>${i}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="date">
                <select name="jour_arr">
                    <option value="">Jour</option>
                    <?php
                    for ($i=1 ; $i<= 30; $i++)
                    {
                        echo "<option value='${i}'>${i}</option>";
                    }
                    ?>
                </select >
            </div>
    </div>
    <br>
    <div>
        <input type="submit" name="enregistrer" value="Enregistrer">
    </div>
    <div>
        <input type="submit" name="annuler" value="Annuler">
    </div>

</form>
