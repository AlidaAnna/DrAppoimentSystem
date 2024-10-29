<?php include("header.php");?>
<!DOCTYPE html>               
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment System - Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
            text-align: center; /* Center the main title */
            margin-bottom: 10px; /* Space below the title */
        }
        .container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }
        .contact-info, .form-section {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 48%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .contact-info {
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Align contents to the top */
            align-items: center; /* Center contents horizontally */
        }
        .contact-info h2 {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center; /* Center the Contact Us title */
        }
        .contact-info p {
            font-size: 16px;
            line-height: 1.5;
            text-align: center; /* Center text within paragraphs */
            margin-bottom: 5px; /* Adjusted margin for uniformity */
        }
        .form-section {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center contents horizontally */
            justify-content: flex-start; /* Align contents to the top */
        }
        form {
            width: 100%;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        
        .map-container {
            width: 100%; /* Make sure it uses full width */
            height: 300px; /* Set a fixed height for the map */
            margin-top: 10px; /* Space above the map */
        }
    </style>
</head>
<body>
<h1 style="font-size: 35px;">Contact Us</h1>


    <div class="container">
        <div class="contact-info">
            <h2><b>Our Location</b></h2>
            <p>Medimeet Health home <br> Near centre plaza<br> Kaloor, Ernakulam, India</p>
            <p><strong>Email:</strong> medimeet@gmail.com</p>
            <p><strong>Instagram:</strong> medi_meet</p>
            <p><strong>Contact no:</strong> +91 7608923414<br> 8765431230</p>
           <!-- Google Map Embed -->
           <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d315113.2262540254!2d76.26721071186856!3d10.003142863906124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080d4429a0c167%3A0xf89e7162a8f7d66c!2sMedimeet%20Health%20home!5e0!3m2!1sen!2sin!4v1632194441445!5m2!1sen!2sin" 
                    width="100%" 
                    height="300" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>

        <div class="form-section">
        <h1 style="font-size: 35px;">Feedback</h1>

            <form action="feedbackinsert.php" method="post">
                <label for="name">Your name<span>*</span>:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your email address<span>*</span>:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message<span>*</span>:</label>
                <textarea id="message" name="message" rows="6" required></textarea>

                <button type="submit">Send message</button>
            </form>
        </div>
        
    </div>
    <?php if (isset($_GET['error'])): ?>
        <div style="color: red; text-align: center; margin-top: 20px;">
            <?php
            if ($_GET['error'] == 'emptyfields') {
                echo "All fields are required.";
            } elseif ($_GET['error'] == 'invalidemail') {
                echo "Please enter a valid email address.";
            } elseif ($_GET['error'] == 'servererror') {
                echo "There was an issue with the server. Please try again later.";
            }
            ?>
        </div>
    <?php elseif (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
        <div style="color: green; text-align: center; margin-top: 20px;">
            Your feedback has been successfully submitted. Thank you!
        </div>
    <?php endif; ?>

    <footer class="text-center py-4 bg-light">
    <p>&copy; 2024 MediMeet. All Rights Reserved.</p>
  </footer>
</body>
</html>