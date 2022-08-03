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



    <!-- <div class="container d-flex justify-content-center">
        <button onclick="ouvrir_formulaire()" class="bg-light rounded-3 px-3 py-4 shadow  m-auto my-3 text-center col-6 color-1 fw-bold" style="border: 2px solid #22597c30;" id="ajouter">AJOUTER UN PROJET</button>
    </div> -->





    <div class="container " id='formulaire'>
        <form action="save_projet.php" method="post" class="row bg-light rounded-3 px-3 py-4 shadow" style="border: 2px solid #22597c30;">


            <!-- bloc gauche -->
            <div class="px-4 order-2 order-md-3 order-lg-1 col-12 col-md-12 col-lg-4 d-flex flex-column align-items-center">


                <input class="m-1" placeholder="Image" name="imageUrl"></input>


            </div>

            <!-- bloc centre -->
            <div class="px-4 order-1 order-md-1 order-lg-2 col-12 col-md-8 col-lg-5 d-flex flex-column">
                <div class="color-1">
                    <input class=" fw-bold m-1" placeholder="Titre du Projet" name="titre"></input>
                    <small><input class="fw-normal m-1" placeholder="Type Projet" name="type"></input></small>

                </div>

                <textarea id="story" name="description" rows="5" cols="33" placeholder="Description du projet"></textarea>
            </div>

            <!-- bloc droite -->
            <div class="px-4 order-3 order-md-2 order-lg-3 col-12 col-md-4 col-lg-3 d-flex flex-column">
                <p class="fw-bold text-center text-md-end text-decoration-underline text-uppercase mt-3 color-1-dark">versions</p>
                <input class="color-1-dark m-1" style="text-align: justify;" placeholder="nom de la version" name="version_name"></input>
                <input class="color-1-dark m-1" style="text-align: justify;" placeholder="url de la version finale du projet" name="versionUrl"></input>

                <div class="d-block justify-content-around" id="%replacedBy_titre_projet%">

                    <!-- ici on ajoute un template_version a chaque version -->

                </div>

            </div>
            <div class='d-flex justify-content-center m-1 order-last'>
                <button type="submit"> Enregistrer</button>
            </div>

        </form>
</body>

</html>