<?php require_once("includes/connection.php"); ?>
<?php
	session_start();
?>
<?php
	$optradio_sel = $_POST['optradio_sel'];
	echo "<p>{$optradio_sel}</p>";
	$sel_vehi = $_POST['sel_vehi'];
	echo "<p>{$sel_vehi}</p>";
	$sel_loc = $_POST['sel_loc'];
	echo "<p>{$sel_loc}</p>";
	$sel_part = $_POST['sel_part'];
	echo $sel_part;
	$sel_price = $_POST['sel_price'];
	echo $sel_price;
	$sel_phn = $_POST['sel_phn'];
	echo $sel_phn;
	$sel_email = $_SESSION["log_email"];
	$sel_name = $_SESSION["log_name"];
?>

<?php
	$query = "INSERT INTO sel_vehical (
				sel_cond, sel_vehical, sel_location, sel_part, sel_price, sel_user_email, sel_user_name, sel_phn
			) VALUES (
				'{$optradio_sel}', '{$sel_vehi}', '{$sel_loc}', '{$sel_part}', '{$sel_price}', '{$sel_email}', '{$sel_name}', '{$sel_phn}'
			)";
	$result = mysqli_query($connection, $query);
	echo "<p>{$result}</p>";
	if ($result) {
		// Success!
		
		header('Location: post_add.php');
	} else {
		// Display error message.
		echo "<p>Subject creation failed.</p>";
		echo "<p>" . mysql_error() . "</p>";
	}
?>

<?php require_once("includes/conn_close.php"); ?>