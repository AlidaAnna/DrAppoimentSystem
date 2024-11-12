<?php
//$server="localhost";
//$user= "nirmalamca_user18";
//$pass="vg-@m277&MXs";
//$db="nirmalamca_user18";
//$con = mysqli_connect($server, $user, $pass, $db) or die("connection error" . mysqli_connect_error);

// $host="localhost:5222";
// $user="root";
// $pass="";
// $db="dr";
// $con = mysqli_connect($host, $user, $pass, $db) or die("connection error" . mysqli_connect_error);
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}
 $con=mysqli_connect("localhost","root","","dr");
// $con=mysqli_connect("localhost","root","root","dr");

?>