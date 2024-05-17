<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();

    include("..\\connection.php");
    include("..\\functions.php");

    $user_data = check_login($con);

    var_dump($user_data);

    $user_id = $user_data["user_id"];
    $test_id = $_POST["test-id"];
    $test_result = $_POST["result"];

    $sql = "INSERT INTO test_results (user_id, test_id, test_result) VALUES ('$user_id', '$test_id', '$test_result');";
    $con->query($sql);

    
	header("Location: tests.php");
}
?>