<?php include_once'navigation.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../style.css" media="screen" type="text/css" />
	<title>Formulaire d'inscription</title>
</head>


<body>
	
	<div id="container">
		<!-- Ici on n'a le formulaire d'inscription dont l'action est ajout_compte.php -->
	<form class="form" action="../back-office/ajout_compte.php" method="POST">
		<h1 align="center">Formulaire d'inscription</h1>
		
			
				<label><b>Pseudo</b></label>
				<input type="text" name="pseudo" placeholder="Pseudo" required>
			
				<label><b>E-mail</b></label>
				<input type="email" name="email" placeholder="E-mail" required>

				<label><b>Mot de passe</b></label>
				<input type="password" name="mdp" placeholder="Mot de passe" required>

				<label><b>Confirmation</b></label>
				<input type="password" name="confirmation" placeholder="Confirmation" required>

				<a href="form_authentification.php">J'ai déjà un compte</a><br>
                <a href="#">J'ai oublier mot de passe</a>
			
				<input type="submit" name="s'inscrire">
				<?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Pseudo existe déjà ou mot de passe incorrect</p>";
                }
                ?>
		
	</form>
	</div>
</body>
</html>