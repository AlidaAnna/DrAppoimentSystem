<?php
include("conn.php");
// Include the header file
include("header.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediMeet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-G7ej1sjk5kmIpUPU7Th8vgyMA+5y6q4nKZhP1TkHg1y5qA5BQFkjLP9yJZO/5blz" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid d-flex justify-content-center align-items-center position-relative" style="height: 100vh; padding: 0; margin: 0;">
    <img src="image/indexnew.jpg" alt="Hospital Image" style="position: absolute; top: 0; left: 0; width: 100%; height: 100vh; object-fit: cover; z-index: 0;">
    
    <div class="text-content text-center position-absolute" style="z-index: 1; color: Black;">
        <p style="font-size: 1.2em; font-weight: 500;">We Provide All Health Care Solutions. Your health is our priority.</p>
        <h1 style="font-size: 2.5em; font-weight: bold;">Protect Your Health And Take Care Of Your Health</h1>
        <a href="signup.php" class="btn btn-primary mt-3" style="padding: 10px 20px; font-size: 1.2em;">Register Now</a>
    </div>
</div>

<section style="background-color: #fff; padding: 60px 0;">
    <div class="container">
        <h1 style="text-align: center; font-size: 2.5em;">We help patients live a healthy, longer life.</h1>
        <p style="text-align: center; max-width: 700px; margin: auto; font-size: 1.1em; line-height: 1.6em;">
            Our doctors are committed to providing the highest quality care. With over 30 years of experience, 
            we are proud to serve patients across more than one location with a 100% patient satisfaction rate.
        </p>
        <div style="display: flex; justify-content: center; text-align: center; margin-top: 30px;">
            <div style="margin: 0 20px;">
                <h3>30+</h3>
                <p>Years of Experience</p>
            </div>
            <div style="margin: 0 20px;">
                <h3>100%</h3>
                <p>Patient Satisfaction</p>
            </div>
        </div>
    </div>
</section>

<section class="testimonials" style="padding: 40px 20px; background-color: #f9f9f9; text-align: center;">
    <h2 style="font-size: 2em; margin-bottom: 20px;">What Do You Think About Us!</h2>
    <div class="testimonial-container" style="display: flex; overflow-x: auto; gap: 20px; padding: 10px; scrollbar-width: thin; scroll-behavior: smooth;">
        <?php
            

            // Check connection
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // SQL query to fetch testimonials from the feedback table
            $sql = "SELECT name, message, created_at FROM feedback ORDER BY created_at DESC";
            $result = mysqli_query($con, $sql);

            // Check if there are any rows returned
            if (mysqli_num_rows($result) > 0) {
                // Loop through each testimonial
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="testimonial-box" style="min-width: 250px; max-width: 300px; padding: 20px; border: 1px solid #ddd; border-radius: 8px; position: relative; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">';
                    echo '<p class="testimonial-name" style="font-weight: bold; font-size: 1.1em;">' . htmlspecialchars($row['name']) . '</p>';
                    
                    // Time at the right end
                   // echo '<p style="position: absolute; top: 20px; right: 20px; color: #888; font-size: 0.9em;">' . timeAgo($row['created_at']) . '</p>';
                    echo '<p style="margin-top: 10px; font-size: 1em;">' . htmlspecialchars($row['message']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No testimonials available at the moment.</p>';
            }

            // Close the database connection
            mysqli_close($con);
        ?>
    </div>
</section>

<h1 style="font-size: 2em; text-align: center; margin-top: 40px;">Contact Us</h1>
<div class="container" style="display: flex; justify-content: center;">
    <div style="text-align: center;">
        <h2 style="font-size: 1.5em;"><b>Our Location</b></h2>
        <p>Medimeet Health home <br> Near centre plaza<br> Kaloor, Ernakulam, India</p>
        <p><strong>Email:</strong> medimeet@gmail.com</p>
        <p><strong>Instagram:</strong> medi_meet</p>
        <p><strong>Contact no:</strong> +91 7608923414<br> 8765431230</p>     
    </div>
</div>

<footer class="text-center py-4" style="background-color: #f1f1f1;">
    <p>&copy; 2024 MediMeet. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>