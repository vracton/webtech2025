<?php

$databaseHost = 'localhost';
$databaseUsername = 'root';
$databasePassword = '';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>