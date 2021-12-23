<?php
include_once 'connect.php';
session_start();
if (isset($_SESSION['yn_aid'])) {
    $globaladminid = $_SESSION['yn_aid'];
} else {
    header("Location: ./login.php");
}
