<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);
if ($user_data["role"] != "admin") {
    header("Location: login.php");
}

$user_id = $_GET['user_id'];

$user_query = "SELECT * FROM users WHERE user_id = '$user_id'";
$user_result = mysqli_query($con, $user_query);
$user_row = mysqli_fetch_assoc($user_result);

$test_query = "SELECT * FROM test_results WHERE user_id = '$user_id'";
$test_result = mysqli_query($con, $test_query);

echo "<h2>Test Results for " . $user_row['user_name'] . "</h2>";

if (mysqli_num_rows($test_result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Test ID</th><th>Test Result</th></tr>";
    while ($row = mysqli_fetch_assoc($test_result)) {
        echo "<tr><td>" . $row['test_id'] . "</td><td>" . $row['test_result'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No test results found for this user.";
}

echo "<a href=\"showAllUsers.php\">Users</a>";
?>

