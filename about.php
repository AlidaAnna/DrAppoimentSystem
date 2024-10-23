<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment System - About Us</title>
    <title>HOSPITAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styleindex.css">
  </head>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .about-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .about-content {
            max-width: 50%;
        }
        .about-content h1 {
            font-size: 3rem;
            color: #333;
            margin-bottom: 20px;
        }
        .about-content p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .about-content .btn {
            background-color: #007bff;
            color: #fff;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .about-content .btn:hover {
            background-color: #0056b3;
        }
        .about-stats {
            display: flex;
            gap: 30px;
            margin-top: 30px;
        }
        .stat-item {
            text-align: center;
        }
        .stat-item h3 {
            font-size: 2.5rem;
            color: #333;
        }
        .stat-item p {
            color: #666;
            font-size: 1.1rem;
        }
        .about-images {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .about-images img {
            width: 150px;
            height: 150px;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);


            .about-images {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        .about-images img {
            width: 150px; /* Set width */
            height: auto; /* Maintain aspect ratio */
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
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
              <a class="nav-link active" aria-current="page" href="abouthome.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <!--<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Services
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>-->
            <li class="nav-item">
              <a class="nav-link" href="signup.php">SignUp</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contacthome.php">Contacts</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<body>
    <div class="container">
        <section class="about-section">
            <div class="about-content">
                <h1>We help patients live a healthy, longer life.</h1>
                <p>
                    Our doctors are committed to providing the highest quality care. With over 30 years of experience, 
                    we are proud to serve patients across more than 15 locations with a 100% patient satisfaction rate.
                </p>
                <!-- <a href="appointment.php" class="btn">Request an Appointment</a> -->
                <div class="about-stats">
                    <div class="stat-item">
                        <h3>30+</h3>
                        <p>Years of Experience</p>
                    </div>
                    <div class="stat-item">
                        <h3>100%</h3>
                        <p>Patient Satisfaction</p>
                    </div>
                </div>
            </div>
            <div class="about-image" style="display: flex; gap: 20px;">
    <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
        <img src="image/indexpic.jpg" alt="Doctor 1" style="width: 250px; height: 400px; margin: 10px 0;">
    </div>
    <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
        <img src="image/aboutpic2.jpg" alt="Doctor 2" style="width: 250px; height: 200px; margin: 10px 0;">
        <img src="image/aboutpic3.jpg" alt="Doctor 3" style="width: 250px; height: 200px; margin: 10px 0;">
    </div>
</div>



        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>




<?php
// Connect to the database
$conn = new mysqli('localhost', 'username', 'password', 'doctor_appointment_db');

// Fetch stats from the database
$result = $conn->query("SELECT years_experience, clinic_locations, patient_satisfaction FROM stats_table WHERE id = 1");
$stats = $result->fetch_assoc();
?>

<div class="stat-item">
    <h3><?php echo $stats['years_experience']; ?>+</h3>
    <p>Years of Experience</p>
</div>
<div class="stat-item">
    <h3><?php echo $stats['clinic_locations']; ?>+</h3>
    <p>Clinic Locations</p>
</div>
<div class="stat-item">
    <h3><?php echo $stats['patient_satisfaction']; ?>%</h3>
    <p>Patient Satisfaction</p>
</div>