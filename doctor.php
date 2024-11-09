<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <style>
        /* Body and background */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #2d3436;
            color: #fff;
            padding: 0;
            margin: 0;
        }

        /* Sidebar Styling */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #34495e;
            padding-top: 50px;
        }

        .sidebar .nav-link {
            color: #bdc3c7;
            font-size: 18px;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
        }

        .sidebar .nav-link:hover {
            color: #fff;
            background-color: #2c3e50;
        }

        .sidebar .nav-item {
            margin: 15px 0;
        }

        .sidebar .nav-item.active .nav-link {
            color: #f39c12;
            background-color: #2c3e50;
        }

        .sidebar .navbar-brand {
            color: #f39c12;
            font-size: 24px;
            text-align: center;
            font-weight: bold;
            padding: 20px;
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 250px;
            padding: 40px;
        }

        .header {
            font-size: 36px;
            font-weight: bold;
            color: #f39c12;
            margin-bottom: 40px;
            text-align: center;
        }

        .card-deck {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            background-color: #34495e;
            color: #fff;
            border-radius: 12px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            flex: 1 1 250px;
            margin-bottom: 20px;
        }

        .card:hover {
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }

        .card-header {
            background-color: #2c3e50;
            padding: 15px;
            font-size: 20px;
            font-weight: 600;
            border-radius: 12px 12px 0 0;
        }

        .card-body {
            padding: 30px;
            text-align: center;
        }

        .card-body i {
            font-size: 50px;
            color: #f39c12;
            margin-bottom: 20px;
        }

        .card-body h3 {
            font-size: 36px;
            font-weight: 700;
            color: #fff;
        }

        .card-body p {
            font-size: 18px;
            color: #bdc3c7;
        }

        .btn-view-profile {
            background-color: #f39c12;
            color: #fff;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-view-profile:hover {
            background-color: #e67e22;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        footer {
            background-color: #34495e;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
            color: #bdc3c7;
        }

    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="navbar-brand">MediMeet</div>
        <ul class="nav flex-column">
            <li class="nav-item active">
                <a class="nav-link" href="doctor_profile.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="appointments.php">Appointments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="patients.php">Patients</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">Doctor Dashboard</div>

        <div class="card-deck">

            <!-- Profile Card -->
            <div class="card">
                <div class="card-header">Dr. John Doe</div>
                <div class="card-body">
                    <i class="fas fa-user-md"></i>
                    <h3>Cardiology Specialist</h3>
                    <p>Experience: 12 years</p>
                    <a href="doctor_profile.php" class="btn-view-profile">View Full Profile</a>
                </div>
            </div>

            <!-- Appointments Card -->
            <div class="card">
                <div class="card-header">Appointments</div>
                <div class="card-body">
                    <i class="fas fa-calendar-check"></i>
                    <h3>25</h3>
                    <p>Total Appointments</p>
                </div>
            </div>

            <!-- Patients Card -->
            <div class="card">
                <div class="card-header">Patients</div>
                <div class="card-body">
                    <i class="fas fa-users"></i>
                    <h3>50</h3>
                    <p>Total Patients</p>
                </div>
            </div>

        </div>

        <footer>
            &copy; 2024 MediMeet. All Rights Reserved.
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jl" crossorigin="anonymous"></script>
</body>
</html>
