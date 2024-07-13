<?php
$hostname = 'localhost';
$username = 'twa085';
$password = 'twa085pP';
$database = '247music085';

$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error) {
    die('Connection Error (' . $connection->connect_errno . ')'
        . $connection->connect_error);
}