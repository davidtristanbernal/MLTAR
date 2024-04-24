<?php 
session_start();
include('./include/head.php'); ?>
<title>Patient | Profile</title>

<div class="wrapper">
  <div class="sidebar">
    <ul>
      <li><a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
      <li><a href="test_results.php"><i class="fas fa-file-image-o"></i> Test Results</a></li>
      <li><a href="appointment.php"><i class="fas fa-calendar-check"></i> Appointment</a></li>
      <li><a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a></li>
      <li><a href="user_profile.php" class="active"><i class="fa fa-user-circle"></i> Profile</a></li>
      <li><a href="../user/patient_log.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
    </ul>
  </div>

  <div class="content">
    <button class="toggle-sidebar-btn"> <i class="fas fa-bars fa-2x"></i></button>
    <h2>Patient | Profile</h2>

    <div class="dashboard-section">
  <div class="table-wrapper">
    <table class="responsive-table">
      <thead>
        <tr>
          <th>Field</th>
          <th>Data</th>
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

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // Get the updated values from the form
          $updatedData = $_POST['data'];

          // Iterate over the updated data
          foreach ($updatedData as $doctorId => $doctorData) {
            $updatedFirstName = $doctorData['first_name'];
            $updatedMiddleName = $doctorData['middle_name'];
            $updatedLastName = $doctorData['last_name'];
            $updatedCellphone = $doctorData['cellphone'];
            $updatedAddress = $doctorData['address'];
            $updatedAge = $doctorData['age'];
            $updatedGender = $doctorData['gender'];
            $updatedEmail = $doctorData['email'];

            // Update the doctor's data in the database
            $updateSql = "UPDATE patients SET first_name = '$updatedFirstName', middle_name = '$updatedMiddleName', last_name = '$updatedLastName', cellphone = '$updatedCellphone', address = '$updatedAddress', age = '$updatedAge', gender = '$updatedGender', email = '$updatedEmail' WHERE id = $doctorId";
            if ($conn->query($updateSql) !== true) {
              echo "Error updating doctor data: " . $conn->error;
            }
          }
        
        }
        $id = $_SESSION['id'];
        // Fetch doctor data from the database
        $sql = "SELECT * FROM patients WHERE id = $id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // Output data of each row
          echo "<form method='POST'>";
          while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td data-label='Field'>First Name :</td>";
              echo "<td data-label='Data' class='editable-field'>";
              echo "<input type='text' name='data[{$row['id']}][first_name]' value='" . $row['first_name'] . "' class='edit-input'>";
              echo "</td>";
              echo "</tr>";

              echo "<tr class='field-separator'>";
              echo "<td colspan='2'></td>"; // Add a separator cell
              echo "</tr>";
      
              echo "<tr>";
              echo "<td data-label='Field'>Middle Name :</td>";
              echo "<td data-label='Data' class='editable-field'>";
              echo "<input type='text' name='data[{$row['id']}][middle_name]' value='" . $row['middle_name'] . "' class='edit-input'>";
              echo "</td>";
              echo "</tr>";

              echo "<tr class='field-separator'>";
              echo "<td colspan='2'></td>"; // Add a separator cell
              echo "</tr>";
      
              echo "<tr>";
              echo "<td data-label='Field'>Last Name :</td>";
              echo "<td data-label='Data' class='editable-field'>";
              echo "<input type='text' name='data[{$row['id']}][last_name]' value='" . $row['last_name'] . "' class='edit-input'>";
              echo "</td>";
              echo "</tr>";

              echo "<tr class='field-separator'>";
              echo "<td colspan='2'></td>"; // Add a separator cell
              echo "</tr>";
      
              echo "<tr>";
              echo "<td data-label='Field'>Cellphone :</td>";
              echo "<td data-label='Data' class='editable-field'>";
              echo "<input type='text' name='data[{$row['id']}][cellphone]' value='" . $row['cellphone'] . "' class='edit-input'>";
              echo "</td>";
              echo "</tr>";

              echo "<tr class='field-separator'>";
              echo "<td colspan='2'></td>"; // Add a separator cell
              echo "</tr>";
      
              echo "<tr>";
              echo "<td data-label='Field'>Address :</td>";
              echo "<td data-label='Data' class='editable-field'>";
              echo "<input type='text' name='data[{$row['id']}][address]' value='" . $row['address'] . "' class='edit-input'>";
              echo "</td>";
              echo "</tr>";

              echo "<tr class='field-separator'>";
              echo "<td colspan='2'></td>"; // Add a separator cell
              echo "</tr>";
      
              echo "<tr>";
              echo "<td data-label='Field'>Age :</td>";
              echo "<td data-label='Data' class='editable-field'>";
              echo "<input type='text' name='data[{$row['id']}][age]' value='" . $row['age'] . "' class='edit-input'>";
              echo "</td>";
              echo "</tr>";

              echo "<tr class='field-separator'>";
              echo "<td colspan='2'></td>"; // Add a separator cell
              echo "</tr>";
      
              echo "<tr>";
              echo "<td data-label='Field'>Gender :</td>";
              echo "<td data-label='Data' class='editable-field'>";
              echo "<input type='text' name='data[{$row['id']}][gender]' value='" . $row['gender'] . "' class='edit-input'>";
              echo "</td>";
              echo "</tr>";

              echo "<tr class='field-separator'>";
              echo "<td colspan='2'></td>"; // Add a separator cell
              echo "</tr>";
      
              echo "<tr>";
              echo "<td data-label='Field'>Email :</td>";
              echo "<td data-label='Data' class='editable-field'>";
              echo "<input type='text' name='data[{$row['id']}][email]' value='" . $row['email'] . "' class='edit-input'>";
              echo "</td>";
              echo "</tr>";

              echo "<tr class='field-separator'>";
              echo "<td colspan='2'></td>"; // Add a separator cell
              echo "</tr>";
      
              echo "<tr>";
              echo "<td data-label='Field'>Password :</td>";
              echo "<td data-label='Data' class='editable-field'>";
              echo "<div class='password-input-wrapper'>";
              echo "<input type='password' name='data[{$row['id']}][password]' value='" . $row['password'] . "' class='edit-input password-input'>";
              echo "</div>";
              echo "</td>";
              echo "</tr>";
          }
      
          echo "<tr>";
          echo "<td colspan='2' data-label='Action'>";
          echo "<button type='submit' class='save-btn'>Save</button>";
          echo "</td>";
          echo "</tr>";
      
          echo "</form>";
      } else {
          echo "<tr><td colspan='2'>No doctors found.</td></tr>";
      }
      
      // Close the database connection
      $conn->close();
      ?>
      
      </tbody>
    </table>
  </div>
</div>
</div></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    // Toggle sidebar on button click
    $('.toggle-sidebar-btn').click(function() {
      $('.sidebar').toggle();
    });

    // Toggle password visibility
    $('.toggle-password').click(function() {
      var passwordInput = $(this).closest('tr').find('.password-input');
      if (passwordInput.attr('type') === 'password') {
        passwordInput.attr('type', 'text');
        $(this).removeClass('fa-eye').addClass('fa-eye-slash');
      } else {
        passwordInput.attr('type', 'password');
        $(this).removeClass('fa-eye-slash').addClass('fa-eye');
      }
    });
  });
</script>

<?php include('./include/footer.php'); ?>

<script>
  // Toggle the sidebar menu
  document.querySelector('.toggle-icon').addEventListener('click', function() {
    document.querySelector('.sidebar').classList.toggle('active');
  });
</script>
</body>
</html>