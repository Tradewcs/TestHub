<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	header("Location: auth\login.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		$text .= rand(0,9);
	}

	return $text;
}

function get_tests_json($con) {
	$sql = "SELECT test_json FROM tests";
	$res = $con->query($sql);

	$tests_arr = [];
	while ($row = $res->fetch_assoc()) {
		$tests_arr[] = $row["test_json"];
	}

	return "[" . implode(", ", $tests_arr) . "]";
}

function get_tests_id($con) {
	$sql = "SELECT * FROM tests";
	$res = $con->query($sql);

	$id_arr = [];
	while ($row = $res->fetch_assoc()) {
		$id_arr[] = $row["id"];
	}

	return "[" . implode(", ", $id_arr) . "]";
}