<?php
include 'conn.php';
$un=$_SESSION["username"];
$query1="select uid from login where username='$un'";
$result1=mysqli_query($con,$query1);
if($result1 && mysqli_num_rows($result1)>0)
{
    $row=mysqli_fetch_assoc($result1);
    $uid=$row['uid'];
}
$query2="select firstname,lastname,email,phno,address,age from user where uid='$uid'";
$result2=mysqli_query($con,$query2);
if($result2 && mysqli_num_rows($result2)>0)
{
$row=mysqli_fetch_assoc($result2);
}
if(isset($_POST["submit"]))
{
    $fn=$_POST["firstname"];
    $ln=$_POST["lastname"];
    $add=$_POST["address"];
    $phn=$_POST["phno"];
    $em=$_POST["email"];
    $age=$_POST["age"];
    echo $fn;
$query3="update user set firstname='$fn',lastname='$ln',address='$add',phno='$phn',email='$em',age='$age' WHERE uid='$uid' ";
$result3 = mysqli_query($con, $query3);
if ($result3) {
    header ("Location: patientindividualdetails.php");    
} else {
    echo "Error updating record: " . mysqli_error($con);
}
}
?>
<html>
<head>
    <title>Update Details </title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body><br><br>
<div class="container mt-3">
<h1 class="text-center">Profile Update</h1> 
    <form action="patientindividualdetails.php" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>"><br><br>
        FirstName:<input type="text" class="form-control mt-3" name="firstname" value="<?php echo isset($row['firstname']) ? $row['firstname'] : ''; ?>"><br><br>
        LastName:<input type="text" class="form-control mt-3" name="lastname" value="<?php echo isset($row['lastname']) ? $row['lastname'] : ''; ?>"><br><br>
        Email:<input type="email" name="email" class="form-control mt-3" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>"><br><br>
        PhoneNumber:<input type="number" class="form-control mt-3" name="phno" value="<?php echo isset($row['phno']) ? $row['phno'] : ''; ?>"><br><br>
        Address<input type="text" class="form-control mt-3" name="address" value="<?php echo isset($row['address']) ? $row['address'] : ''; ?>"><br><br>
        Age:<input type="text" class="form-control mt-3" name="age" value="<?php echo isset($row['age']) ? $row['age'] : ''; ?>"><br><br>
        <input type="submit" class="btn btn-primary" name="submit" value="Update">
    </form>
</div>
</body>
</html>
