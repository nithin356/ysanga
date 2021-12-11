<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

static $connection;
if (!isset($connection)) {
    $config = parse_ini_file("config.ini");
    $connection = mysqli_connect($config['localhost'], $config['username'], $config['password'], $config['dbname'], 3306);
}
if ($connection === false) {
    return mysqli_connect_error();
}
return $connection;
