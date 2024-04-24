<?php include('./include/header.php')?>

<title>Patient | Blood Chemistry / Immunology</title>

<div class="wrapper">
  <div class="sidebar">
    <ul>
      <li><a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
      <li><a href="test_results.php" class="active"><i class="fas fa-file-image-o"></i> Test Results</a></li>
      <li><a href="form.php"><i class="fas fa-file-word-o"></i> Forms</a></li>
      <li><a href="appointment.php"><i class="fas fa-calendar-check"></i> Appointment</a></li>
      <li><a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a></li>
      <li><a href="patient.php"><i class="fa fa-users"></i> Patients</a></li>
      <li><a href="admin_profile.php"><i class="fa fa-user-circle"></i> Profile</a></li>
      <li><a href="../admin/admin_log.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
    </ul>
  </div>  

  <div class="content">
    <button class="toggle-sidebar-btn"> <i class="fas fa-bars fa-2x"></i></button>
    <h2>Patients | Blood Chemistry / Immunology</h2>
    <div class="search-form-wrapper">
      <form method="GET" action="" style="margin-left:80%; margin-top:-5%;" name="search-form">
        <input type="text" name="search" placeholder="Enter a Name">
        <button type="submit"><i class="fa fa-search"></i> </button>
      </form>  </div>
    <br>
    <body>

    <?php
    // Check if the search form is submitted
    if (isset($_GET['search'])) {
      $search = $_GET['search'];

      // Create a new database connection
      $conn = new mysqli($servername, $username, $password,$dbname);

      // Check the connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Prepare and execute the search query
      $stmt = $conn->prepare("SELECT * FROM immunology WHERE name LIKE ?");
      $searchTerm = "%$search%"; // Add wildcard '%' to search term
      $stmt->bind_param("s", $searchTerm);
      $stmt->execute();
      $result = $stmt->get_result();

      // Display the search results
      if ($result->num_rows > 0) {
        // Display the patient data in the form
        while ($row = $result->fetch_assoc()) {
          echo '<div class="heading" style="font-style: italic;">
          <h1>
              <span  style="margin-right:10%;" class="northope">CitiDx <i class="fas fa-microscope" style="margin-left: 10px;"></i></span>
              <span class="subheading">Diagnostic Center</span>
          </h1>
          <div>
              16 Eugenio St., San Jose City, Nueva Ecija <br> 
              Contact No.:  Globe : 09668995030 / <br>
              09274141732 / 09753165846 <br>
              Smart : 09617879898 <br>
              Email : citidx_lab@yahoo.com <br>
              Monday - Saturday : 7:30 AM - 5:00 PM
          </div>
      </div> <br>';

          echo '<form>
                  <fieldset>
                    <table id="patient-info">
                      <thead>
                        <tr>
                          <td style="text-align: left;" colspan="3" label="" for="name"> Name : ' . $row['name'] . ' </td>
                          <td style="text-align: left;" colspan="2" label="" for="date"> Date : ' . $row['date'] . ' </td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <td style="text-align: left;" colspan="2" label="" for="age"> Age : ' . $row['age'] . ' </td>
                          <td style="text-align: left;" label="" for="sex"> Sex : ' . $row['sex'] . ' </td>
                          <td style="text-align: left;" colspan="2" label="" for="patient_number"> Patient Number : ' . $row['patient_number'] . ' </td>
                        </tr>
                        <tr>
                          <td style="text-align: left;" colspan="5" label="" for="address"> Address : ' . $row['address'] . ' </td>
                        </tr>
                      </thead>
                    </table>
                  </fieldset>
                </form>';

          echo '<br>';

          echo '<form>
          <fieldset>
          <div style="overflow-x: auto;">
            <table id="table2">
              <thead>
                <tr>
                  <th style="text-align:left;" colspan="9"><i>BLOOD CHEMISTRY / IMMUNOLOGY</i></th>
                </tr>
              </thead>
              <tbody style="background-color: #13005a; color:#fff;">
                <tr>
                  <td></td>
                  <td>Result</td>
                  <td>Range</td>
                  <td></td>
                  <td>Result</td>
                  <td>Range</td>
                  <td></td>
                  <td>Result</td>
                  <td>Range</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>Glucose <br> FBS</td>
                    <td>' . $row['fbs'] . '</td>
                    <td>70 - <br> 110 mg/dL</td>
                    <td>BUN</td>
                    <td>' . $row['bun'] . '</td>
                    <td>8 - 23 mg/dL</td>
                    <td>Sodium / Na</td>
                    <td>' . $row['na'] . '</td>
                    <td>135 - 148 <br> mmol/L</td>
                </tr>
                <tr>
                    <td>Cholesterol</td>
                    <td>' . $row['calories'] . '</td>
                    <td>Less than <br>200 mg/dL</td>
                    <td>Creatinine</td>
                    <td>' . $row['creatinine'] . '</td>
                    <td>0.5 - 1.7 mg/dL</td>
                    <td>Potassium / K</td>
                    <td>' . $row['na'] . '</td>
                    <td>3.5 - 5.3<br> mmol/L</td>
                </tr>
                <tr>
                    <td>Triglyceride</td>
                    <td>' . $row['triglyceride'] . '</td>
                    <td>44 - 148 mg/dL</td>
                    <td>Uric Acid</td>
                    <td>' . $row['acid'] . '</td>
                    <td>M : 2.5 - 7.7 mg/dL<br>
                    F : 1.5 - 6.00 mg/dL</td>
                    <td>Chloride / Cl</td>
                    <td>' . $row['cl'] . '</td>
                    <td>98 - 107 mmol/L</td>
                </tr>
                <tr>
                    <td>HDL-<br>Chole</td>
                    <td>' . $row['hdl'] . '</td>
                    <td>30 - 75 <br>mg/dL</td>
                    <td>ALT / SGPT</td>
                    <td>' . $row['sgpt'] . '</td>
                    <td>0 - 47 IU/L</td>
                    <td>Calcium</td>
                    <td>' . $row['ca'] . '</td>
                    <td>1.13 - 1.42 mmol/L</td>
                </tr>
                <tr>
                    <td>LDL-<br>Chole</td>
                    <td>' . $row['ldl'] . '</td>
                    <td>66 - 178 mg/dL</td>
                    <td>ALT / SGOT</td>
                    <td>' . $row['sgot'] . '</td>
                    <td>0 - 40 IU/L</td>
                    <td>HBA1c</td>
                    <td>' . $row['hba1c'] . '</td>
                    <td>4.2 - 6.5%</td>
                </tr>  
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Others:</td>
                    <td colspan="7">' . $row['others'] . '</td>
                </tr>
                </tfoot>
                </table>
                </fieldset>
                </form>';

          echo '<br>';

          // Print button with JavaScript to print the form only
          echo '<div class="no-print">
                  <button class="print-btn"><i class="fas fa-print"></i> Print</button>
                </div>';
        }
      } else {
        echo "No results found.";
      }

      // Close the prepared statement and database connection
      $stmt->close();
      $conn->close();
    }
    ?>
</div>
</div>

<?php include('./include/footer.php')?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Toggle sidebar on button click
  $('.toggle-sidebar-btn').click(function() {
    $('.sidebar').toggle();
  });

  // Print button click event
  $('.print-btn').click(function() {
    // Hide the print button
    $(this).hide();

    // Hide the other contents
    $('.search-form-wrapper').hide();
    $('.sidebar').hide();
    $('.header').hide();
    $('.content-h2').hide();

    // Show the desired elements (patient-info and table)
    $('#patient-info').show();
    $('#table').show();

    // Apply print styles
    $('body').addClass('print-mode');

    // Print the document
    window.print();

    // Revert back the changes
    $('body').removeClass('print-mode');

    // Show the search form again
    $('.search-form').show();

    // Show the print button again
    $(this).show();
  });
});
</script>

<style>
  @media print {
    .toggle-sidebar-btn,
    .search-form {
      display: none;
    }
  }
  .custom-bg {
  background-color: #13005a;
}

</style>

<script>
  // Toggle the sidebar menu
  document.querySelector('.toggle-icon').addEventListener('click', function() {
    document.querySelector('.sidebar').classList.toggle('active');
  });
</script>
</body>
</html>