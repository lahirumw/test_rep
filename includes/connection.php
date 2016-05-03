<?php
require("constants.php");

// 1. Create a database connection
// 2. Select a database to use 

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (!$connection) {
	die("Database connection failed: " . mysql_error());
}
?>