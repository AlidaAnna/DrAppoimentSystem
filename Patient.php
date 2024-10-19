<?php
include 'conn.php';
if(isset($_SESSION['username']))
{
    $username=$_SESSION['username'];
    echo " welcome". $username;
}
