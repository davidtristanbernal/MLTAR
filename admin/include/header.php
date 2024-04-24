<?php
// Start the session

// Database configuration
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

// Check if the user is logged in
if (isset($_SESSION['id'])) {
  $id = $_SESSION['id'];

  // Fetch the user's first name from the database
  $sql = "SELECT first_name FROM doctors WHERE id = $id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
  } else {
    $first_name = "Admin"; // Default value if no user found
  }
} else {
  $first_name = "Unknown"; // Default value if user is not logged in
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <!-- for-mobile-apps -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- //for-mobile-apps -->
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/font-awesome.css" rel="stylesheet"> 
  <link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
  <link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
  <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
  <link rel="stylesheet" href="css/jquery-ui.css" />
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
  <!--fonts-->
  <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <!-- FONT AWESOME -->
  <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="fontawesome/css/brands.css" rel="stylesheet">
  <link href="fontawesome/css/solid.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAAAAAAAMzEvAJZOBgCJgkgAgopOAGNgWwBXU08ApGU0AFLBcwA04ooAQeCeAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFBQAAAAAAAAAAAAAAAAAAAQEAAAAAAAAAAAYBAQEBAQEBAQEBAQEBAAAGAgICAgICAgICAgICBgAABgICAgIKBwIJAgICAgYAAAYCAgICCQQCCQICAgIGAAAGCgoJAgkJAgkJCQkKBgAABgcHAgkJCQIJAgICAgYAAAYCBwIJAgIJCAICAgIGAAAGAgcCCQICCQMCAgcCAQAABgIHAgICAgkHAgICAgYAAAYCBwcHBwIKBwICAgIGAAAGAgICAgICAgICAgICBgAABQEBAQEBAQEBAQEBAQUAAAAAAAAAAAAAAAAAAAAAAP//AAD+fwAA/n8AAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAP//AAA=" rel="icon" type="image/x-icon" />
</head>
<body>
  <div class="header" style="font-style: italic;">
    <h1>
      <span class="northope">Northope <i class="fas fa-microscope" style="margin-left: 10px;"></i></span>
      <span class="subheading">Diagnostic Center</span>
    </h1>
    <button onclick="openUserProfile()">
      <a href="user_profile.php" style="text-decoration: none;">
        <i class="fa fa-user-circle"></i> <!-- Admin -->
        <?php echo $first_name; ?>
      </a>
    </button>
  </div>
</body>
</html>
