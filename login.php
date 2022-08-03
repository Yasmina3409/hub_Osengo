<?php
session_start();
require 'autoload.php';



$db = Db::singleton();



$username = $_POST["username"];


$admin = $db->select_one('user', 'username', $_POST["username"]); // on trouve le username = $POST_['username']
// echo $admin;
// On fait une condition si le username est vide 
if (!empty($admin)) {
    $field = 'pwd';


    $admin = $db->select_one('user', $field, $_POST["pwd"]);
    if (!empty($admin)) {                       // On fait une condition si le mdp est vide 
        $_SESSION['username'] = $username;
        $_SESSION["pwd"] = $_POST["pwd"];
        header('location:./create.php');
    } else {

        header('location: ./index.php'); // sert à faire une redirection 
    }
}


// // Connexion directe après inscription
