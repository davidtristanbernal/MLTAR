<?php
session_start();
unset($_SESSION["user"]);
session_destroy();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
header("Location: ../user/patient_log.php");
exit;

?>
