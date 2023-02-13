<?php
session_start();

if(isset($_POST['pseudo']) && isset($_POST['password']))
{
   // Se connecter à la base de donnée
    include_once("../connexion_db/conn_db.php");
    // Récuperation des informations du formulaire
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    
    //vérification si les variables ne sont pas vide
    if($pseudo !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM compte where 
              pseudo = '".$pseudo."' and mdp = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        echo "$reponse";
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes ==> l'utilisateur existe dans la base de donnée
        {
           $_SESSION['username'] = $pseudo;
           header('Location: ../frond-office/index.php');
        }
        else
        {
           header('Location: ../frond-office/form_authentification.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: ../frond-office/form_authentification.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: ../frond-office/form_authentification.php');
}
?>