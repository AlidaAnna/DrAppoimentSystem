<?php
include 'conn.php';
$query="SELECT 
appointment.uid, 
appointment.pname, 
appointment.appointment_date, 
appointment.appointment_time, 
appointment.status, 
login.username AS doctor_name 
FROM 
appointment 
LEFT JOIN 
login 
ON 
appointment.uid = login.uid AND login.role = 'doctor'";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="Admin.php">Home</a>
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
<h1>Appointment Details</h1><br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">DoctorName</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Appointment Time</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
<tbody>
<?php
while($row = mysqli_fetch_assoc($result)) {
?>
    <tr>
      <td><?= htmlspecialchars($row['doctor_name']); ?></td>
      <td><?= htmlspecialchars($row['pname']); ?></td>
      <td><?= htmlspecialchars($row['appointment_date']); ?></td>
      <td><?= htmlspecialchars($row['appointment_time']); ?></td>
      <td><?= htmlspecialchars($row['status']); ?></td>
      <td>
      </td>
    </tr>
<?php
}
?>
</tbody>
</table>
</body>
</html>
