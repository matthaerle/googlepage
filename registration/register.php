<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/13/2018
 * Time: 4:46 PM
 */

session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();
require ('../db/db.php');
require ('../script/GUID_Maker.php');

if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    try {
        $result = $conn->query("SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1");
        $row = $result->fetch();
        if ($row) { // if user exists
            if ($row['username'] === $username) {
                array_push($errors, "Username already exists");
            }

            if ($row['email'] === $email) {
                array_push($errors, "email already exists");
            }
        }
    } catch (PDOException $e) {

    }



    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        $user_guid = getGUID();
        try {
            $result = $conn->exec("INSERT INTO users (username, email, password, user_guid) 
  			  VALUES('$username', '$email', '$password', '$user_guid')");
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: ../');
            setcookie("user_info",$user_guid,time()+31556926,'/');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }
}
?>