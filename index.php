<?php
session_start();
require 'autoload.php';

$test = "vous n'êtes pas connecté ";
$conns = false;

if (!empty($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $conns = true;
}

$db = Db::singleton();

// $sql = "SELECT * FROM project ";
$projects = $db->select_all2('projets', 'imageUrl', 'picture%');

?>



<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="icon" type="image/ico" sizes="32x32" href="/favicon.ico"> -->
    <!-- <link rel="icon" type="image/x-icon" href="image/user.ico"> -->

    <title>Osengo espace WEB</title>
    <meta name="copyright" content="Copyright 1999-2021. Plesk International GmbH. All rights reserved.">
    <!-- <script src="https://assets.plesk.com/static/default-website-content/public/default-website-index.js%22%3E</script> -->


</head>

<body>
    <header>
        <img src="image/logo_osengo_ok.png" class="logo_header" />
        <div class="conteneur">
            BIENVENUE CHEZ YASMINA BENMALEM
        </div>
        <div class="cv">
            <nav>
                <ul>
                    <li class="deroulant"><a href="">CV</a>
                        <ul class="sous">
                            <li><a href="https://benmalem-yasmina.e-osengo.fr/CV Yasmina_BENMALEM.pdf" target="_blank"><img class="eleve" src="https://benmalem-yasmina.e-osengo.fr/img/user.jpg" /> Cv_Yasmina</a></li>
                            <li><a href="" target="_blank"><img class="eleve" src="" /> Cv2</a></li>

                        </ul>
                    </li>
            </nav>
        </div>


        <nav>
            <ul>
                <li class="deroulant"><a href="#">Images Stagiaire </a>
                    <ul class="sous">
                        <li><a href="https://benmalem-yasmina.e-osengo.fr/img/user.jpg" target="_blank"><img class="eleve" src="https://benmalem-yasmina.e-osengo.fr/img/user.jpg" /> Yasmina</a>
                        </li>
                        <li><a href="https://silva-sebastien.e-osengo.fr//img/user.jpg" target="_blank"><img class="eleve" src="https://silva-sebastien.e-osengo.fr/img/user.jpg" />
                                Sébastien</a></li>
                        <li><a href="https://vaugrente-vincent.e-osengo.fr//img/user.jpg" target="_blank"><img class="eleve" src="https://vaugrente-vincent.e-osengo.fr//img/user.jpg" />Vencent</a></li>
                        <li><a href="https://teixeira-de-abreu-antonio.e-osengo.fr/img/user.jpg" target="_blank"><img class="eleve" src=" https://teixeira-de-abreu-antonio.e-osengo.fr/img/user.jpg" />Antonio</a></li>
                        <li><a href="https://lignon-kevin.e-osengo.fr/img/user.jpg" target="_blank"><img class="eleve" src="https://lignon-kevin.e-osengo.fr/img/user.jpg" />Kevin</a></li>
                        <li><a href="https://munos-gabriel.e-osengo.fr/img/user.jpg" target="_blank"><img class="eleve" src="https://munos-gabriel.e-osengo.fr/img/user.jpg" />Gabrièl</a></li>
                        <li><a href="https://mailley-benjamin.e-osengo.fr/img/user.jpg" target="_blank"><img class="eleve" src="https://mailley-benjamin.e-osengo.fr/img/user.jpg" />Benjamin</a>
                        </li>
                        <li><a href="https://begoud-camille.e-osengo.fr/img/user.jpg" target="_blank"><img class="eleve" src="https://begoud-camille.e-osengo.fr/img/user.jpg" />Camille</a></li>
                        <li><a href="https://laboutique-nathan.e-osengo.fr/img/user.jpg" target="_blank"><img class="eleve" src="https://laboutique-nathan.e-osengo.fr/img/user.jpg" />Nathan</a>
                        </li>
                        <li><a href="https://robert-michael-marco.e-osengo.fr/img/user.jpg" target="_blank"><img class="eleve" src="https://robert-michael-marco.e-osengo.fr/img/user.jpg" />Michael</a></li>

                    </ul>
                </li>
        </nav>
    </header>
    <div class="mes_travaux">
        <div class="style_bloc">
            <form action="login.php" class="signin-form ml-5" method="post" id="formu">
                <div class="d-flex">
                    <div class="form-group p-2">
                        <input type="text" class="form-control form-design" name="username" id="username" placeholder="username " required>
                        <p id="error2"></p>
                    </div>
                    <div class="form-group p-2">
                        <input type="password" class="form-control form-design" name="pwd" id="mdp" placeholder="Password" required>
                        <p id="error4"></p>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn bg-dark submit px-3 py-3 text-white mb-3">Sign In</button>
                </div>
                <div class="form-group d-md-flex justify-content-between mb-4">
                    <div class="w-25">
                        <label class="checkbox-wrap checkbox-primary text-saumon d-flex">Remember Me
                            <input type="checkbox" checked>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="text-md-right ">
                        <a class="text-white" href="#">Forgot Password</a>
                    </div>
                </div>
            </form>
        </div>

        <?php
        foreach ($projects as $product) :
            $value = $product['projet_id'];
            $sql = "SELECT * FROM  versions WHERE projet_id ='$value' ";
            $versions = $db->select_sql($sql);

        ?>

            <?php

            //avec mon code il boucle et il m'affiche le dernier resultat car ma table contien 11 elts du coup il m'affiche le dernier
            ?>
            <div class="style_bloc">



                <div class="style_template" style=" background-image: url('./image/<?php echo $product['imageUrl'] ?>');">
                </div>
                <div class="bloc_milieu">

                    <h2 class="style_titre"><?php echo $product['titre'] ?><span><?php echo $product['type'] ?></h2>
                    <!-- <h2 class="style_titre">site Memory<span>travail collectif</span></h2> -->

                    <p><?php echo $product['description'] ?></p>
                    <!-- <p>premier projet collectif,qui contient la liste des stagière et un jeu memory</p> -->
                </div>
                <div class="evolution_projet">
                    <h2>Versions :</h2>
                    <ul>
                        <?php
                        foreach ($versions as $version) :
                        ?>

                            <li><a class="site_finale" href="<?php echo $version['versionUrl'] ?>" target="_blank"><?php echo  $version['version_name'] ?> </a></li>

                        <?php endforeach; ?>

                        <form action="add_version.php" class="" method="post" id="formu">
                            <input class="color-1-dark m-1 d-none " style="text-align: justify;" placeholder="projets id" name="new_version" value=" <?php echo  $product['projet_id'] ?>  "></input>
                            <li class=d-flex> <input class="color-1-dark m-1" style="width:80px;" placeholder="taper l'Url" name="versionUrl"></input>
                                <input class="color-1-dark m-1" style="width:120px;" placeholder="ajouter le nom" name="version_name"></input>
                                <button type="submit" value="Enregistrer" style="margin-left: 20px;width:60px; "> ajouter </button>
                            </li>


                        </form>

                    </ul>

                </div>
            </div>
        <?php


        endforeach; ?>


    </div>
</body>


<footer>


    <p class="elementor-heading-title elementor-size-default">© Tous droits réservés Osengo
    </p>
    <span class="test">
        <img src="https://img.icons8.com/fluency/48/000000/facebook-new.png" />
        <img src="https://img.icons8.com/stickers/100/000000/youtube-play.png" width="50px" height="50px" />
        <img src="https://img.icons8.com/fluency/48/000000/linkedin-circled.png" />
        <img src="https://img.icons8.com/color/48/000000/instagram-new--v1.png" />
    </span>

</footer>

</html>