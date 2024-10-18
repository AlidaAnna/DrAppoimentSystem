<?php
session_start();
if(isset($_SESSION['username']))
{
    $username=$_SESSION['username'];
    echo " welcome". $username;
}
