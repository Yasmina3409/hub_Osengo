<?php
session_start();
require 'autoload.php';

$test = "vous n'êtes pas connecté ";
$conns = false;

if (!empty($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $conns = true;
}


/******************** */


$db = Db::singleton();
// $titre = $_POST['titre'];
// // $sql = "SELECT * FROM project ";
// $projet = $db->create('projets',  array('titre', 'type', 'imageUrl', 'description'), array($_POST["titre"], $_POST["type"], $_POST["imageUrl"], $_POST["description"]));
// $sql = "SELECT projet_id FROM projets WHERE titre = '$titre'";

// $test = $db->select_sql2($sql);




$version = $db->create('versions',   array('projet_id', 'versionUrl', 'version_name'), array($_POST["new_version"], $_POST["versionUrl"], $_POST["version_name"]));
header('location:./index.php');
