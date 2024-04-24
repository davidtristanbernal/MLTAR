<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mltar";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO immunology (name, date, age, sex, patient_number, address, fbs, bun, na, calories, creatinine, k, triglyceride, acid, cl, hdl, sgpt, ca, ldl, sgot, hba1c, others) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssdddddddddddsssss", $name, $date, $age, $sex, $patient_number, $address, $fbs, $bun, $na, $calories, $creatinine, $k, $triglyceride, $acid, $cl, $hdl, $sgpt, $ca, $ldl, $sgot, $hba1c, $others);

// Get the form data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $patient_number = $_POST['patient_number'];
    $address = $_POST['address'];
    $fbs = $_POST['fbs'];
    $bun = $_POST['bun'];
    $na = $_POST['na'];
    $calories = $_POST['calories'];
    $creatinine = $_POST['creatinine'];
    $k = $_POST['k'];
    $triglyceride = $_POST['triglyceride'];
    $acid = $_POST['acid'];
    $cl = $_POST['cl'];
    $hdl = $_POST['hdl'];
    $sgpt = $_POST['sgpt'];
    $ca = $_POST['ca'];
    $ldl = $_POST['ldl'];
    $sgot = $_POST['sgot'];
    $hba1c = $_POST['hba1c'];
    $others = $_POST['others'];

        // Execute the insert statement
        $stmt->execute();

        // Close the prepared statement
        $stmt->close();

        // Close the database connection
        $conn->close();
    }
    ?>
<!DOCTYPE html>
<html>
<head>
  <title>Form | Blood Chemistry / Immunology</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAAAAAAMzEvAJZOBgCJgkgAgopOAGNgWwBXU08ApGU0AFLBcwA04ooAQeCeAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFBQAAAAAAAAAAAAAAAAAAAQEAAAAAAAAAAAYBAQEBAQEBAQEBAQEBAAAGAgICAgICAgICAgICBgAABgICAgIKBwIJAgICAgYAAAYCAgICCQQCCQICAgIGAAAGCgoJAgkJAgkJCQkKBgAABgcHAgkJCQIJAgICAgYAAAYCBwIJAgIJCAICAgIGAAAGAgcCCQICCQMCAgcCAQAABgIHAgICAgkHAgICAgYAAAYCBwcHBwIKBwICAgIGAAAGAgICAgICAgICAgICBgAABQEBAQEBAQEBAQEBAQUAAAAAAAAAAAAAAAAAAAAAAP//AAD+fwAA/n8AAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAP//AAA=" rel="icon" type="image/x-icon" />
</head>
<body>
<div class="header">
        <h1>
            <span class="northope">CitiDx <i class="fas fa-microscope" style="margin-left: 10px;"></i></span>
            <span class="subheading">Diagnostic Center</span>
        </h1>
        <div class="header-content">
            16 Eugenio St., San Jose City, Nueva Ecija <br> 
            Contact No.:  Globe : 09668995030 / <br>
            09274141732 / 09753165846 <br>
            Smart : 09617879898 <br>
            Email : citidx_lab@yahoo.com <br>
            Monday - Saturday : 7:30 AM - 5:00 PM
        </div>
    </div>
    <br>
    <form>
        <fieldset>
            <table id="patient-info">
                <thead>
                    <tr>
                        <td style="text-align: left;" colspan="3" label="" for="name"> Name : <?php if(isset($name)) echo $name; ?></td>
                        <td style="text-align: left;" colspan="2" label="" for="date">Date : <?php if(isset($date)) echo $date; ?></td>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <td style="text-align: left;" colspan="2" label="" for="age">Age : <?php if(isset($age)) echo $age; ?></td>
                        <td style="text-align: left;" label="" for="sex">Sex : <?php if(isset($sex)) echo $sex; ?></td>
                        <td style="text-align: left;" colspan="2" label="" for="patient_number">Patient Number : <?php if(isset($patient_number)) echo $patient_number; ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;" colspan="5" label="" for="address">Address : <?php if(isset($address)) echo $address; ?></td>
                    </tr>
                </thead>
            </table>
        </fieldset>
    <br>

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
              <td>Glucose<br>FBS</td>
              <td><?php echo $fbs; ?></td>
              <td>70 - <br> 110 mg/dL</td>
              <td>BUN</td>
              <td><?php echo $bun; ?></td>
              <td>8 - 23 mg/dL</td>
              <td>Sodium / Na</td>
              <td><?php echo $na; ?></td>
              <td>135 - 148 <br> mmol/L</td>
            </tr>
            <tr>
              <td>Cholesterol</td>
              <td><?php echo $calories; ?></td>
              <td>Less than <br>200 mg/dL</td>
              <td>Creatinine</td>
              <td><?php echo $creatinine; ?></td>
              <td>0.5 - 1.7 mg/dL</td>
              <td>Potassium / K</td>
              <td><?php echo $k; ?></td>
              <td>3.5 - 5.3<br> mmol/L</td>
            </tr>
            <tr>
          <td>Triglyceride</td>
          <td><?php echo $triglyceride; ?></td>
          <td>44 - 148 mg/dL</td>
          <td>Uric Acid</td>
          <td><?php echo $acid; ?></td>
          <td>M : 2.5 - 7.7 mg/dL<br>
          F : 1.5 - 6.00 mg/dL</td>
          <td>Chloride / Cl</td>
          <td><?php echo $cl; ?></td>
          <td>98 - 107 mmol/L</td>
        </tr>
        <tr>
          <td>HDL-<br>Chole</td>
          <td><?php echo $hdl; ?></td>
          <td>30 - 75 <br>mg/dL</td>
          <td>ALT / SGPT</td>
          <td><?php echo $sgpt; ?></td>
          <td>0 - 47 IU/L</td>
          <td>Calcium</td>
          <td><?php echo $ca; ?></td>
          <td>1.13 - 1.42 mmol/L</td>
        </tr>
        <tr>
          <td>LDL-<br>Chole</td>
          <td><?php echo $ldl; ?></td>
          <td>66 - 178 mg/dL</td>
          <td>ALT / SGOT</td>
          <td><?php echo $sgot; ?></td>
          <td>0 - 40 IU/L</td>
          <td>HBA1c</td>
          <td><?php echo $hba1c; ?></td>
          <td>4.2 - 6.5%</td>
        </tr>
       
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>Others:</td>
          <td colspan="7"><?php echo $others; ?></td>
        </tr>
            <!-- Remaining rows omitted for brevity -->
          </tfoot>
        </table>
      </div>
    </fieldset>
  </form>

  <div class="no-print">
    <button onclick="window.print()"><i class="fas fa-print"></i> Print</button>
  </div>
</body>
</html>
<style>
@media screen and (max-width: 768px) {
    input[type="float"],
    input[type="text"] {
      width: 50%;
    }

    table {
      font-size: 14px;
      text-align: center;
    }
  }
  @media screen and (max-width: 360px) {
    input[type="float"],
    input[type="text"] {
      width: 100%;
    }
  }
    /* Add CSS styles for responsiveness */
    @media (max-width: 600px) {
      table#table2 thead th {
        font-size: 12px;
      }
      table#table2 tbody td,
      table#table2 tfoot td {
        font-size: 12px;
        padding: 6px;
      }
    }
    @media print {
      .no-print {
        display: none !important;
      }
    }
  </style>