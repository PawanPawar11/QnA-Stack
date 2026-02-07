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

        $user_id = $conn->insert_id;

        $_SESSION["user"] = [
            "id" => $user_id,
            "username" => $username,
            "email" => $email
        ];

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

        $_SESSION["user"] = [
            "id" => $user["id"],
            "username" => $user["username"],
            "email" => $user["email"]
        ];

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
} else if (isset($_POST["askQuestion"])) {

    if (!isset($_SESSION["user"])) {
        header("Location: /QnA%20Stack");
        exit;
    }

    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $category_id = (int) $_POST["category"];
    $user_id = (int) $_SESSION["user"]["id"];

    if (empty($title) || empty($description) || empty($category_id)) {
        echo "All fields are required!";
        exit;
    }

    $stmt = $conn->prepare(
        "INSERT INTO questions (title, description, category_id, user_id) 
        VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param("ssii", $title, $description, $category_id, $user_id);

    if ($stmt->execute()) {
        header("location: /QnA%20Stack");
        exit;
    }
} else if (isset($_POST["answerQuestion"])) {

    if (!isset($_SESSION["user"])) {
        header("Location: /QnA%20Stack/?login=true");
        exit;
    }

    $question_id = (int) $_POST["q_id"];
    $user_id = (int) $_SESSION["user"]["id"];
    $answer = trim($_POST["answer"]);

    if (empty($answer)) {
        echo "Answer is required in order to post!";
        exit;
    }

    $stmt = $conn->prepare(
        "INSERT INTO answers (question_id, user_id, answer) 
         VALUES (?, ?, ?)"
    );

    $stmt->bind_param("iis", $question_id, $user_id, $answer);

    if ($stmt->execute()) {
        header("Location: /QnA%20Stack/?q-id=" . $question_id);
        exit;
    }
}
?>