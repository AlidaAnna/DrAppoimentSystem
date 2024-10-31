<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $un = $_SESSION['username']; 
    $query = "SELECT uid FROM login WHERE username='$un'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['uid']; 

        $query = "DELETE FROM user WHERE uid='$id'";
        if (mysqli_query($con, $query)) {
            header("Location: Adminpatientdetails.php");
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
    } else {
        echo "Error fetching user ID: " . mysqli_error($con);
    }
}
?>
