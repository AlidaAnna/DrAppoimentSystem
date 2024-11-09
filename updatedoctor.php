<?php
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["id"];

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT u.firstname,u.lastname,u.phno,u.email,d.qualification,d.specialization,d.Date_of_joining FROM doctor_details d inner join user u on  u.uid=d.uid";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); 
    } else {
        echo "No doctor found with the given ID.";
    }
}

if (isset($_POST["submit"])) {
    $fn = $_POST["firstname"];
    $ln = $_POST["lastname"];
    $phn = $_POST["phno"];
    $q = $_POST["qua"];
    $s = $_POST["spe"];
    $doj = $_POST["doj"];
    $email = $_POST["email"];

    $query1 = "UPDATE doctor_details SET  qualification='$q', Date_of_joining='$doj', specialization='$s' WHERE uid='$id'";
    $query2 = "UPDATE user SET firstname='$fn',lastname='$ln',phno='$phn', email='$email' WHERE uid='$id'";
    $result1 = mysqli_query($con, $query1);
    $result2 = mysqli_query($con, $query2);
    if ($result1 && $result2) {
      echo "Record updated successfully.";
  } else {
      echo "Error updating record: " . mysqli_error($con);
  }
    header("location:Admindoctordetails.php");

   


    mysqli_close($con);
}
?>
<html>
<head>
    <title>Update Doctor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body><br><br>
<div class="container mt-3">
    <form action="updatedoctor.php" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>"><br><br>
        FirstName:<input type="text" class="form-control mt-3" name="firstname" value="<?php echo isset($row['firstname']) ? $row['firstname'] : ''; ?>"><br><br>
        LastName:<input type="text" class="form-control mt-3" name="lastname" value="<?php echo isset($row['lastname']) ? $row['lastname'] : ''; ?>"><br><br>
        PhoneNumber:<input type="number" class="form-control mt-3" name="phno" value="<?php echo isset($row['phno']) ? $row['phno'] : ''; ?>"><br><br>
        Qualification:<input type="text" class="form-control mt-3" name="qua" value="<?php echo isset($row['qualification']) ? $row['qualification'] : ''; ?>"><br><br>
        Specialization:<input type="text" class="form-control mt-3" name="spe" value="<?php echo isset($row['specialization']) ? $row['specialization'] : ''; ?>"><br><br>
        Date-Of-Joining:<input type="date" name="doj" class="form-control mt-3" value="<?php echo isset($row['Date_of_joining']) ? $row['Date_of_joining'] : ''; ?>"><br><br>
        Email:<input type="email" name="email" class="form-control mt-3" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>"><br><br>
        <input type="submit" class="btn btn-primary" name="submit" value="Update">
    </form>
</div>
</body>
</html>
