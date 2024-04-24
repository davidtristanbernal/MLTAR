<?php
session_start();
?>
<?php
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
  <title>Hematology Form Display</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAAAAAAMzEvAJZOBgCJgkgAgopOAGNgWwBXU08ApGU0AFLBcwA04ooAQeCeAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFBQAAAAAAAAAAAAAAAAAAAQEAAAAAAAAAAAYBAQEBAQEBAQEBAQEBAAAGAgICAgICAgICAgICBgAABgICAgIKBwIJAgICAgYAAAYCAgICCQQCCQICAgIGAAAGCgoJAgkJAgkJCQkKBgAABgcHAgkJCQIJAgICAgYAAAYCBwIJAgIJCAICAgIGAAAGAgcCCQICCQMCAgcCAQAABgIHAgICAgkHAgICAgYAAAYCBwcHBwIKBwICAgIGAAAGAgICAgICAgICAgICBgAABQEBAQEBAQEBAQEBAQUAAAAAAAAAAAAAAAAAAAAAAP//AAD+fwAA/n8AAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAP//AAA=" rel="icon" type="image/x-icon" />
  <style>
    @media print {
      .no-print {
        display: none !important;
      }
    }
  </style>
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
  <form>
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
          <td><?php echo $hemoglobin; ?></td>
          <td>M 140-180 G/l<br>
          F 120-160 G/l</td>
          <td>WBC</td>
          <td><?php echo $wbc; ?></td>
          <td>5-10X10 9/l</td>
        </tr>
        <tr>
          <td>Hematocrit</td>
          <td><?php echo $hematocrit; ?></td>
          <td>M 0.42-0.52<br>
          F O.37-0.47</td>
        </tr>
        <tr>
          <td>RBC</td>
          <td><?php echo $rbc; ?></td>
          <td>M 5.5-6.5X10/L<br>
          F 4.5-5.5X10/L</td>
          <td>Segmenter</td>
          <td><?php echo $segmenter; ?></td>
          <td>0.40-60%</td>
        </tr>
        <tr>
          <td>PLATELET COUNT</td>
          <td><?php echo $pcount; ?></td>
          <td>150-450 X 10/L</td>
          <td>Lymphocyte</td>
          <td><?php echo $lymphocyte; ?></td>
          <td>0.20-0.40%</td>
        </tr>

          <td>CLOTTING TIME</td>
          <td><?php echo $ctime; ?></td>
          <td>3-7 mins</td>
          <td>Eosinophil</td>
          <td><?php echo $eosinophil; ?></td>
          <td>0.00-0.05%</td>
        </tr>
        <tr>
          <td>BLEEDING TIME</td>
          <td><?php echo $bleeding; ?></td>
          <td>1-4 mins</td>
          <td>Monocyte</td>
          <td><?php echo $monocyte; ?></td>
          <td>0.002-0.08%</td>
        </tr>
        <tr>
          <td>BLOOD TYPE</td>
          <td><?php echo $btype; ?></td>
          <td></td>
          <td>Basophil</td>
          <td><?php echo $basophil; ?></td>
          <td>0.0-0.01%</td>
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
