<?php 
session_start();
include('./include/header.php');?>

<title>Patients | Test Forms</title>  

<div class="wrapper">
  <div class="sidebar">
    <ul>
      <li><a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
      <li><a href="test_results.php" ><i class="fas fa-file-image-o"></i> Test Results</a></li>
      <li><a href="form.php" class="active"><i class="fas fa-file-word-o"></i> Forms</a></li>
      <li><a href="appointment.php"><i class="fas fa-calendar-check"></i> Appointment</a></li>
      <li><a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a></li>
      <li><a href="patient.php"><i class="fa fa-users"></i> Patients</a></li>
      <li><a href="admin_profile.php"><i class="fa fa-user-circle"></i> Profile</a></li>
      <li><a href="../admin/admin_log.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
    </ul>
  </div>

  <div class="content">
  <button class="toggle-sidebar-btn"> <i class="fas fa-bars fa-2x"></i></button>
    <h2>Doctor | Test Form  </h2>

    <div class="dashboard-section">
    <div class="box-container">
  <div class="box" style="background-color: #CD853F;">
    <a href="hform.php"><i class="fas fa-vial fa-3x"></i></a>
    <p>Hematology</p>
  </div>
  <div class="box" style="background-color: #708090;">
    <a href="uform.php"><i class="fas fa-flask fa-3x"></i></a>
    <p>Urinalysis</p>
  </div>
  <div class="box" style="background-color: #008080;">
    <a href="bform.php"><i class="fas fa-tint fa-3x" style="color:darkred;"></i></a>
    <p>Blood Chemistry /Immunology</p>
  </div>
</div>
</div>
</div>
</div>
</body>
  <?php include('./include/footer.php')?>

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
</html>