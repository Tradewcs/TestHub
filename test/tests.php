<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tests</title>

    <link rel="stylesheet" href="style.css">
    <style>
    .test-button {
        width: 150px;
        height: 30px;
    }

    #test-list,
    .main-page-link {
        margin: 10px;
        margin-left: 30px;
        margin-top: 50px;
    }
    </style>
</head>

<body>


    <?php
session_start();

include("..\\connection.php");
include("..\\functions.php");

$user_data = check_login($con);

$json_tests = get_tests_json($con);

echo "<span id=\"tests_json\" style=\"display: none;\">";
echo $json_tests;
echo "</span>";

echo "<span id=\"id_json\" style=\"display: none;\">";
echo get_tests_id($con);
echo "</span>";

?>

    <ul id="test-list"></ul>
    <div id="question-container" class="hidden">
        <h2></h2>
        <form id="answer-form">
            <ul id="options-list"></ul>
            <button type="submit">Next Question</button>
        </form>
    </div>

    <form action="writeResults.php" method="post" hidden>
        <input id="result" name="result" type="text">
        <input id="test-id" name="test-id" type=text">
        <input id="send-query" type="submit">
    </form>

    <a class="main-page-link" href="index.php">main page</a>

    <script src="showTests.js"></script>

</body>

</html>