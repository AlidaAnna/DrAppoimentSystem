<?php
include 'conn.php';
$query = "SELECT * FROM appointment"; 
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
<h1>Appointment Details</h1><br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">UID</th>
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
      <td><?= htmlspecialchars($row['uid']); ?></td>
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
