<?php
session_start();
unset($_SESSION['yn_aid']);
session_destroy();
header("Location: ../login.php");
exit;
?>