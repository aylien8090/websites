<?php
$hostname = 'localhost';
$username = 'TWA_student';
$password = 'TWA_SUM23';
$database = 'electrical';

$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error) {
    die('Connection Error (' . $connection->connect_errno . ')'
        . $connection->connect_error);
}
?>
