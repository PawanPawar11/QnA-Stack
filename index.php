<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QnA Stack</title>
    <?php include("./client/commonFiles.php") ?>
</head>

<body>
    <?php
    session_start();
    include("./client/headers.php");

    if (isset($_GET['signup']) && !isset($_SESSION["user"])) {

        include("./client/signupForm.php");

    } else if (isset($_GET['login']) && !isset($_SESSION["user"])) {

        include("./client/loginForm.php");

    } else {

        echo "<h3 class='text-center mt-5'>Welcome to QnA Stack</h3>";
    }
    ?>
</body>


</html>