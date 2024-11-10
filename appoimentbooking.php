<?php
include 'conn.php';

$time_slots = [];
$booked_slots = [];
$available_dates = [];
$appointment_details = null; // To store appointment details for the receipt

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle fetching available time slots and dates
    if (isset($_POST['doctor']) && isset($_POST['date'])) {
        $doctor_id = $_POST['doctor']; 
        $date = $_POST['date']; 

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch available time slots for the selected doctor and date
        $query1 = "SELECT starttime, endtime FROM timeslot WHERE uid='$doctor_id' AND bookdate='$date'";
        $result1 = mysqli_query($con, $query1);

        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_assoc($result1)) {
                $start = strtotime($row['starttime']);
                $end = strtotime($row['endtime']);
                while ($start < $end) {
                    $time_slots[] = date('H:i:s', $start);
                    $start = strtotime("+15 minutes", $start);
                }
            }
        } else {
            echo "<script>alert('Doctor is not available on this date');</script>";
        }

        // Fetch already booked slots for the selected date
        $query2 = "SELECT appointment_time FROM appointment WHERE uid='$doctor_id' AND appointment_date='$date'";
        $result2 = mysqli_query($con, $query2);
        while ($row = mysqli_fetch_assoc($result2)) {
            $booked_slots[] = date('H:i:s', strtotime($row['appointment_time']));
        }
    }

    // Handle appointment booking
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
                // Fetch appointment details for the receipt
                $query_receipt = "SELECT u.firstname AS doctor_name, a.appointment_date, a.appointment_time, a.pname 
                                  FROM appointment a 
                                  INNER JOIN user u ON a.uid = u.uid 
                                  WHERE a.uid='$doctor_id' AND a.appointment_date='$date' AND a.appointment_time='$appotime' 
                                  ORDER BY a.created_at DESC LIMIT 1";
                $result_receipt = mysqli_query($con, $query_receipt);
                if ($row = mysqli_fetch_assoc($result_receipt)) {
                    $appointment_details = $row;
                }
            } else {
                echo "<script>alert('Error booking the appointment.');</script>";
            }
        } else {
            echo "<script>alert('This time slot is already booked.');</script>";
        }
    }

    // Fetch all available dates for the selected doctor (from today onwards)
    if (isset($_POST['doctor'])) {
        $doctor_id = $_POST['doctor'];

        // Modify the query to only fetch dates greater than or equal to today
        $query = "SELECT DISTINCT bookdate FROM timeslot WHERE uid='$doctor_id' AND bookdate >= CURDATE()";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $available_dates[] = $row['bookdate'];
            }
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
        .receipt {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
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
                <select id="doctor" name="doctor" class="form-control" onchange="this.form.submit()">
                    <option value="">Select a doctor</option>
                    <?php
                    $query6 = "SELECT l.uid, u.firstname FROM login l INNER JOIN user u ON l.uid=u.uid WHERE l.role='doctor'";
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

            <?php if (isset($_POST['doctor']) && !empty($available_dates)) { ?>
            <div class="form-group">
                <label for="date">Select Date:</label>
                <select id="date" name="date" class="form-control" onchange="this.form.submit()">
                    <option value="">Select a date</option>
                    <?php
                    foreach ($available_dates as $available_date) {
                        $selected = (isset($_POST['date']) && $_POST['date'] == $available_date) ? 'selected' : '';
                        echo "<option value='$available_date' $selected>$available_date</option>";
                    }
                    ?>
                </select>
            </div>
            <?php } ?>

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

        <?php if ($appointment_details): ?>
        <div class="receipt">
            <h4>Your Appointment Receipt</h4>
            <p><strong>Doctor:</strong> <?php echo $appointment_details['doctor_name']; ?></p>
            <p><strong>Patient Name:</strong> <?php echo $appointment_details['pname']; ?></p>
            <p><strong>Appointment Date:</strong> <?php echo $appointment_details['appointment_date']; ?></p>
            <p><strong>Appointment Time:</strong> <?php echo $appointment_details['appointment_time']; ?></p>
            <p><strong>Status:</strong> Confirmed</p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
