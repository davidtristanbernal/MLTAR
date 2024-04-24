<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mltar";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // TODO: Validate the email and password against the database

    // Example validation check (replace with your own logic)
    $sql = "SELECT * FROM doctors WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Successful login
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id']; // Set the user_id in the session
        header("Location: dashboard.php"); // Redirect to dashboard.php
        exit;
    } else {
        // Invalid credentials
        echo "<script>alert('Invalid email or password. Please try again.');</script>";
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
    <link href="fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>MLRMS v1.0 | Doctor Login</h2>

            <form class="form-login" method="post">
                <p>Please enter your email and password to log in.</p>

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-icon">
                        <input type="text" id="email" name="email" placeholder="Email">
                        <i class="fa fa-user"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-icon">
                        <input type="password" id="password" name="password" placeholder="Password">
                        <i class="fa fa-lock"></i>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" name="submit">Login <i class="fa fa-arrow-circle-right"></i></button>
                </div>

                <div class="new-account">
                    <div class="forgot-password"> <a href="forgot_password.php"> Forgot Password?</a>
                </div>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center">
        <span style="margin-top:10%;">Medical Laboratory Result Management System v1.0</span>
    </div>
</body>
</html>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
