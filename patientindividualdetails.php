 <?php
include 'conn.php';
$un = $_SESSION["username"];
if (!isset($un)) {
    echo "No user session found.";
    exit;
}
$query = "SELECT uid FROM login WHERE username = '$un'";
$result = mysqli_query($con, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $uid = $row['uid'];
    $query1 = "SELECT firstname, lastname, address, phno, email, age, gender  
    FROM user where uid = '$uid'";
    $result1 = mysqli_query($con, $query1);
    if ($result1 && mysqli_num_rows($result1) > 0) {
     $user_data = mysqli_fetch_assoc($result1);
    }
    $query2 = "SELECT appointment_date, appointment_time, status, created_at 
    FROM  appointment WHERE pname = '$un'";
    $result2= mysqli_query($con, $query2);
   
} else {
    echo "User ID not found for the session username.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>

<style>
    body{
    background: #e9ecef;
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}

.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="Patient.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      
      
      <li class="nav-item">
        <a class="nav-link" href="Logout.php">Logout</a>
      </li>
      
    </ul>
  </div>
</nav>
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                       <?php echo ($user_data['firstname'] . ' ' . $user_data['lastname']); ?>
                                    </h5>
                                    <h6>
                                        Patient
                                    </h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Appointments</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                    <a href="patientindividualupdate.php" class="profile-edit-btn">Edit Profile</a>
                    </div>
                </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION["username"];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo ($user_data['firstname'] . ' ' . $user_data['lastname']); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo ($user_data['email']);?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo ($user_data['phno']);?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo ($user_data['address']);?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Age</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo ($user_data['age']);?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo ($user_data['gender']);?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <h1>Appointments Details</h1><br>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Appointment Date</th>
          <th scope="col">Appointment Time</th>
          <th scope="col">Status</th>
          <th scope="col">Booked Date</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $i = 1;
      while ($row = mysqli_fetch_array($result2)) {
          ?>
          <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $row['appointment_date']; ?></td>
              <td><?= $row['appointment_time']; ?></td>
              <td><?= $row['status']; ?></td>
              <td><?= $row['created_at']; ?></td>
          </tr>
          <?php
      }
      ?>
      </tbody>
    </table>
</div>

</body>
</html>
