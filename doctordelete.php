<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id=$_POST["id"];
    $conn=mysqli_connect("localhost","root","","dr");
    $query="delete from doctor where did='$id'";
    if(mysqli_query($conn,$query))
    {
        header("Location:doctordetails.php");
        exit();
    }
    else{
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
