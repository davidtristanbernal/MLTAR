<?php
session_start();
// Assuming you have the database connection code here
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

// Check if the payment form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the payment form data
    $paymentMethod = $_POST['paymentMethod'];
    $gcash_account_name = isset($_POST['gcash_account_name']) ? $_POST['gcash_account_name'] : '';
    $gcash_account_number = isset($_POST['gcash_account_number']) ? $_POST['gcash_account_number'] : '';
    $name_on_card = isset($_POST['name_on_card']) ? $_POST['name_on_card'] : '';
    $card_number = isset($_POST['card_number']) ? $_POST['card_number'] : '';
    $expiry_date = isset($_POST['expiry_date']) ? $_POST['expiry_date'] : '';
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';
    $amount = $_POST['amount'];

    // Insert the payment data into the database
    $insertSql = "INSERT INTO payments (first_name, middle_name, last_name, cellphone, address, age, gender, email,payment_method, gcash_account_name, gcash_account_number,name_on_card, card_number, expiry_date, cvv, amount) 
    VALUES ('$first_name', '$middle_name', '$last_name', '$cellphone', '$address', '$age', '$gender', '$email','$paymentMethod', '$gcash_account_name', '$gcash_account_number','$name_on_card',  '$card_number', '$expiry_date', '$cvv', '$amount')";
    if ($conn->query($insertSql) === TRUE) {
        echo "<script>
                window.onload = function() {
                    alert('Payment successful. Payment details stored in the database.');
                }
              </script>";
    } else {
        echo "Error storing payment details: " . $conn->error;
    }
}
// Retrieve the appointment history for the user
$paymentSql = "SELECT * FROM payments WHERE email = '$email'ORDER BY payment_date DESC LIMIT 5";
$paymentResult = $conn->query($paymentSql);
// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Patient | Payments</title>
        <?php include('./include/header.php'); ?>
    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar">
                <ul>
                    <li><a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
                    <li><a href="test_results.php"><i class="fas fa-file-image-o"></i> Test Results</a></li>
                    <li><a href="form.php"><i class="fas fa-file-word-o"></i> Forms</a></li>
                    <li><a href="appointment.php"><i class="fas fa-calendar-check"></i> Appointment</a></li>
                    <li><a href="payment.php" class="active"> <i class="fa fa-qrcode"></i>  Payment</a></li>
                    <li><a href="patient.php"><i class="fa fa-users"></i> Patients</a></li>
                    <li><a href="user_profile.php"> <i class="fa fa-user-circle"></i>  Profile</a></li>
                    <li><a href="../user/patient_log.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                </ul>
            </div>

  <div class="content">
  <button class="toggle-sidebar-btn"> <i class="fas fa-bars fa-2x"></i></button>
    <h2>Welcome to your Payments </h2>
            <div class="dashboard-section">
            </div>
          
                <div class="payment-history">
    <h3>Payment History</h3>
    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Cellphone</th>
                <th>Address</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Payment Type</th>
                <th>Gcash Account Name</th>
                <th>Gcash Account Number</th>
                <th>Card Name</th>
                <th>Card Number</th>
                <th>Expiry Date</th>
                <th>CVV</th>
                <th>Amount</th>
                <th>Payment Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rowCount = 0;
            while ($paymentRow = $paymentResult->fetch_assoc()) {
                $full_name = $first_name;
                if (!empty($middle_name)) {
                    $full_name .= ' ' . $middle_name;
                }
                $full_name .= ' ' . $last_name;
                echo "<tr>";
                echo "<td>$full_name</td>";
                echo "<td>{$paymentRow['cellphone']}</td>";
                echo "<td>{$paymentRow['address']}</td>";
                echo "<td>{$paymentRow['age']}</td>";
                echo "<td>{$paymentRow['gender']}</td>";
                echo "<td>{$paymentRow['email']}</td>";
                echo "<td>{$paymentRow['payment_method']}</td>";

                if ($paymentRow['payment_method'] === "gcash") {
                    echo "<td>{$paymentRow['gcash_account_name']}</td>";
                    echo "<td>{$paymentRow['gcash_account_number']}</td>";
                    // Display empty cells for credit card fields
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                } else if ($paymentRow['payment_method'] === "creditCard") {
                    // Display empty cells for GCash fields
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td>{$paymentRow['name_on_card']}</td>";
                    echo "<td>{$paymentRow['card_number']}</td>";
                    echo "<td>{$paymentRow['expiry_date']}</td>";
                    echo "<td>{$paymentRow['cvv']}</td>";
                }

                echo "<td>{$paymentRow['amount']}</td>";
                echo "<td>{$paymentRow['payment_date']}</td>";
                echo "</tr>";
                // Add a line of separation after each row
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
    </div>
    <?php include('./include/footer.php');?>
</div>
</body>
</html>

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
<script>
        function showPopupForm() {
            var popupForm = document.getElementById("popupForm");
            popupForm.style.display = "block";
        }

        function hidePopupForm() {
            var popupForm = document.getElementById("popupForm");
            popupForm.style.display = "none";
        }

        function toggleFields() {
            var paymentMethod = document.getElementById("paymentMethod");
            var gcashFields = document.getElementById("gcashFields");
            var creditCardFields = document.getElementById("creditCardFields");

            if (paymentMethod.value === "gcash") {
                gcashFields.classList.remove("hidden");
                creditCardFields.classList.add("hidden");
            } else if (paymentMethod.value === "creditCard") {
                gcashFields.classList.add("hidden");
                creditCardFields.classList.remove("hidden");
            } else {
                gcashFields.classList.add("hidden");
                creditCardFields.classList.add("hidden");
            }
        }
    </script>
<style>
       #popupForm {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f2f2f2;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }
        .hidden {
            display: none;
        }
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

