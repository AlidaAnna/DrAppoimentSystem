<?php
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $id=$_POST['id'];
    $query1= "DELETE FROM user WHERE uid='$id'";
    $query2="DELETE FROM login WHERE uid='$id'";
    if (mysqli_query($con, $query1)  && mysqli_query($con, $query2) ) {
        header("Location: Adminpatientdetails.php");
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}
?>
