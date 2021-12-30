<?php
session_start();
unset($_SESSION['yn_uid']);
session_destroy();
header("Location: ../../../");
exit;
?>