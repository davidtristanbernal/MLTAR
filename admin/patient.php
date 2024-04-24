<?php 
session_start();
include('./include/header.php');?>
<title>Patients | List</title>  

<div class="wrapper">
  <div class="sidebar">
    <ul>
      <li><a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
      <li><a href="test_results.php"><i class="fas fa-file-image-o"></i> Test Results</a></li>
      <li><a href="form.php"><i class="fas fa-file-word-o"></i> Forms</a></li>
      <li><a href="appointment.php"><i class="fas fa-calendar-check"></i> Appointment</a></li>
      <li><a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a></li>
      <li><a href="patient.php" class="active"><i class="fa fa-users"></i> Patients</a></li>
      <li><a href="admin_profile.php"><i class="fa fa-user-circle"></i> Profile</a></li>
      <li><a href="../admin/admin_log.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
    </ul>
  </div>

  <div class="content">
    <!-- Content -->
    <button class="toggle-sidebar-btn"> <i class="fas fa-bars fa-2x"></i></button>
    <h2>Patients | List </h2>

    <div class="dashboard-section">
      <div class="table-wrapper">
        <table class="responsive-table">
          <thead>
            <tr>
              <th>Full Name</th>
              <th>Cellphone</th>
              <th>Address</th>
              <th>Age</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Create a new database connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check the connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            // Check if the delete button is clicked
            if (isset($_GET['id'])) {
              // Get the ID of the patient to be deleted
              $deleteId = $_GET['id'];

              // Delete the patient from the database
              $deleteSql = "DELETE FROM patients WHERE id = $deleteId";
              if ($conn->query($deleteSql) === true) {
                // Redirect to the same page without the delete parameter
                header("Location: patient.php");
                exit();
              } else {
                echo "Error deleting patient: " . $conn->error;
              }
            }

            // Fetch patient data from the database
            $sql = "SELECT *, CONCAT_WS(' ', first_name, IFNULL(middle_name, ''), last_name) AS full_name FROM patients";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // Output data of each row
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['full_name'] . "</td>";
                echo "<td>" . $row['cellphone'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><a href=\"patient.php?id=" . $row['id'] . "\">Delete</a></td>";
                echo "</tr>";
              }
            } else {
              echo "No patients found.";
            }

            // Close the database connection
            $conn->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
<?php include('./include/footer.php') ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Toggle sidebar on button click
    $('.toggle-sidebar-btn').click(function() {
      $('.sidebar').toggle();
    });
  });

  // Toggle the sidebar menu
  document.querySelector('.toggle-icon').addEventListener('click', function() {
    document.querySelector('.sidebar').classList.toggle('active');
  });
</script>
</html>
