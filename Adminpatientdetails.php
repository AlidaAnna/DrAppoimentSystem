<?php
include 'conn.php';
$query="select u.firstname,u.lastname,u.address,u.phno,u.email,u.gender,l.username,u.uid from user u join login l on u.uid=l.uid where l.role='Patient'";
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
<h1>Patient Details</h1><br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">address</th>
      <th scope="col">PhoneNumber</th>
      <th scope="col">Email</th>
      <th scope="col">gender</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
<tbody>
<?php
$i = 1;
while($row=mysqli_fetch_array($result))
{
  ?>
     <!-- <th scope="row"><?= $i++; ?></th> -->
      <td><?= $row['0']; ?></td>
      <td><?= $row['1']; ?></td>
      <td><?= $row['2']; ?></td>
      <td><?= $row['3']; ?></td>
      <td><?= $row['4']; ?></td>
      <td><?= $row['5']; ?></td>
      <td>
        <form method="POST" action="Adminpatientdelete.php" onsubmit="return confirm('Are you sure you want to delete');">
      <input type="hidden" name="id" value="<?=$row['7'];?>">
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