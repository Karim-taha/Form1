<?php

$databaseHost = 'localhost';
$databaseName = 'full-mark';
$databaseUsername = 'root';
$databasePassword = '';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);


if (!$conn) {
    // echo "not connected ..";
    die("Connection Failed" . mysqli_error($conn));
} else {
    echo "connected";
}
