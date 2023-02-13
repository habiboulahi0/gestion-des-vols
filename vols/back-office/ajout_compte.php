<?php
if (!empty($_POST['pseudo']) && !empty($_POST['email'])
    && !empty($_POST['mdp']) && !empty($_POST['confirmation']))
{
    // Récuperation des informations du formulaire
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $confirmation = $_POST['confirmation'];
}
//vérification si le mot de passe et le mot de passe de confirmation sont correct  
if ($mdp == $confirmation) {
    //Se connecter à la base donnée
     include_once("../connexion_db/conn_db.php");
//vérification si le pseudo existe déjà dans la base de donnée
     $requete = "SELECT count(*) FROM compte where 
              pseudo = '".$pseudo."' AND mdp = '".$mdp."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=1) // nom d'utilisateur et mot de passe correctes
        {
            //ajouter d'un nouveau compte
            $test = mysqli_query($db, "INSERT INTO compte (pseudo, email, mdp) VALUES( '$pseudo', '$email', '$mdp')") or die("Erreur dans l'insertion des données : ". mysqli_error());
            if ($test) {
                header('Location: ../frond-office/form_authentification.php');
            }else{
                header('Location: ../frond-office/form_inscription.php');
            }
        }else{
            header('Location: ../frond-office/form_inscription.php?erreur=1');// le pseudo existe déjà dans la base de donnée
        }
}
else{
   header('Location: ../frond-office/form_inscription.php?erreur=2');//Mot de passe incorrect
   }
?>
