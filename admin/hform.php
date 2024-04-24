<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

    // Prepare and bind the insert statement
    $stmt = $conn->prepare("INSERT INTO hematology_results (name, date, age, sex, patient_number, address, hemoglobin, wbc, hematocrit, rbc, segmenter, pcount, lymphocyte, ctime, eosinophil, bleeding, monocyte, btype, basophil) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssdddddssdddsss", $name, $date, $age, $sex, $patient_number, $address, $hemoglobin, $wbc, $hematocrit, $rbc, $segmenter, $pcount, $lymphocyte, $ctime, $eosinophil, $bleeding, $monocyte, $btype, $basophil);

    // Get the form data
    $name = $_POST['name'];
    $date = $_POST['date'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $patient_number = $_POST['patient_number'];
    $address = $_POST['address'];
    $hemoglobin = $_POST['hemoglobin'];
    $wbc = $_POST['wbc'];
    $hematocrit = $_POST['hematocrit'];
    $rbc = $_POST['rbc'];
    $segmenter = $_POST['segmenter'];
    $pcount = $_POST['pcount'];
    $lymphocyte = $_POST['lymphocyte'];
    $ctime = $_POST['ctime'];
    $eosinophil = $_POST['eosinophil'];
    $bleeding = $_POST['bleeding'];
    $monocyte = $_POST['monocyte'];
    $btype = $_POST['btype'];
    $basophil = $_POST['basophil'];

    // Execute the insert statement
    if ($stmt->execute()) {
        // Redirect back to the form after successful submission
        header("Location: hform_display.php");
        exit();
    } else {
        // Handle errors
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Form | Hematology</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAAAAAAMzEvAJZOBgCJgkgAgopOAGNgWwBXU08ApGU0AFLBcwA04ooAQeCeAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFBQAAAAAAAAAAAAAAAAAAAQEAAAAAAAAAAAYBAQEBAQEBAQEBAQEBAAAGAgICAgICAgICAgICBgAABgICAgIKBwIJAgICAgYAAAYCAgICCQQCCQICAgIGAAAGCgoJAgkJAgkJCQkKBgAABgcHAgkJCQIJAgICAgYAAAYCBwIJAgIJCAICAgIGAAAGAgcCCQICCQMCAgcCAQAABgIHAgICAgkHAgICAgYAAAYCBwcHBwIKBwICAgIGAAAGAgICAgICAgICAgICBgAABQEBAQEBAQEBAQEBAQUAAAAAAAAAAAAAAAAAAAAAAP//AAD+fwAA/n8AAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAP//AAA=" rel="icon" type="image/x-icon" />
  <head>
</head>
<body>
<div class="heading">
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

    <form action="hform_display.php" method="POST">
    <fieldset>
    <table id="patient-info" >
    <thead >
        <tr>
          <td style="text-align: left;" colspan="3" label="" for="name">Name : <input type="text" id="name" name="name"></td>
          <td style="text-align: left;" colspan="2" label="" for="date">Date : <input type="date" id="date" name="date"></td>
        </tr>
        <tr>
          <td style="text-align: left;" colspan="2" label="" for="age">Age : <input type="number" id="age" name="age"></td>
          <td style="text-align: left;" label="" for="sex">Sex : <input type="text" id="sex" name="sex"></td>
          <td style="text-align: left;" colspan="2" label="" for="patient_number">Patient Number : <input type="text" id="patient_number" name="patient_number"></td>
        </tr>
        <tr>
          <td style="text-align: left;"  colspan="5" label="" for="address">Address : <input type="text" id="address" name="address"></td>
        </tr>
      </thead>
    </table>
    </fieldset>
    <br>
    <fieldset>
    <table id="table">
  <thead>
    <tr>
      <th style="text-align: left;" colspan="6"><i>Hematology</i></th>
    </tr>
  </thead>
  <tbody style="background-color: #8cc751; color:#000;">
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
          <td>Hemoglobin</td>
          <td><input type="float" id="hemoglobin" name="hemoglobin"></td>
          <td>M 140-180 G/l<br>
          F 120-160 G/l</td>
          <td>WBC</td>
          <td><input type="float" name="wbc"></td>
          <td>5-10X10 9/l</td>
        </tr>
        <tr>
          <td>Hemotocrit</td>
          <td><input type="float" name="hematocrit"></td>
          <td>M 0.42-0.52<br>
          F O.37-0.47</td>
        </tr>
        <tr>
          <td>RBC</td>
          <td><input type="float" name="rbc"></td>
          <td>M 5.5-6.5X10/L<br>
          F 4.5-5.5X10/L</td>
          <td>Segmenter</td>
          <td><input type="float" name="segmenter"></td>
          <td>0.40-60%</td>
        </tr>
        <tr>
          <td>PLATELET COUNT</td>
          <td><input type="float" name="pcount"></td>
          <td>150-450 X 10/L</td>
          <td>Lymphocyte</td>
          <td><input type="float" name="lymphocyte"></td>
          <td>0.20-0.40%</td>
        </tr>

          <td>CLOTTING TIME</td>
          <td><input type="float" name="ctime"></td>
          <td>3-7 mins</td>
          <td>Eosinophill</td>
          <td><input type="float" name="eosinophil"></td>
          <td>0.00-0.05%</td>
        </tr>
        <tr>
          <td>BLEEDING TIME</td>
          <td><input type="float" name="bleeding"></td>
          <td>1-4 mins</td>
          <td>Monocyte</td>
          <td><input type="float" name="monocyte"></td>
          <td>0.002-0.08%</td>
        </tr>
        <tr>
          <td>BLOOD TYPE</td>
          <td><input type="text" name="btype"></td>
          <td></td>
          <td>Basophil</td>
          <td><input type="float" name="basophil"></td>
          <td>0.0-0.01%</td>
        </tr>
      </tfoot>
</table>
</fieldset>
 <p><input type="submit" name="submit" value="Submit"></p>
</form>
</body>
</html>
