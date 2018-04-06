<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/13/2018
 * Time: 5:35 PM
 */
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();
require ("../db/db.php");


if (isset($_POST['login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $results = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

        if ($results->fetchColumn() > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            $user_guid = $results->fetchColumn(5);
            setcookie("user_info",$user_guid,time()+31556926,'/');
            header('location: /');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}


?>