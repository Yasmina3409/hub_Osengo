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

$sql = "SELECT * FROM project ";
$projects = $db->select_sql($sql);


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lien/css_lien/style.css">
    <title>Accueil</title>
</head>

<body>

    <header class="page-header">BIENVENUE !</header>

    <form action="logout.php">
        <?php
        if ($conns == true)
            echo "<button type='submit'> Se déconnecter</button></form>";
        else
            echo '';
        ?>
        <aside id='loggin' class="col-sm-4 d-none justify-content-center m-auto">

            <div class="card">
                <article class="card-body">
                    <div class='d-flex justify-content-between'>

                    </div>
                    <form action="login.php" method="post">
                        <div class="form-group" v>
                            <label>Your username</label>
                            <input name="username" class="form-control" placeholder="Username" type="text">
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <label>Your password</label>
                            <input class="form-control" placeholder="******" type="password" name="pwd">
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <div class="checkbox">
                            </div> <!-- checkbox .// -->
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Login </button>
                        </div> <!-- form-group// -->
                    </form>
                </article>
            </div> <!-- card.// -->

        </aside>

        <?php
        foreach ($projects as $product) :
            $value = $product['project_id'];
            $sql = "SELECT * FROM version WHERE project_id ='$value' ";
            $versions = $db->select_sql($sql);
        ?>

            <section>
                <article>
                    <figure>
                        <img src=' " <?php echo $product['image'] ?> "' alt='super site de cartes'>
                        <div class='description'>
                            <h1> <?php echo $product['title'] ?><span><?php echo $product['subtitle'] ?></span></h1>
                            <p><?php echo $product['description'] ?></p>
                        </div>

                        <div class='version'>

                            <h1>Versions:</h1>

                            <ul>
                                <?php
                                foreach ($versions as $version) :
                                ?>
                                    <li><a href='<?php echo $version['url_version'] ?>'><?php echo "Version " . $version['name_version'] ?> </a></li>
                                <?php endforeach; ?>
                                <li><a href='#'>En travaux...</a></li>
                            </ul>

                        </div>

                    </figure>


                </article>

            </section>

        <?php endforeach; ?>



        <footer class="page-footer">Merci d'être passé ! </footer>

</body>

</html>