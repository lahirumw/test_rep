<?php require_once("includes/connection.php"); ?>

<?php
	$user_name = $_POST['user_name'];
	echo "<p>{$user_name}</p>";
	$user_email = $_POST['user_email'];
	echo "<p>{$user_email}</p>";
	$user_phone = $_POST['user_phone'];
	echo "<p>{$user_phone}</p>";
	$user_password = $_POST['user_password'];
	echo $user_password;
?>

<?php
	$query = "INSERT INTO reg_user (
				email, name, phone, password
			) VALUES (
				'{$user_email}', '{$user_name}', '{$user_phone}', '{$user_password}'
			)";
			echo "<p>{$user_name}</p>";
	$result = mysqli_query($connection, $query);
	echo "<p>{$user_name} {$result}</p>";
	if ($result) {
		// Success!
		echo "<p>saved</p>";
		$suc_val="Success";
		header('Location: register.php');
	} else {
		// Display error message.
		echo "<p>Subject creation has failed.</p>";
		echo "<p>" . mysql_error() . "</p>";
	}
?>

<?php require_once("includes/conn_close.php"); ?>