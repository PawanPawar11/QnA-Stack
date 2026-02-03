<?php
include("../config/db.php");
session_start();

if (isset($_POST['signup'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];

    $stmt = $conn->prepare(
        "INSERT INTO users (username, email, password, address) 
        VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param("ssss", $username, $email, $password, $address);

    if ($stmt->execute()) {
        $_SESSION["user"] = ["username" => $username, "email" => $email];

        header("location: /QnA%20Stack");
        exit;
    }
} else if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user"] = $user;
        header("Location:  /QnA%20Stack");
        exit;
    } else {
        echo "Invalid Credentials!";
    }
} else if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    header("Location: /QnA%20Stack");
    exit;
}
?>