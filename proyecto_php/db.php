<?php

$host = "db";
$user = "root";
$password = "root";
$database = "biblioteca";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error de connexió: " . $conn->connect_error);
}

?>