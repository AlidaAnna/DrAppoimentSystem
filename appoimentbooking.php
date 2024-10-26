<?php
include 'conn.php';
$time_slots = []; 
$booked_slots = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['time'])) {
        $doctor_id = $_POST['doctor']; 
        $date = $_POST['date']; 
        if (!$con) {
            die("Connection failed: " .mysqli_connect_error());
        }
        $query1 = "SELECT starttime, endtime FROM timeslot WHERE uid='$doctor_id' AND bookdate='$date'";
        $result1 = mysqli_query($con, $query1);
        // to store  the time slots in an array which is divided by 15 min
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {
            $start = strtotime($row['starttime']);
            $end = strtotime($row['endtime']);
            while ($start < $end) {
                $time_slots[] = date('g:i A', $start);//g-hour,i-min,A-am/pm
                $start = strtotime("+15 minutes", $start);  
            }
        }
        } else {
            echo "<script>alert('Doctor is not available');</script>";
        }
        // already aa dateil appoiment olla  time kanikum ath booked slot enna arrayil idum
        $query2 = "SELECT appointment_time FROM appointment WHERE uid='$doctor_id' AND appointment_date='$date'";
        $result2 = mysqli_query($con, $query2);
        while ($row = mysqli_fetch_assoc($result2)) {
            $booked_slots[] = date('g:i A', strtotime($row['appointment_time']));
        }
    }
    //appoiment time select cheyumbol ath booked slotil illel appoiment enna arrayil idunu booked succesfully
    if (isset($_POST["appointment_time"])) {
        $uname = $_POST["uname"];
        $doctor_id = $_POST["doctor"];
        $appotime = $_POST["appointment_time"];
        $date = $_POST['date'];
        if (!in_array($appotime, $booked_slots)) {
            $status = 'booked';
            $query5 = "INSERT INTO appointment (uid, tid, pname, appointment_date, appointment_time, status, created_at) 
                       VALUES ('$doctor_id', (SELECT tid FROM timeslot WHERE uid='$doctor_id' LIMIT 1), '$uname', '$date', '$appotime', '$status', NOW())";

            if (mysqli_query($con, $query5)) {
                echo "<script>alert('Appointment successfully booked!');</script>";
            } else {
                echo "<script>alert('Error booking the appointment.');</script>";
            }
        // } else {
        //     echo "<script>alert('This time slot is already booked.');</script>";
        // }
        }
    }
}
?>
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
        .time-slot {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
        .available { background-color: #d4edda; color: #155724; }
        .booked { 
            background-color: #f8d7da; 
            color: #721c24; 
            cursor: not-allowed;
        }
    </style>
    <script>
        //button nekki kazhiyumbol confirm booking olla javascript  
        //If they choose "OK," the chosen time slot is saved in a hidden input box (called 'selectedTimeSlot').
        //This saved time will be sent along with the rest of the form data to make the booking
        function confirmBooking(timeSlot) {
            if (confirm("Are you sure you want to book this slot: " + timeSlot + "?")) {
                document.getElementById('selectedTimeSlot').value = timeSlot;
                document.getElementById('appointmentForm').submit();
            }
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h2 class="text-center">Appointment</h2>
        <form action="" method="POST" id="appointmentForm">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="uname" value="<?php echo isset($_POST['uname']) ? $_POST['uname'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="doctor">Doctor:</label>
                <select id="doctor" name="doctor" class="form-control">
                    <?php
                    $query6= "SELECT l.uid, u.firstname FROM login l INNER JOIN user u ON l.uid=u.uid WHERE l.role='doctor'";
                    $result6 = mysqli_query($con, $query6);
                    if (mysqli_num_rows($result6) > 0) {
                        while ($doc = mysqli_fetch_assoc($result6)) {
                            $selected = (isset($_POST['doctor']) && $_POST['doctor'] == $doc['uid']) ? 'selected' : '';
                            echo "<option value='{$doc['uid']}' $selected>{$doc['firstname']}</option>";
                        }
                    } else {
                        echo "<option value=''>No doctors available</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Select Date:</label>
                <input type="date" class="form-control" name="date" value="<?php echo isset($_POST['date']) ? $_POST['date'] : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="time">Show Time Slots</button>

            <?php if (!empty($time_slots)) { ?>
            <div class="form-group">
                <label for="appointment_time">Available Time Slots:</label>
                <div>
                    <?php 
                    foreach ($time_slots as $slot) {
                        $class = in_array($slot, $booked_slots) ? 'booked' : 'available';
                        $disabled = in_array($slot, $booked_slots) ? 'disabled' : '';
                        if (!$disabled) {
                            echo "<button type='button' onclick='confirmBooking(\"$slot\")' class='time-slot $class'>$slot</button>";
                        } else {
                            echo "<button type='button' class='time-slot $class' disabled>$slot</button>";
                        }
                    }
                    ?>
                </div>
            </div>
            <input type="hidden" name="appointment_time" id="selectedTimeSlot">
            <?php } ?>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
