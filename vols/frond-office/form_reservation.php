<?php
// on vérifie si l'utilisateur est connecter
	session_start();
	include_once'navigation.php';

	if(isset($_SESSION['username'])){//Utilisateur connectée
	$login = $_SESSION['username'];
	}else{//Sinon Redirection vers vers le formulaire d'authentification 
		header('Location: form_authentification.php');
	}
	//Se connecter à la base donnée
	 require_once "../connexion_db/conn_db.php";
	 // On récupere dans la base de donnée les éléments pours réaliser un menu déroulant
	$sql = mysqli_query($db, "SELECT idvol,villedep,villearr FROM vol") or die("Erreur dans la récupération des données : ". mysqli_error());
    
     $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../style.css" media="screen" type="text/css" />
	<title>Formulaire</title>
</head>


<body>
	
	<div id="container">
		<!-- Ici on n'a le formulaire d'inscription dont l'action est ajout_client.php -->
	<form name="form" action="../back-office/ajout_reservation.php" method="POST">
		<h1 align="center">Formulaire de Réservation</h1>
		
			
				<label><b>Nom</b></label>
				<input type="text" name="nom" placeholder="Nom" required>

				<label><b>Prénom</b></label>
				<input type="text" name="prenom" placeholder="Prénom" required>
			
			<div class="destination">
				<label><b>Pays de départ</b></label>
				<select name="depart" required>
						<option value="">sélectionnez</option>
						 <?php foreach($result as $vol) : ?>
                    	<option value="<?php echo $vol['villedep'] ?>">
                        <?php echo $vol['villedep']; ?> 
                    	</option>
                        <?php endforeach; ?>
				</select>
			</div>

			<div class="destination">
				<label><b>Pays d'arrivée</b></label>
				<select name="arriver" required>
						<option value="" >sélectionnez</option>
						 <?php foreach($result as $vol) : ?>
                    	<option value="<?php echo $vol['villearr'] ?>">
                        <?php echo $vol['villearr']; ?> 
                    	</option>
                        <?php endforeach; ?>
					</select>
			</div>

			<!-- formulaire date aller -->
			<div class="destination">
			<label><b>Date aller</b></label><br>
			<div class="date">
				<select name="annee_dep" require>
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
				<select name="mois_dep" require>
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
				<select name="jour_dep" require>
					<option value="">Jour</option>
					<?php
					for ($i=1 ; $i<= 30; $i++)
					{
						echo "<option value='${i}'>${i}</option>";
					}
					?>
				</select required>
			</div>
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
				</select>
			</div>
		</div>

				<input type="submit" name="s'inscrire">
		
	</form>
	</div>
</body>
</html>