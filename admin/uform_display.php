<?php

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

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Data | Urinalysis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAAAAAAMzEvAJZOBgCJgkgAgopOAGNgWwBXU08ApGU0AFLBcwA04ooAQeCeAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFBQAAAAAAAAAAAAAAAAAAAQEAAAAAAAAAAAYBAQEBAQEBAQEBAQEBAAAGAgICAgICAgICAgICBgAABgICAgIKBwIJAgICAgYAAAYCAgICCQQCCQICAgIGAAAGCgoJAgkJAgkJCQkKBgAABgcHAgkJCQIJAgICAgYAAAYCBwIJAgIJCAICAgIGAAAGAgcCCQICCQMCAgcCAQAABgIHAgICAgkHAgICAgYAAAYCBwcHBwIKBwICAgIGAAAGAgICAgICAgICAgICBgAABQEBAQEBAQEBAQEBAQUAAAAAAAAAAAAAAAAAAAAAAP//AAD+fwAA/n8AAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAP//AAA=" rel="icon" type="image/x-icon" />
    <style>
        @media print {
            .print-button {
                display: none;   
            }
        }
    </style>
</head>
<body>
<div class="header" style="font-style: italic;">
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
    </div>
    <br>
    <?php
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
    ?>
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
      <td><?php echo $color; ?></td>
      <td>Specific Gravity</td>
      <td><?php echo $gravity; ?></td>
      <td>Mucus Threads</td>
      <td><?php echo $mucus; ?></td>
    </tr>
    <tr>
      <td>Appearance</td>
      <td><?php echo $appearance; ?></td>
      <td>Pus Cells</td>
      <td><?php echo $pcells; ?></td>
      <td>Bacteria</td>
      <td><?php echo $bacteria; ?></td>
    </tr>
    <tr>
      <td>Albumin</td>
      <td><?php echo $albumin; ?></td>
      <td>Red Cells</td>
      <td><?php echo $rcells; ?></td>
      <td>Cast</td>
      <td><?php echo $cast; ?></td>
    </tr>
    <tr>
      <td>Glucose</td>
      <td><?php echo $glucose; ?></td>
      <td>Epithelial Cells</td>
      <td><?php echo $ecells; ?></td>
      <td>Pregnancy Tests</td>
      <td><?php echo $ptest; ?></td>
    </tr>
    <tr>
      <td>pH</td>
      <td><?php echo $ph; ?></td>
      <td>Amorphous Urates / Phosphates</td>
      <td><?php echo $aup; ?></td>
      <td>Others</td>
      <td><?php echo $other; ?></td>
    </tr>
  </tfoot>
</table>
</fieldset>
</form>
<div class="no-print">
    <button onclick="window.print()"><i class="fas fa-print"></i> Print</button>
  </div>
</body>
</html>
