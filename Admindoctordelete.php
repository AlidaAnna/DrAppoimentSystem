<?php
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id=$_POST["delid"];
    $query1="delete from user where uid='$id'";
    $query2="delete from doctor_details where uid='$id'";
    $query3="delete from login where uid='$id'";
    $result2=mysqli_query($con,$query2);
    $result3=mysqli_query($con,$query3);
    if($result2 && $result3)
    {
        $result1=mysqli_query($con,$query1);

    }
    if($result1 && $result2  && $result3 )
    {
        header("Location:Admindoctordetails.php");
    }
}
?>
