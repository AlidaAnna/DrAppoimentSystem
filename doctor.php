<?php
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Portal</title>
    <style>
        /* Body and background image styling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('image/background2.jpg'); /* Added the new image here */
            background-size: cover;
            background-position: center;
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Navbar styling */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black */
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 15px;
        }

        nav a:hover {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 5px;
        }

        /* Welcome message and content section */
        .welcome-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 80vh;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5); /* Slight dark overlay for readability */
            padding: 20px;
        }

        .welcome-section h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .welcome-section p {
            font-size: 1.5rem;
            margin-top: 0;
        }

        .welcome-section .btn {
            margin-top: 20px;
            padding: 15px 30px;
            background-color: #4CAF50; /* Green button */
            color: white;
            font-size: 18px;
            text-decoration: none;
            border-radius: 5px;
        }

        .welcome-section .btn:hover {
            background-color: #45a049;
        }

        /* Footer styling */
        footer {
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black */
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 14px;
        }

        footer a {
            color: #4CAF50; /* Green color for links */
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        
        <div class="menu">
            <a href="doctor.php">Home</a>
            <a href="doctordetailsupdate.php">Update details</a>
            <a href="indiappo.php" class="btn">View Appointment Details</a>
            <a href="logout.php">Logout</a>

        </div>
    </nav>

    <!-- Welcome Section -->
    <div class="welcome-section">
        <?php
        // Check if the username session variable is set
        if (isset($_SESSION['username'])) {
            // If session is set, display the welcome message
            echo "<div class='welcome-message'>Welcome, " . htmlspecialchars($_SESSION['username']) . "!</div>";
        } else {
            // If not logged in, prompt to login
            echo "<div class='welcome-message'>Welcome, Doctor!</div>";
        }
        ?>
        
        
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 . All Rights Reserved.</p>
        <p>For inquiries, <a href="contact.php">contact us</a>.</p>
    </footer>

</body>
</html>
