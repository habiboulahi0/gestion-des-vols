<?php  
session_start();
// Afficher la bar de navigation
include_once("navigation.php");
if(isset($_SESSION['username'])){
    $login = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" type="image/png" href="img/b.png" />
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="../img.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <title>Acceuil</title>
</head>

<body id="home" class="srcollspy">
    <!--Navbar -->
    
    
    <!-- SEction :slider-->
    <section class="slider">
    	<img id="img" >
    </section>
    <!--Section: Icon-->
    <section class="section section-icons grey lighten-4 center">
        <div class="quote">
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col s12 m4" data-aos="fade-in" data-aos-delay="300">
                            <div class="card-panel box box1">
                                <i class="material-icons large
teal-text">info</i>
                                <a href="index.php" class="dd">
                                    <H4>Information</H4>
                                </a>
                                <p class="lg2">Pour plus information sur le retard ou reportage de vols clique sur cette
                                    partie. </p>
                            </div>
                        </div>
                        <div class="col s12 m4" data-aos="fade-in" data-aos-delay="600">
                            <div class="card-panel box box2">
                                <i class="material-icons large
teal-text">person</i>
                                <a href="index.php" class="dd">
                                    <H4>Présentation</H4>
                                </a>
                                <p class="lg2">Pour plus reignement sur notre entreprise cliqué sur cette page.</p>
                            </div>
                        </div>
                        <div class="col s12 m4" data-aos="fade-in" data-aos-delay="900">
                            <div class="card-panel box box3">
                                <i class="material-icons large
teal-text">airplanemode_active</i>
                                47
                                <a href="index.php" class="dd">
                                    <H4>Aviation</H4>
                                </a>
                                <p class="lg2">Pour l'affichage de tous les vols de nos differents aréport cliqué ici.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    
</body>

</html>