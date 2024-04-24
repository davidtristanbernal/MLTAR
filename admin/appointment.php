<?php 
session_start();
include('./include/header.php'); ?>
<title>Patients | Appointment</title>  

<div class="wrapper">
  <div class="sidebar">
    <ul>
      <li><a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
      <li><a href="test_results.php"><i class="fas fa-file-image-o"></i> Test Results</a></li>
      <li><a href="form.php"><i class="fas fa-file-word-o"></i> Forms</a></li>
      <li><a href="appointment.php" class="active"><i class="fas fa-calendar-check"></i> Appointment</a></li>
      <li><a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a></li>
      <li><a href="patient.php"><i class="fa fa-users"></i> Patients</a></li>
      <li><a href="admin_profile.php"><i class="fa fa-user-circle"></i> Profile</a></li>
      <li><a href="../admin/admin_log.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
    </ul>
  </div>

  <div class="content">
    <button class="toggle-sidebar-btn"> <i class="fas fa-bars fa-2x"></i></button>
    <h2>Patients | Appointment </h2>
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
              <th>Appointment Date</th>
              <th>Appointment Time</th>              
              <th>Service</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Define the number of appointments per page
            $appointmentsPerPage = 10;

            // Get the current page number
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

            // Calculate the offset for the appointments query
            $offset = ($currentPage - 1) * $appointmentsPerPage;

            // Create a new database connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check the connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              // Update the appointment status in the database
              if (isset($_POST['action']) && isset($_POST['patient_id'])) {
                $selectedStatus = $_POST['action'];
                $patientId = $_POST['patient_id'];

                $updateSql = "UPDATE appointments SET status = '$selectedStatus' WHERE id = $patientId";
                if ($conn->query($updateSql) === true) {
                }
              }
            }

            // Fetch total number of appointments
            $totalAppointmentsSql = "SELECT COUNT(*) AS total FROM appointments";
            $totalResult = $conn->query($totalAppointmentsSql);
            $totalAppointments = $totalResult->fetch_assoc()['total'];

            // Calculate the total number of pages
            $totalPages = ceil($totalAppointments / $appointmentsPerPage);

            // Fetch appointments for the current page
            $appointmentsSql = "SELECT *, CONCAT_WS(' ', first_name, IFNULL(middle_name, ''), last_name) AS full_name FROM appointments LIMIT $appointmentsPerPage OFFSET $offset";
            $result = $conn->query($appointmentsSql);

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
                echo "<td>" . $row['appointment_date'] . "</td>";
                echo "<td>" . $row['appointment_time'] . "</td>";
                echo "<td>" . $row['service'] . "</td>";
                echo "<td>";
                echo "<form method='POST'>";
                echo "<input type='hidden' name='patient_id' value='" . $row['id'] . "'>";
                echo "<select name='action' onchange='this.form.submit()'>";
                echo "<option value='Pending' " . ($row['status'] == 'Pending' ? 'selected' : '') . ">Pending</option>";
                echo "<option value='Done' " . ($row['status'] == 'Done' ? 'selected' : '') . ">Done</option>";
                echo "</select>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
              }
            } else {
              echo "No appointments found.";
            }
            // Close the database connection
            $conn->close();
            ?>
           </tbody>
        </table>
      </div>
    </div>

    <div class="pagination">
      <div class="pagination-buttons">
        <?php
        // Generate previous button
        if ($currentPage > 1) {
          $previousPage = $currentPage - 1;
          echo "<a href='appointment.php?page=$previousPage'>&lt; Previous</a>";
        }
        ?>
      </div>
      <div class="pagination-buttons">
        <?php
        // Generate next button
        if ($currentPage < $totalPages) {
          $nextPage = $currentPage + 1;
          echo "<a href='appointment.php?page=$nextPage'>Next &gt;</a>";
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include('./include/footer.php') ?>
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

<style>
  .dashboard-section .tr{
    background-color: none;
  }
  .table,
  .tr {
  background-color: none;
}
</style>