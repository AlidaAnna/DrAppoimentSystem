<?php
// Include the database connection
$conn = mysqli_connect("localhost", "root", "", "dr");

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data and escape it to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Prepare the SQL query to insert data
    $sql = "INSERT INTO feedback (name, email, message) 
            VALUES ('$name', '$email', '$message')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // If successful, show a JavaScript alert box
        echo "<script>
                alert('Feedback submitted successfully!');
                window.location.href = 'contacthome.php'; // Redirect to the form page (or any page)
              </script>";
    } else {
        // If there's an error, show an alert with the error message
        echo "<script>
                alert('Error: " . mysqli_error($conn) . "');
                window.history.back(); // Go back to the previous page
              </script>";
    }

    // Close the connection
    mysqli_close($conn);
}
?>