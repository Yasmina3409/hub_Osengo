<?php
session_start();
require 'autoload.php';

$db = Db::singleton();

$username = $_POST['username'];
$pwd = $_POST['pwd'];

$table = 'user';
$field = 'username';
$value = $username;

$user = $db -> selectOne($table,$field,$value); // on trouve le username = $POST_['username']

// On fait une condition si le username est vide 
if(!empty($user) ){ 
$field = 'pwd';
$value = $pwd;

$user = $db -> selectOne($table,$field,$value);

    if(!empty($user)){                       // On fait une condition si le mdp est vide 
        $_SESSION['username'] = $username;
        header('location:./index.php');
    }
    else{
        header('location: ./index.php?error_pwd=true'); // sert à faire une redirection 
    }
}
else{
    header('location: ./index.php?error_mail=true');
} 

    // header('Location: ./login.html');
