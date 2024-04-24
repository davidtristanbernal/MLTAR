<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mltar";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have the logged-in user's ID or some unique identifier
$id = $_SESSION['id']; // Replace with the actual user identifier

// Retrieve the user's data from the database
$sql = "SELECT * FROM patients WHERE id = '$id'"; // Replace 'patients' with your patients table name
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
    $middle_name = $row['middle_name'];
    $last_name = $row['last_name'];
    $cellphone = $row['cellphone'];
    $address = $row['address'];
    $age = $row['age'];
    $gender = $row['gender'];
    $email = $row['email'];

    // Set other user data as needed
} else {
    // User not found or error handling
}

// Retrieve the form data
$service = isset($_POST['service']) ? $_POST['service'] : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';
$time = isset($_POST['time']) ? $_POST['time'] : '';

// Validate the form data
if (empty($service) || empty($date) || empty($time)) {
    // Handle the case when required fields are missing
   
} else {
    // Insert the form data into the appointments table
    $insertSql = "INSERT INTO appointments (first_name, middle_name, last_name, cellphone, address, age, gender, email, service, appointment_date, appointment_time, status) 
    VALUES ('$first_name', '$middle_name', '$last_name', '$cellphone', '$address', '$age', '$gender', '$email', '$service', '$date', '$time', 'pending')";
    if ($conn->query($insertSql) === TRUE) {
        echo "<script>
                window.onload = function() {
                    alert('Appointment created successfully.');
                }
              </script>";
    } else {
        echo "Error creating appointment: " . $conn->error;
    }
}
// Retrieve the appointment history for the user
$appointmentSql = "SELECT * FROM appointments WHERE email = '$email' ORDER BY appointment_date DESC LIMIT 5";
$appointmentResult = $conn->query($appointmentSql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <title>Patient | Appointments</title>
    <?php include('./include/head.php'); ?>

    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <li><a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
                <li><a href="test_results.php"><i class="fas fa-file-image-o"></i> Test Results</a></li>
                <li><a href="appointment.php" class="active"><i class="fas fa-calendar-check"></i> Appointment</a></li>
                <li><a href="payment.php"> <i class="fa fa-qrcode"></i>  Payment</a></li>
                <li><a href="user_profile.php"> <i class="fa fa-user-circle"></i>  Profile</a></li>
                <li><a href="../user/patient_log.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
        </div>

        <div class="content">
            <button class="toggle-sidebar-btn"> <i class="fas fa-bars fa-2x"></i></button>
            <h2>Patient | Appointment</h2>
            <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #f2f2f2;
            }
            .separator {
                border-left: 1px solid #ddd;
            }
        </style>
            <div class="dashboard-section">
                <div class="box-container">
                    <div class="box" style="background-color: #B8860B;">
                        <a href="appointment.php"><i class="fas fa-calendar-check fa-3x"></i></a>
                        <p><button onclick="showPopupForm()">Book an Appointment</button></p>
                    </div>
                </div>

                <div id="popupForm" style="display: none;">
                    <form action="appointment.php" method="post">
                        <label for="fullName">Full Name :</label>
                        <?php
                        $full_name = $first_name;
                        if (!empty($middle_name)) {
                            $full_name .= ' ' . $middle_name;
                        }
                        $full_name .= ' ' . $last_name;
                        echo $full_name;
                        ?><br><br>

                        <label for="cellphone">Cellphone :</label>
                        <?php echo $cellphone; ?><br><br>

                        <label for="address">Address :</label>
                        <?php echo $address; ?><br><br>

                        <label for="age">Age :</label>
                        <?php echo $age; ?><br><br>

                        <label for="gender">Gender :</label>
                        <?php echo $gender; ?><br><br>

                        <label for="email">Email :</label>
                        <?php echo $email; ?><br><br>

                        <label for="service">Service :</label>
                        <select name="service" id="service" required>
                            <option value="" selected disabled>Select type of Service</option>
                            <option value="hematology">Hematology</option>
                            <option value="urinalysis">Urinalysis</option>
                            <option value="blood chemistry / immunology">Blood Chemistry / Immunology</option>
                        </select><br><br>

                        <label for="date">Date :</label>
                        <input type="date" name="date" id="date" required>

                        <label for="time">Time :</label>
                        <input type="time" name="time" id="time" required><br><br>

                        <!--<label for="status">Status :</label>
                        <?php echo $status; ?><br><br>-->

                        <input type="submit" value="Submit">
                        <button type="button" onclick="cancelForm()">Cancel</button>
                    </form>
                </div>
            </div>
                <div class="appointment-history">
                    <h3>Appointment History</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Cellphone</th>
                                <th>Address</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Service</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
    <?php
    $rowCount = 0;
    if ($appointmentResult->num_rows > 0) {
        while ($appointmentRow = $appointmentResult->fetch_assoc()) {
            $full_name = $first_name;
            if (!empty($middle_name)) {
                $full_name .= ' ' . $middle_name;
            }
            $full_name .= ' ' . $last_name;
            $cellphone = $appointmentRow['cellphone'];
            $address = $appointmentRow['address'];
            $age = $appointmentRow['age'];
            $gender = $appointmentRow['gender'];
            $email = $appointmentRow['email'];
            $appointmentDate = $appointmentRow['appointment_date'];
            $appointmentTime = $appointmentRow['appointment_time'];
            $service = $appointmentRow['service'];
            $status = $appointmentRow['status'];

            echo "<tr>";
            echo "<td>$full_name</td>";
            echo "<td>$cellphone</td>";
            echo "<td>$address</td>";
            echo "<td>$age</td>";
            echo "<td>$gender</td>";
            echo "<td>$email</td>";
            echo "<td>$appointmentDate</td>";
            echo "<td>$appointmentTime</td>";
            echo "<td>$service</td>";
            echo "<td>$status</td>";
            echo "</tr>";

            // Add a line of separation after each row
            echo "<tr class=\"separator\"></tr>";

            $rowCount++;
        }
    } else {
        echo "<tr><td colspan='10'>No appointments found.</td></tr>";
    }

    // Add extra separation rows if necessary
    while ($rowCount < 5) {
        echo "<tr class=\"separator\"></tr>";
        $rowCount++;
    }
    ?>
</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<style>
    .button-wrapper {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
</style>

<script>
    function cancelForm() {
        // Hide the form
        document.getElementById("popupForm").style.display = "none";
    }
</script>

<script>
    function showPopupForm() {
        var popup = document.getElementById("popupForm");
        popup.style.display = "block";
    }
</script>

<style>
    /* Style the pop-up form */
    #popupForm {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        z-index: 9999;
    }
</style>

<?php include('./include/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Toggle sidebar on button click
        $('.toggle-sidebar-btn').click(function() {
            $('.sidebar').toggle();
        });
    });
</script>

<script>
    // Toggle the sidebar menu
    document.querySelector('.toggle-icon').addEventListener('click', function() {
        document.querySelector('.sidebar').classList.toggle('active');
    });
</script>
