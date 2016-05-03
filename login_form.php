<?php require_once("includes/connection.php"); ?>

<?php
	$email = $_POST['email'];
	echo "<p>{$email}</p>";
	$password = $_POST['password'];
	echo "<p>{$password}</p>";
?>

<?php
	$query = "SELECT * ";
	$query .= "FROM reg_user ";
	$query .= "WHERE email='" . $email ."' ";
	$query .= "AND password='" . $password ."' ";
	echo "{$query}";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("Database query failed: " . mysql_error());
	}
		// REMEMBER:
		// if no rows are returned, fetch_array will return false
	if ($subject = mysqli_fetch_array($result)) {
		session_start();
		$_SESSION["log_name"] = $subject["name"];
		$_SESSION["log_email"] = $subject["email"];
		header('Location: index.php');
	} else {
		header('Location:login.php');
	}
?>

<?php require_once("includes/conn_close.php"); ?>