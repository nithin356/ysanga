<?php
static $connection;
if (!isset($connection)) {
    $config = parse_ini_file("config.ini");
    $connection = mysqli_connect($config['localhost'], $config['username'], $config['password'], $config['dbname'], 3306);
}
if ($connection === false) {
    return mysqli_connect_error();
}
return $connection;
