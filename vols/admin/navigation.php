<div class="navbar-fixed">
        <nav class="teal ">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo"><img class="lg0" src="" class="lg0"></a>
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger">
                        <i class="material-icons">menu</i>
                        <ul class="right hide-on-med-and-down">
                            <li>
                                <a href="">Acceuil</a>
                            </li>
                            <li>
                                <a href="liste_compte.php">COMPTES</a>
                            </li>
                            <li>
                                <a href="liste_vol.php">VOLS</a>
                            </li>
                            <li>
                                <a href="liste_avion.php">AVIONS</a>
                            </li>
                            <li>
                                <a href="liste_pilote.php">PILOTE</a>
                            </li>
                            <?php
                                if (isset($_SESSION['isAdmin'])) {
                            ?>
                            <li>
                                <a href="deconnexion.php">Deconnexion</a>
                            </li>
                            <?php
                             }else{
                            ?>
                            <li>
                                <a href="connexion_admin.php">Se connecter</a>
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

