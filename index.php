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

    } else if (isset($_GET["askQuestion"]) && isset($_SESSION["user"])) {

        include("./client/askQuestion.php");

    } else if (isset($_GET["q-id"])) {

        $q_id = (int) $_GET["q-id"];
        include("./client/questionDetailsPage.php");

    } else if (isset($_GET["u-id"])) {

        include("./client/showQuestions.php");

    } else if (isset($_GET["c-id"])) {

        include("./client/showQuestions.php");

    } else if (isset($_GET["latestQuestions"])) {

        include("./client/showQuestions.php");

    } else if (isset($_GET["search"])) {

        include("./client/showQuestions.php");

    } else {

        include("./client/showQuestions.php");

    }
    ?>

</body>

</html>