<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "qna_stack";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

echo "DB File got attached! </br>";
