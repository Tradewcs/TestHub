<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
    if ($user_data["role"] != "admin") {
    	header("Location: auth\\login.php");
    }

    $sql = "SELECT * FROM users";
    $res = $con->query($sql);

    while ($row = $res->fetch_assoc()) {
        echo "<a href='userResults.php?user_id=" . $row['user_id'] . "'><button>" . $row['user_name'] . "</button></a><br>";
    }
?>

<a href="index.php">Index</a>


</body>
</html>