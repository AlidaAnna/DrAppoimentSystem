<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Appointment Time</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e9ecef; 
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff; 
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #343a40; 
        }
        .btn-primary {
            background-color: #007bff; 
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3; 
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="text-center">Set Appointment Time Range</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" required>
            </div>
            <div class="form-group">
                <label for="stime">Start Time:</label>
                <input type="time" class="form-control" name="stime" required>
            </div>
            <div class="form-group">
                <label for="etime">End Time:</label>
                <input type="time" class="form-control" name="etime" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
if(isset($_POST["submit"]))
{
    $date = $_POST["date"];
    $stime = $_POST["stime"];
    $etime = $_POST["etime"];
    $conn=mysqli_connect("localhost","root","","dr");
    $query="insert into timeslot  (date,starttime,endtime) values ('$date','$stime','$etime')";
    if(mysqli_query($conn,$query))
    {
      
            echo "Time range saved successfully!";
    } 
    else
    {
            echo "Error: " . mysqli_error($conn);
    }


}
?>
</body>
</html>