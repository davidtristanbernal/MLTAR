<!DOCTYPE html>
<html>
<head>
    <title>Appointment Page</title>
    <style>
        /* Styles for pop-up */
        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .popup-inner {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <!-- Button to open the pop-up -->
    <button onclick="openPopup()">Make Appointment</button>

    <!-- Pop-up container -->
    <div id="popup" class="popup" style="display: none;">
        <div class="popup-inner">
            <h2>Appointment Form</h2>
            <form action="appointment.php" method="POST">
                <!-- Add your appointment form fields here -->
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
                
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required><br><br>
                
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <script>
        // Function to open the pop-up
        function openPopup() {
            document.getElementById("popup").style.display = "block";
        }
    </script>
</body>
</html>
