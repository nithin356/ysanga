<?php
session_start();
unset($_SESSION['ec_ad_id']);
session_destroy();
header("Location: ../login");
exit;
?>