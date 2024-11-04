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
                <th scope="col">OpId</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">Appointment Time</th>
                <th scope="col">Status</th>
                <th scope="col">Booked At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['OpId']); ?></td>
                <td><?= htmlspecialchars($row['PatientName']); ?></td>
                <td><?= htmlspecialchars($row['Appointment_date']); ?></td>
                <td><?= htmlspecialchars($row['Appointment_time']); ?></td>
                <td><?= htmlspecialchars($row['status']); ?></td>
                <td><?= htmlspecialchars($row['Booked_at']); ?></td>
                <td>
                    <form method="POST" action="Adminpatientdelete.php" onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($row['OpId']); ?>">
                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
