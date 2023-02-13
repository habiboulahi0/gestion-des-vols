<?php  
session_start();
if(isset($_SESSION['username'])){
	$login = $_SESSION['username'];
}
	//Se connecter à la base donnée
	include_once("../connexion_db/conn_db.php");
	// Afficher la bar de navigation
	include_once("navigation.php");

	//Requête SQL pour crée une liste deroulante pour les recheches des vols
	 $sql = mysqli_query($db, "SELECT idvol,villedep,villearr FROM vol") or die("Erreur dans la récupération des données : ". mysqli_error());
    
     $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
   
   //On vérifie si l'utilisateur à entrer la ville de départ ou la ville d'arriver à rechercher	 
	if(isset($_POST['depart']) || isset($_POST['destination']))
	{
		$ville_dep = $_POST['depart'];
		$ville_arr = $_POST['destination'];

		//La requete sql pour récuperer les informations selon la recheche effectué par l' utilisateur
		$liste_sql = "SELECT * FROM vol natural join avion Where (villedep = '$ville_dep' or villearr = '$ville_arr' ) AND remarq = 'En service' and loc = villedep" or die("Erreur dans la récupération des données : ". mysqli_error());
		//Execution de la commande dans la base de donnée
		$exec_requete = mysqli_query($db,$liste_sql);
		// on test pour voir si la varible $exec_requete  contient des lignes pour affiche aprés la recheche
		if ($reponse = mysqli_fetch_array($exec_requete, MYSQLI_ASSOC)){ 

			//Requête
			$liste_sql = "SELECT * FROM vol natural join avion Where (villedep = '$ville_dep' or villearr = '$ville_arr') AND remarq = 'En service' and loc = villedep" or die("Erreur dans la récupération des données : ". mysqli_error());
			//Execution de la commande dans la base de donnée
			$exec_requete = mysqli_query($db,$liste_sql);
			// La fonction permet d'afficher le resultat de la recheche et d'affiche les lignes dans consernée 
			function tableau($exec_requete)
			{		
				//on extrait les lignes de la table $exec_requete pour les affichers
				while ($ligne=mysqli_fetch_array($exec_requete, MYSQLI_ASSOC)) {
					extract($ligne);
					echo "<tr>
							<td>$idvol</td>
							<td>$typeav</td>
							<td>$villedep</td>
							<td>$villearr</td>
							<td>$hdep</td>
							<td>$harr</td>
							<td>$dat</td>
						</tr>";
				}
			}
		}else{// sinon on affiche la liste compléte des vols programmées
			//La requete sql pour récuperer la liste compléte des vols programmées
			$sql = "SELECT * FROM vol natural join avion where remarq = 'En service' and loc = villedep";
			//Execution de la commande dans la base de donnée
			$exec_requete = mysqli_query($db,$sql) or die("Erreur d'extraction ".mysqli_error());
			// On passe en argument le resultat de la requête sql
			function tableau($exec_requete)
			{
				echo"<h1 align='center'>LISTE COMPLETE DES VOLS PROGRAMMEES</h1>";
				echo"<h3 align='center'>Recherche 'introuvable'</h3>";
				//on extrait les lignes de la table $exec_requete pour les affichers 
				while ($ligne=mysqli_fetch_array($exec_requete, MYSQLI_ASSOC)) {
					extract($ligne);
					echo "<tr>
							<td>$idvol</td>
							<td>$typeav</td>
							<td>$villedep</td>
							<td>$villearr</td>
							<td>$hdep</td>
							<td>$harr</td>
							<td>$dat</td>
						</tr>";
				}
			}
		}
	}else{//Si l'utilisateur n'effectue aucun recheche on affiche directement la liste compléte des vols programmées
			$sql = "SELECT * FROM vol natural join avion where remarq = 'En service' and loc = villedep";
			//Execution de la commande dans la base de donnée
			$exec_requete = mysqli_query($db,$sql) or die("Erreur d'extraction ".mysqli_error());
			// On passe en argument le resultat de la requête sql
			function tableau($exec_requete)
			{
				echo"<h1 align='center'>LISTE COMPLETE DES VOLS PROGRAMMEES</h1>";
				//on extrait les lignes du tableau $exec_requete pour les affichers
				while ($ligne=mysqli_fetch_array($exec_requete, MYSQLI_ASSOC)) {
					extract($ligne);
					echo "<tr>
							<td>$idvol</td>
							<td>$typeav</td>
							<td>$villedep</td>
							<td>$villearr</td>
							<td>$hdep</td>
							<td>$harr</td>
							<td>$dat</td>
						</tr>";
				}
			}
		}
?>		
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Programme des vols</title>

</head>
<body>
	<!-- formulaire de recherche -->
	<h3 align="center">Rechecher</h3>
	<form align="center" action="programme_vol.php" method="POST">
		<div>
			<label>Choisir votre ville de départ</label>
			<select name="depart">
				<!-- On recupere dans la base de donnée les noms des villes pour faire un menu déroulant -->
						<option >sélectionnez</option>
						 <?php foreach($result as $vol) : ?>
                    	<option value="<?php echo $vol['villedep'] ?>">
                        <?php echo $vol['villedep']; ?>
                    	</option>
                        <?php endforeach; ?>
					</select required>
		</div>
		<div>
			<label>Choisir votre ville de destination</label>
			<select name="destination">
				<!-- On recupere dans la base de donnée les noms des villes pour faire un menu déroulant -->
						<option >sélectionnez</option>
						 <?php foreach($result as $vol) : ?>
                    	<option value="<?php echo $vol['villearr'] ?>">
                        <?php echo $vol['villearr']; ?> 
                    	</option>
                        <?php endforeach; ?>
					</select >
		</div>
		<input class="button" type="submit" name="rechercher" value="Rechecher">
	</form>
	
<table>
    <tr>
        <th>Identifiant du vol</th>
        <th>Type d'avion</th>
        <th>ville de départ</th>
        <th>ville d'arrivée</th>
        <th>heurs de départ</th>
        <th>heurs d'arrivée</th>
        <th>date</th>
    </tr>
  
    <tr>
        <?php 
           	tableau($exec_requete);
        ?>
    </tr>
    
</table>

</body>
</html>