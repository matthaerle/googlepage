<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/13/2018
 * Time: 6:16 PM
 */
session_start();
session_destroy();
unset($_SESSION['username']);
header('location: ../');
?>