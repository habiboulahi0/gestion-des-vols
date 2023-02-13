<?php 
// on vérifie si l'utilisateur est connecter
session_start();
if(isset($_SESSION['username'])){//Utilisateur connectée
	$login = $_SESSION['username'];
	// Vérification si l'utilisateur à cliquer sur le bouton ajouter,pour ajouter une nouvelle reservation 
	if (!empty($_POST['ajouter'])) {
	header('location: form_reservation.php ');
	}
	//Se connecter à la base donnée
	include_once("../connexion_db/conn_db.php");
	include_once("navigation.php");
	//La requete sql pour récuperer les information dans la table reservation.on conte le nombre de ligne des reservations effectuée pas l'utilisateur connecté
	$requete = "SELECT count(*) FROM reservation where pseudo ='".$login."'";
	//Execution de la commande dans la base de donnée
	$sql = mysqli_query($db,$requete);
	$ligne = mysqli_fetch_array($sql);
	$count = $ligne['count(*)'];
	if ($count != 0) {//vérification du nombre de ligne retourné par la requête

		//La requete sql pour récuperer les information dans la table reservation
		$sql = mysqli_query($db, "SELECT * FROM reservation where pseudo ='".$login."'") or die("Erreur dans la récupération des données : ". mysqli_error());
		// La fonction permet d'afficher le resultat de la recheche et d'affiche les lignes dans consernée
		function tableau($sql){
			echo "<table >
				<tr>
					<th>Modification</th>
					<th>Suppression</th>
		        		<th>Nom</th>
		        		<th>Prénom</th>
		        		<th>ville de départ</th>
		        		<th>ville d'arrivée</th>
		        		<th>date de départ</th>
		        		<th>date d'arrivée</th>
		    		</tr>";
			while ($ligne=mysqli_fetch_array($sql)) {
				extract($ligne);
				echo "<tr>
					<td><a href='fiche_reservation.php?id_reservation={$ligne["id"]}'>Modifier</a></td>
					<td><a href='../back-office/supprim_reservation.php?id_reservation={$ligne['id']}'>Annuler</a></td>
					<td>$nom</td>
					<td>$prenom</td>
					<td>$ville_dep</td>
					<td>$ville_arr</td>
					<td>$dat_dep</td>
					<td>$dat_arr</td>
				</tr>
				</tabl>";	
			}
		}
	}else{// Sinon l'utilisateur n'a pas de réservation
		function tableau(){
			echo "<h2>Vous n'avez pas de réservation en cour</h2";
		}
	}
}else{//Redirection vers le formulaire authentification
	echo "Veuillez vous authentifer";
	header('location: form_authentification.php');
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="../style.css">
 	<title>liste de reservation</title>
 </head>
 <body>
 	<h1 align="center">Votre liste de reservation</h1>
 	<!-- Bouton pour ajouter une réservation  -->
	<form action="liste_reservation.php" method="POST">
    	 <div align="center">
    	 	<input type="submit" value="Ajouter" name="ajouter">
    	 </div>
    </form>
    	<?php 
    		tableau($sql);
    	 ?>
    
 </body>
 </html>