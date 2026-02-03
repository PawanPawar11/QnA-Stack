<?php
include("../config/db.php");
session_start();

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $user = $conn->prepare("INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`) VALUES(NULL, '$username', '$email', '$password', '$address')");

    $result = $user->execute();

    if ($result) {
        echo "User Registered Successfully!";
        $_SESSION["user"] = ["username" => $username, "email" => $email];
    } else {
        echo "User Registered Successfully!";
    }
}

?>