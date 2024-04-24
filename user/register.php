<?php
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

if (isset($_POST['submit'])) {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $cellphone = $_POST['cellphone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM patients WHERE email = '$email'";
    $checkEmailResult = $conn->query($checkEmailQuery);

    if ($checkEmailResult->num_rows > 0) {
        // Email already exists, show error message
        echo "<script>alert('Account already exists!');</script>";
    } else {
        // Email doesn't exist, proceed with registration
        $sql = "INSERT INTO patients (first_name, middle_name, last_name, cellphone, address, email, password)
                VALUES ('$firstName', '$middleName', '$lastName', '$cellphone', '$address', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration successful!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
    <link href="fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAAAAAAMzEvAJZOBgCJgkgAgopOAGNgWwBXU08ApGU0AFLBcwA04ooAQeCeAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFBQAAAAAAAAAAAAAAAAAAAQEAAAAAAAAAAAYBAQEBAQEBAQEBAQEBAAAGAgICAgICAgICAgICBgAABgICAgIKBwIJAgICAgYAAAYCAgICCQQCCQICAgIGAAAGCgoJAgkJAgkJCQkKBgAABgcHAgkJCQIJAgICAgYAAAYCBwIJAgIJCAICAgIGAAAGAgcCCQICCQMCAgcCAQAABgIHAgICAgkHAgICAgYAAAYCBwcHBwIKBwICAgIGAAAGAgICAgICAgICAgICBgAABQEBAQEBAQEBAQEBAQUAAAAAAAAAAAAAAAAAAAAAAP//AAD+fwAA/n8AAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAP//AAA=" rel="icon" type="image/x-icon" />
</head>
<body>
    <div class="container">
        <div class="registration-form" style="margin-top:2%;">
            <h2>MLRMS v1.0 | Patient Registration</h2>

            <form class="form-register" method="POST" action="register.php">
                <div class="slide" id="slide1">
                    <p>Page 1: Personal Information</p>
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <div class="input-icon">
                        <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
                        <i class="fa fa-user" ></i></div>
                    </div>
                    <div class="form-group">
                        <label for="middleName">Middle Name</label>
                        <div class="input-icon">
                        <input type="text" id="middleName" name="middleName" placeholder="Middle Name">
                        <i class="fa fa-user"></i></div>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <div class="input-icon">
                        <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
                        <i class="fa fa-user"></i></div>
                    </div>
                    <button type="button" onclick="nextSlide(1)">Next</button> <br><br> 
                    <div class="login-link" id="bottom-login-link">
                    Already have an account? <a href="patient_log.php">Login here</a>
                </div>
                </div>

                <div class="slide" id="slide2">
                    <p>Page 2: Contact Information</p>
                    <div class="form-group">
                        <label for="cellphone">Cellphone Number</label>
                        <div class="input-icon">
                            <input type="text" id="cellphone" name="cellphone" placeholder="Cellphone Number" required>
                            <i class="fa fa-phone"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <div class="input-icon">
                            <input type="text" id="address" name="address" placeholder="Address" required>
                            <i class="fa fa-home"></i>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <div class="input-icon">
                            <input type="number" id="age" name="age" placeholder="Age" required>
                            <i class="fa fa-user"></i>
                        </div>
                        </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div class="input-icon">
                            <select id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            </select>
                            <i class="fa fa-venus-mars"></i>
                        </div>
                        </div>
                        <button type="button" onclick="prevSlide(1)">Previous</button>
                       <button type="button" onclick="nextSlide(1)">Next</button><br><br>
                    </div>

                <div class="slide" id="slide3">
                    <p>Page 3: Account Information</p>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-icon">
                        <input type="text" id="email" name="email" placeholder="Email">
                        <i class="fa fa-user"></i>
                    </div></div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-icon">
                        <input type="password" id="password" name="password" placeholder="Password">
                        <i class="fa fa-lock"></i>
                    </div><br>
                    <button type="button" onclick="prevSlide(1)">Previous</button>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit">Register <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>

                <div class="login-link" id="bottom-login-link">
                    Already have an account? <a href="patient_log.php">Login here</a>
                </div>
            </form>
        </div>
    </div>

    <div class="text-center">
        <span style="margin-top:10%;">Medical Laboratory Result Management System v1.0</span>
    </div>

    <script>
        var currentSlide = 1;
        showSlide(currentSlide);

        function nextSlide(n) {
            showSlide(currentSlide += n);
        }

        function prevSlide(n) {
            showSlide(currentSlide -= n);
        }

        function showSlide(n) {
            var slides = document.getElementsByClassName("slide");
            if (n > slides.length) {
                currentSlide = 1;
            }
            if (n < 1) {
                currentSlide = slides.length;
            }
            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[currentSlide - 1].style.display = "block";

            // Show/hide login link based on current slide
            var loginLink = document.querySelector(".login-link");
            if (currentSlide === slides.length) {
                loginLink.style.display = "block";
            } else {
                loginLink.style.display = "none";
            }

            // Show/hide form action based on current slide
            var form = document.querySelector(".form-register");
            if (currentSlide === slides.length) {
                form.setAttribute("action", "register.php");
            } else {
                form.removeAttribute("action");
            }
        }
    </script>
</body>
</html>
