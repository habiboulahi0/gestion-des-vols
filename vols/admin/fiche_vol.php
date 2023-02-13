<?php
session_start();

if ($_SESSION['isAdmin'] != true)
    header("location:connexion_admin.php");

//Récupérer l'ID du candidat à supprimer
$id_vol = $_GET['id'];

//Se connecter à la BDD
require_once "../connexion_db/conn_db.php";

//Ecrire la requête
$requete = "SELECT  *  FROM vol  WHERE idvol = $id_vol";

$infos_brutes = mysqli_query($db, $requete) or die("Une erreur est survenue  durant l'exécution de la requête: ".mysqli_error());

$infos_vol = mysqli_fetch_assoc($infos_brutes);

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
<form action="modif_vol.php?" method="POST">
    <h1>FORMULAIRE DE MODIFICATION</h1>
    <br>

    <div>
        <input type="hidden" name="id_vol" value="<?php echo $id_vol;?>">
    </div>

    <div>
        <label for="prenom">ID Pilote</label>
        <input type="number" name="idpil" value="<?php echo $infos_vol['idpil']; ?>">
    </div>
    <br>
    <div>
        <label for="nom">ID Avoin</label>
        <input type="number" name="idav" value="<?php echo $infos_vol['idav']; ?>">
    </div>
    <br>
    <br>
    <div>
        <label for="depart">Ville de départ</label>
        <select name="villedep">
            <?php foreach($villes as $ville) : ?>
                <option <?php if($infos_vol['villedep'] == $ville['villedep']) echo "selected"; ?> value="<?php echo $ville['villedep']?>">
                    <?php echo $ville['villedep']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <br>
        <div>
        <label for="arriver">Ville d'arriver</label>
        <select name="villearr">
            <?php foreach($villes as $ville) : ?>
                <option <?php if($infos_vol['villearr'] == $ville['villearr']) echo "selected"; ?> value="<?php echo $ville['villearr']?>">
                    <?php echo $ville['villearr']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <br>
    <!-- Pour les heurs -->
        <div>
            <label for="">Heurs de départ</label>
            <input type="number" name="hdep" value="<?php echo $infos_vol['hdep']; ?>">
        </div><br>
        <div>
            <label for="">Heurs d'arriver</label>
            <input type="number" name="harr" value="<?php echo $infos_vol['harr']; ?>">
        </div>

        <!-- formulaire date aller -->
            <div class="destination">
            <label><b>Date aller</b></label><br>
            <div class="date">
                <select name="annee_dep" required>
                    <?php
                    $tab=explode('-',$infos_vol['dat']);
                    $annee = (int)$tab[0];?>
                      <option value="<?php echo "$annee" ?>">
                    <?php echo "$annee";?> </option>

                    <?php  for ($i=1990 ; $i<= 2030; $i++)
                    {
                        echo "<option value='${i}'>${i}</option>";
                    }
                        
                    ?>
                </select required>
            </div>
            <div class="date">
                <select name="mois_dep" required>
                   <?php
                    $tab=explode('-',$infos_vol['dat']);
                    $mois = (int)$tab[1];?>
                      <option value="<?php echo "$mois" ?>">
                    <?php echo "$mois";?> </option>

                    <?php  for ($i=1 ; $i<= 12; $i++)
                    {
                        echo "<option value='${i}'>${i}</option>";
                    }
                        
                    ?>
                </select required>
            </div>
            <div class="date">
                <select name="jour_dep" required>
                    <?php
                    $tab=explode('-',$infos_vol['dat']);
                    $jour = (int)$tab[2];?>
                      <option value="<?php echo "$jour" ?>">
                    <?php echo "$jour";?> </option>
                    <?php
                    for ($i=1 ; $i<= 30; $i++)
                    {
                        echo "<option value='${i}'>${i}</option>";
                    }
                    ?>
                </select required>
            </div>
    </div>
    <br>
    <div>
        <input type="submit" name="enregistrer" value="Enregistrer">
        <br>
        <input type="submit" name="annuler" value="Annuler">
    </div>

</form>
