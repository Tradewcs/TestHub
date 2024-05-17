<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add test</title>

    <style>
    .block {
        margin: 20px;
    }
    </style>
</head>

<body>


    <div class="block">
        <input id="test-name" type="text" placeholder="Test name"> <br> <br>

        <input id="question-name" type="text" placeholder="Quesion"> <br> <br>
        <input id="quesion-variants" type="text" placeholder="variants (space separated)"> <br> <br>
        <input id="correct-answer" type="text" placeholder="correct variant"> <br> <br>
        <button onclick="addQuesion()">Add question</button>
    </div>


    <form method="post">
        <input id="json-test" name="json-test" hidden>
        <input type="submit" name="addTest" value="Додати тест">
    </form>

    <?php
    session_start();

    include("..\\connection.php");
    include("..\\functions.php");

    $user_data = check_login($con);
    if ($user_data["role"] != "admin") {
    	header("Location: ..\\auth\\login.php");
    }

    if (array_key_exists('addTest', $_POST)) {

        $json_test = $_POST['json-test'];
        $sql = "INSERT INTO tests (test_json) VALUES ('$json_test');";
        mysqli_query($con, $sql);
        
    }


?>

    <a class="main-page-link" href="..\index.php">main page</a>

    <script src="addTest.js"></script>
</body>

</html>