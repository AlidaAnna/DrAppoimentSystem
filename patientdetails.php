<?php
$con=mysqli_connect("localhost","root","","dr");
$query="select * from user";
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
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">address</th>
      <th scope="col">PhoneNumber</th>
      <th scope="col">Email</th>
      <th scope="col">age</th>
      <th scope="col">gender</th>
      <th scope="col">Username</th>
    </tr>
  </thead>
<tbody>
<?php
$i = 1;
while($row=mysqli_fetch_array($result))
{
  ?>
     <th scope="row"><?= $i++; ?></th>
      <td><?= $row['1']; ?></td>
      <td><?= $row['2']; ?></td>
      <td><?= $row['3']; ?></td>
      <td><?= $row['4']; ?></td>
      <td><?= $row['5']; ?></td>
      <td><?= $row['8']; ?></td>
      <td><?= $row['9']; ?></td>
      <td><?= $row['6']; ?></td>
      <td>
        <form method="POST" action="patientdelete.php" onsubmit="return confirm('Are you sure you want to delete');">
      <input type="hidden" name="id" value="<?=$row['0'];?>">
      <button type="submit" class="btn btn-danger btn-sm px-3">
      <i class="fas fa-times">Delete</i>
      </button>
      </td>
      <tr>
    </tr>
    <?php
  }
  ?>
  </table>
</body>
</html>