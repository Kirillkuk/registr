<?php
if (!empty($_SESSION["login"]))
{
    require ("mysqli_connect.php");
// $host = "localhost";
// $user = "root";
// $pass = "";
// $db = "users";

// $con = mysqli_connect($host,$user,$pass) or die ("no connection");
// mysqli_select_db($con,$db) or die("no db");

    $id = $_GET['id'];

    $s = "DELETE FROM `do_list` WHERE `do_list`.`id` = ".$id;

    mysqli_query($con,$s);
    header('Location: content.php')
}
?>