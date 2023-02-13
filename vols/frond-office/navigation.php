<div class="navbar-fixed">
        <nav class="teal ">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo"><img class="lg0" src="" class="lg0"></a>
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger">
                        <i class="material-icons">menu</i>
                        <ul class="right hide-on-med-and-down">
                            <li>
                                <a href="index.php">Acceuil</a>
                            </li>
                            <li>
                                <a href="programme_vol.php">Programmes des vols</a>
                            </li>
                            <li>
                                <a href="form_reservation.php">Réservation</a>
                            </li>
                            <!-- si le client est connecter, on affiche les liens qui permet de voir ses reservations et la déconnection  -->
                            <?php
                                if (isset($_SESSION['username'])) {
                            ?>
                            <li>
                                <a href="liste_reservation.php">Vos réservations</a>
                            </li>
                            <li>
                                <a href="../back-office/deconnexion.php">Deconnexion</a>
                            </li>
                            <?php
                            // Si le client ne pas connecter (Authentifier), on affiche s'inscrire et Se connecter
                             }else{
                            ?>
                            <li>
                                <a href="form_inscription.php">S'inscrire</a>
                            </li>
                            <li>
                                <a href="form_authentification.php">Se connecter</a>
                            </li>
                            <?php
                             }
                            ?>
                        </ul>
                    </a>
                </div>
            </div>
        </nav>
    </div>

