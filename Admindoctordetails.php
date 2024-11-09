<?php
include 'conn.php';
$query="select u.uid,u.firstname,u.lastname,u.phno,u.email,d.qualification,d.Date_of_joining,d.specialization from doctor_details d inner join user u ON d.uid=u.uid";
$result=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<h1>Doctor Details</h1><br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">firstname</th>
      <th scope="col">lastname</th>
      <th scope="col">Qualification</th>
      <th scope="col">Date_of_joining</th>
      <th scope="col">Specialization</th>
      <th scope="col">Phonenumber</th>
      <th scope="col">Gmail</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
  $i = 1;
  while($row=mysqli_fetch_array($result))
  {
    ?>
    <!-- <th scope="row"><?= $i++; ?></th> -->
      <td><?= $row['uid']; ?></td>
      <td><?= $row['firstname']; ?></td>
      <td><?= $row['lastname']; ?></td>
      <td><?= $row['qualification']; ?></td>
      <td><?= $row['specialization']; ?></td>
      <td><?= $row['Date_of_joining']; ?></td>
      <td><?= $row['phno']; ?></td>
      <td><?= $row['email']; ?></td>
      <td>
        <form method="POST" action="updatedoctor.php">
          <input type="hidden" name="upid" value="<?= $row['uid'];?>">
          <button type="submit" class="btn btn-warning btn-sm px-3">
            <i class="fas fa-edit"> Update</i>
          </button>
        </form>
      </td>
      <td>
        <form method="POST" action="Admindoctordelete.php" onsubmit="return confirm('Are you sure you want to delete');">
      <input type="hidden" name="delid" value="<?=$row['uid'];?>">
      <button type="submit" class="btn btn-danger btn-sm px-3">
      <i class="fas fa-times">Delete</i>
      </button>
      </form>
      </td>
      <tr>
    </tr>
    <?php
  }
  ?>
  </tbody>
</table>
</body>
</html>
