<?php
include 'conn.php';
if(isset($_POST["submit"]))
{
  $fn=$_POST["Firstname"];
  $ln=$_POST["Lastname"];
  $address=$_POST["Address"];
  if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
  }
  $age=$_POST["age"];
  $phno=$_POST["phonenumber"];
  $email=$_POST["emailid"];
  $uname=$_POST["username"];
  $password=$_POST["password"];
  $role="Patient";
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$query1="select * from login where password='$password'";
$result=mysqli_query($con,$query1);
$num=mysqli_num_rows($result);
if($num>0)
{
  echo "Password alredy exist";
}
else{
$query="insert into user(firstname,lastname,address,phno,email,age,gender) values('$fn','$ln','$address','$phno','$email','$age','$gender')";
$query2="insert into login(username,password,role) values('$uname','$password','$role')";
if(mysqli_query($con,$query) && mysqli_query($con,$query2))
{
header ("Location: login.php?status=success");
  exit();
}
else{
  echo "Error: " . $query . "<br>" . mysqli_error($con);
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}
.card-registration .select-arrow {
top: 13px;
}
    </style>
</head>
<body>
<section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="image\signup.png"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Registration form</h3>
                <form method="POST" action="">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                      <input type="text" name="Firstname" id="form3Example1m" class="form-control form-control-lg"   required />
                      <label class="form-label" for="form3Example1m">First name</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                      <input type="text" name="Lastname" id="form3Example1n" class="form-control form-control-lg"    required/>
                      <label class="form-label" for="form3Example1n">Last name</label>
                    </div>
                  </div>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="text"name="Address" id="form3Example8" class="form-control form-control-lg"   required />
                  <label class="form-label" for="form3Example8">Address</label>
                </div>

                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                  <h6 class="mb-0 me-4">Gender: </h6>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" name="gender" type="radio"  id="femaleGender"
                      value="Female" />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" name="gender" type="radio"id="maleGender"
                      value="Male" />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline mb-0">
                    <input class="form-check-input"  name="gender" type="radio" id="otherGender"
                      value="other" />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>

                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="number"  name="age" id="form3Example9" class="form-control form-control-lg"    required/>
                  <label class="form-label" for="form3Example9">Age</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="number" name="phonenumber" id="form3Example97" class="form-control form-control-lg"   required />
                  <label class="form-label" for="form3Example97">PhoneNumber</label>
                </div>


                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="email"  name="emailid" id="form3Example97" class="form-control form-control-lg"   required />
                  <label class="form-label" for="form3Example97">Email ID</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" name="username" id="form3Example99" class="form-control form-control-lg" 
           pattern="[A-Za-z0-9]{5,15}" 
           title="Username must be between 5 and 15 characters and contain only letters and numbers." 
           required minlength="5" maxlength="15" />
    <label class="form-label" for="form3Example99">Username</label>
</div>

                <div data-mdb-input-init class="form-outline mb-4">
    <input type="password" name="password" id="form3Example99" class="form-control form-control-lg" 
           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" 
           title="Password must be at least 8 characters, include one uppercase letter, one lowercase letter, one number, and one special character."
           required />
    <label class="form-label" for="form3Example99">Password</label>
</div>

                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

<!-- <h6 class="mb-0 me-4">Role: </h6>

<div class="form-check form-check-inline mb-0 me-4">
  <input class="form-check-input" name="role" type="radio"  id="Patientrole"
    value="Patient" />
  <label class="form-check-label" for="Patientrole">Patient</label>
</div>

<div class="form-check form-check-inline mb-0 me-4">
  <input class="form-check-input" name="role" type="radio" id="doctorrole"
    value="doctor" />
  <label class="form-check-label" for="doctorrole">Doctor</label>
</div>
</div> -->

                <div class="d-flex justify-content-end pt-3">
                  <button  type="submit" name="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg ms-2" style="background-color: black; color: white;">Submit</button>
                </div>
                <br>
                <footer>Are you already member here?<a href="login.php"> Login</a></footer>
</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>