<?php
include 'conn.php';
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOSPITAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <style>
        .card {
            background-color: #fff;
            border-radius:10px;
            border: none;
            position: relative;
            margin-bottom: 30px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
        }
        .l-bg-cherry {
            background: linear-gradient(to right, #493240, #f09) !important;
            color: #fff;
        }
        .l-bg-blue-dark {
            background: linear-gradient(to right, #373b44, #4286f4) !important;
            color: #fff;
        }
        .card .card-icon {
            font-size: 110px;
        }
    </style>
</head>
<body style="overflow:hidden;">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MediMeet</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Adminpatientdetails.php">Patient</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminsettime.php">Timeslot</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="appointments.php">Appointments</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Doctor
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="Adminadddoctor.php">Add</a></li>
                        <li><a class="dropdown-item" href="Admindoctordetails.php">Update</a></li>
                        <li><a class="dropdown-item" href="Admindoctordetails.php">Delete</a></li>
                    </ul>
                </li> 
            </ul>
        </div>
        <a href="logout.php" class="btn btn-light">Logout</a>
    </div>
</nav>
<br>
<h1>Overview</h1>
<br>
<div class="container">
    <div class="row">
        <?php
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Query to count patients
        $query = "SELECT COUNT(*) AS uc FROM login where role='Patient'";
        $result = mysqli_query($con, $query);
        $uc = ($result) ? mysqli_fetch_assoc($result)['uc'] : 0;

        // Query to count doctors
        $query = "SELECT COUNT(*) as dc FROM doctor_details";
        $result = mysqli_query($con, $query);
        $dc = ($result) ? mysqli_fetch_assoc($result)['dc'] : 0;

        // Close the connection
        mysqli_close($con);

        // Calculate progress width for patients and doctors
        $max_users = 10; // Define max limit for patients
        $max_doctors = 3; // Define max limit for doctors
        $progress_width_users = min(($uc / $max_users) * 100, 100);
        $progress_width_doctors = min(($dc / $max_doctors) * 100, 100);
        ?>

        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon"><i class="fas fa-users"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Patient</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0"><?php echo $uc; ?></h2>
                        </div>
                        <div class="col-4 text-right">
                            <span><?php echo number_format($progress_width_users, 2); ?>% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1" data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" aria-valuenow="<?php echo $progress_width_users; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress_width_users; ?>%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon"><i class="fas fa-user-md"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Doctor</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0"><?php echo $dc; ?></h2>
                        </div>
                        <div class="col-4 text-right">
                            <span><?php echo number_format($progress_width_doctors, 2); ?>% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1" data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-green" role="progressbar" aria-valuenow="<?php echo $progress_width_doctors; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress_width_doctors; ?>%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
