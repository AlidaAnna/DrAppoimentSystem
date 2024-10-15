<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Fixed charset attribute -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login Page</title>
</head>
<body class="login">
    <div class="container">
        <div class="image">
            <img src="image/loginpic.jpg" width="400px" alt="Login Image">
        </div>
        <div class="content">
            <h3 class="log">Login to Your Account</h3>
            <form method="POST" action="">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Login</button>
            </form>
        </div>
    </div>
<?php
// echo "Current Directory: " . __DIR__;
// if (file_exists('conn.php')) {
//     include 'conn.php';
// } else {
//     echo "File not found!";
// }
  if (isset($_POST["submit"])) {
      //echo "hai";
      $un = $_POST["username"];
      $pass = $_POST["password"];

      $con = mysqli_connect("localhost", "root", "", "dr");
      if (!$con) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $query = "SELECT * FROM login WHERE username='$un' AND password='$pass'";
      $result = mysqli_query($con, $query);
      $num = mysqli_num_rows($result);

      if ($num > 0) {
        $query1="select * from login where username='$un' AND password='$pass'";
        $result=mysqli_query($con,$query1);
        $row=mysqli_fetch_assoc($result);
        $role=$row["role"];
        if($role == 'Patient')
        {
            header("location:Patient.php");
        }
        else if($role == 'doctor')
        {
            header("location:doctor.php");
        }
        else
        {
            header("location:admin.php");
        }
      } else {
          echo '<script>alert("Wrong username or password!")</script>';
      }

      mysqli_close($con);
  }
  ?>
</body>
</html>