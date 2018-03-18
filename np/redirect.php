<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/13/2018
 * Time: 6:38 PM
 */
if (isset($_GET['go'])) {
    header("location: " .$_GET['go'] );
}else {
    header('location: ../');
}