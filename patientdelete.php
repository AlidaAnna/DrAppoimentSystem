<?php
if($_SERVER['REQUEST_METHOD']=== 'POST')
{
    $id=$_POST["id"];
    $conn=mysqli_connect("localhost","root","","dr");
    $query="delete from user where uid='$id'";
    if(mysqli_query($conn,$query))
    {
        header("Location:patientdetails.php");
        exit();
    }
    else{
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>