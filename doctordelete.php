<?php
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id=$_POST["id"];
    $query="delete from doctor_details where uid='$id'";
    if(mysqli_query($con,$query))
    {
        header("Location:doctordetails.php");
        exit();
    }
    else{
        echo "Error deleting record: " . mysqli_error($con);
    }
}
?>
