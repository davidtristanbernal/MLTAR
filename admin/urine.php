<?php include('./include/header.php')?>

<title>Patient | Urinalysis</title>

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
    <h2>Patients | Urinalysis</h2>
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
      $stmt = $conn->prepare("SELECT * FROM urinalysis WHERE name LIKE ?");
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
                    <table id="table">
                      <thead>
                        <tr>
                          <th style="text-align: left;" colspan="6"><i>Urinalysis</i></th>
                        </tr>
                      </thead>
                      <tbody style="background-color: #d7ff14; color:#000;">
                        <tr>
                          <td></td>
                          <td>Result</td>
                          <td></td>
                          <td>Result</td>
                          <td></td>
                          <td>Result</td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td>Color</td>
                          <td>' . $row['color'] . '</td>
                          <td>Specific Gravity</td>
                          <td>' . $row['gravity'] . '</td>
                          <td>Mucus Threads</td>
                          <td>' . $row['mucus'] . '</td>
                        </tr>
                        <tr>
                          <td>Appearance</td>
                          <td>' . $row['appearance'] . '</td>
                          <td>Pus Cells</td>
                          <td>' . $row['pcells'] . '</td>
                          <td>Bacteria</td>
                          <td>' . $row['bacteria'] . '</td>
                        </tr>
                        <tr>
                          <td>Albumin</td>
                          <td>' . $row['albumin'] . '</td>
                          <td>Red Cells </td>
                          <td>' . $row['rcells'] . '</td>
                          <td>Cast</td>
                          <td>' . $row['cast'] . '</td>
                        </tr>
                        <tr>
                          <td>Glucose</td>
                          <td>' . $row['glucose'] . '</td>
                          <td>Epithelial Cells </td>
                          <td>' . $row['ecells'] . '</td>
                          <td>Pregnancy tests</td>
                          <td>' . $row['ptest'] . '</td>
                          <tr>
                          <td>pH</td>
                          <td>' . $row['ph'] . '</td>
                          <td>Amorphous Urates / Phosphates</td>
                          <td>' . $row['aup'] . '</td>
                          <td>Others</td>
                          <td>' . $row['other'] . '</td>
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
</style>

<script>
  // Toggle the sidebar menu
  document.querySelector('.toggle-icon').addEventListener('click', function() {
    document.querySelector('.sidebar').classList.toggle('active');
  });
</script>
</body>
</html>