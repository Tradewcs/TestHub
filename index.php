<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>

<head>
    <title>My website</title>
</head>

<style>

    a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #3498db;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        transition: background-color 0.3s ease;

        margin: 10px;
    }

    a:hover {
        background-color: #2980b9;
    }

    a:focus {
        outline: none;
    }

    a:active {
        transform: translateY(2px);
    }

    .logout {
        background-color: red;
    }

    .logout:hover {
        background-color: #880808;
    }
</style>

<body>

    Hello, <?php echo $user_data['user_name']; ?>
    
    <br>

    <div id="tests">
        <a href="test\tests.php">Tests</a>
        <br>
        <?php
			if ($user_data['role'] == 'admin') {

				echo "<a id=\"add-test\" href=\"test\\addTest.php\">Add new test</a>";
                echo "<br>";
                echo "<a href=\"showAllUsers.php\">Users</a>";
            }

		?>

        
    </div>
    
    <a class="logout" href="auth\logout.php">Logout</a>


    <script>

    </script>
</body>

</html>