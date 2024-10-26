<?php
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .container {
            display: flex;
            height: 100vh; /* Full height */
            width: 100vw; /* Full width */
        }

        .header {
            display: flex;
            width: 100%;
            height: 100vh;
        }

        .doctor-image {
        width: 50%; /* Takes up half the screen */
        height: 100vh; /* Full height of the viewport */
        object-fit: cover; /* Ensures the image covers the whole area */
        object-position: top; /* Ensures the top part of the image is visible */
}


        .text-section {
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-end;
            padding-right: 50px; /* Adds space from the right edge */
            text-align: right;
        }

        .main-heading {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        .highlight {
            color: #00C1DE;
        }

        .text-section p {
            font-size: 18px;
            color: #777;
            margin-top: 10px;
        }
        .welcome-message
        {
            font-size:50px;
            color: Black;
            margin-bottom:15px;
            font-weight: bold;
            font-style:Serif;
        }

        .more-info-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #00C1DE;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 4px;
            margin-top: 20px;
        }

        .navbar-brand {
            font-size: 35px;
        }
    </style>
</head>
<body>

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
                        <a class="nav-link active" aria-current="page" href="userdetails.php">View details</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="appoimentbooking.php">Book Appointment</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="contact.php">Contacts</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="header">
            <img src="image/loginpic.jpg" alt="Doctor Image" class="doctor-image">
            <div class="text-section">
            <?php
                     if(isset($_SESSION['username'])) { ?>
                     <div class="welcome-message">Welcome,<?php echo$_SESSION['username'];?>!</div>
                     <?php } ?>
                <h1 class="main-heading">The Best Doctor <br> <span class="highlight">Gives The Least Medicines</span></h1>
                <p>Healing is a matter of time, but it is sometimes also a matter of opportunity.</p>
                <a href="appoimentbooking.php" class="more-info-button">Book Appointment</a>
            </div>
        </div>
    </div>
    
</body>
</html>