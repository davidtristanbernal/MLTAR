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

// Prepare and bind the insert statement
$stmt = $conn->prepare("INSERT INTO urinalysis (name, date, age, sex, patient_number, address,color, gravity, mucus, appearance, pcells, bacteria, albumin, rcells, cast, glucose, ecells, ptest, ph, aup, other) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssdssdssssdsss",$name, $date, $age, $sex, $patient_number, $address, $color, $gravity, $mucus, $appearance, $pcells, $bacteria, $albumin, $rcells, $cast, $glucose, $ecells, $ptest, $ph, $aup, $other);

// Get the form data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST['name'];
  $date = $_POST['date'];
  $age = $_POST['age'];
  $sex = $_POST['sex'];
  $patient_number = $_POST['patient_number'];
  $address = $_POST['address'];
  $color = $_POST['color'];
  $gravity = $_POST['gravity'];
  $mucus = $_POST['mucus'];
  $appearance = $_POST['appearance'];
  $pcells = $_POST['pcells'];
  $bacteria = $_POST['bacteria'];
  $albumin = $_POST['albumin'];
  $rcells = $_POST['rcells'];
  $cast = $_POST['cast'];
  $glucose = $_POST['glucose'];
  $ecells = $_POST['ecells'];
  $ptest = $_POST['ptest'];
  $ph = $_POST['ph'];
  $aup = $_POST['aup'];
  $other = $_POST['other'];

    // Execute the insert statement
    $stmt->execute();

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();

    // Redirect back to the form after successful submission
    header("Location: uform_display.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Form | Urinalysis</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAAAAAAMzEvAJZOBgCJgkgAgopOAGNgWwBXU08ApGU0AFLBcwA04ooAQeCeAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFBQAAAAAAAAAAAAAAAAAAAQEAAAAAAAAAAAYBAQEBAQEBAQEBAQEBAAAGAgICAgICAgICAgICBgAABgICAgIKBwIJAgICAgYAAAYCAgICCQQCCQICAgIGAAAGCgoJAgkJAgkJCQkKBgAABgcHAgkJCQIJAgICAgYAAAYCBwIJAgIJCAICAgIGAAAGAgcCCQICCQMCAgcCAQAABgIHAgICAgkHAgICAgYAAAYCBwcHBwIKBwICAgIGAAAGAgICAgICAgICAgICBgAABQEBAQEBAQEBAQEBAQUAAAAAAAAAAAAAAAAAAAAAAP//AAD+fwAA/n8AAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAP//AAA=" rel="icon" type="image/x-icon" />
  <head>
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
    <form action="uform_display.php" method="POST">
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
      <th style="text-align: left;" colspan="6"><i>URINALYSIS</i></th>
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
      <td><input type="text" id="color" name="color"></td>
      <td>Specific Gravity</td>
      <td><input type="float" id="gravity" name="gravity"></td>
      <td>Mucus Threads</td>
      <td><input type="text" id="mucus" name="mucus"></td>
    </tr>
    <tr>
      <td>Appearance</td>
      <td><input type="text" id="appearance" name="appearance"></td>
      <td>Pus Cells</td>
      <td><input type="float" id="pcells" name="pcells"></td>
      <td>Bacteria</td>
      <td><input type="text" id="bacteria" name="bacteria"></td>
    </tr>
    <tr>
      <td>Albumin</td>
      <td><input type="text" id="albumin" name="albumin"></td>
      <td>Red Cells</td>
      <td><input type="float" id="rcells" name="rcells"></td>
      <td>Cast</td>
      <td><input type="text" id="cast" name="cast"></td>
    </tr>
    <tr>
      <td>Glucose</td>
      <td><input type="text" id="glucose" name="glucose"></td>
      <td>Epithelial Cells</td>
      <td><input type="text" id="ecells" name="ecells"></td>
      <td>Pregnancy Tests</td>
      <td><input type="text" id="ptest" name="ptest"></td>
    </tr>
    <tr>
      <td>pH</td>
      <td><input type="float" id="ph" name="ph"></td>
      <td>Amorphous Urates / Phosphates</td>
      <td><input type="text" id="aup" name="aup"></td>
      <td>Others</td>
      <td><input type="text" id="other" name="other"></td>
    </tr>
  </tfoot>
</table>
</fieldset>
 <p><input type="submit" name="submit" value="Submit"></p>
</form>
</body>
</html>
