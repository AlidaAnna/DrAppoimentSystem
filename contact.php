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
            margin-bottom: 20px; /* Space below the title */
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
        #previewSection {
            display: none;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f9f9f9;
            margin-top: 20px;
            border-radius: 5px;
        }
        .map-container {
            width: 100%; /* Make sure it uses full width */
            height: 300px; /* Set a fixed height for the map */
            margin-top: 10px; /* Space above the map */
        }
    </style>
</head>
<body>
    <h1>Contact US</h1>

    <div class="container">
        <div class="contact-info">
            <h2>Our Location</h2>
            <p>Medimeet Health home <br> Near centre plaza<br> Kaloor, Ernakulam, India</p>
            <p><strong>Email:</strong> medimeet@gmail.com</p>
            <p><strong>Instagram:</strong> medi_meet</p>
            <p><strong>Contact no:</strong> +91 7608923414<br> 8765431230</p>
            <!-- Google Map Embed -->
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d315113.2262540254!2d76.267210…