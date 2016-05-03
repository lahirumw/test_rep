<?php

	function get_locations() {
		global $connection;
		$query = "SELECT * FROM location ";
		$subject_set = mysqli_query($connection, $query);
		if (!$subject_set) {
			die("Database query failed: " . mysql_error());
		}
		return $subject_set;
	}
	
	function get_vehicals() {
		global $connection;
		$query = "SELECT * FROM vehical_types";
		$subject_set = mysqli_query($connection, $query);
		if (!$subject_set) {
			die("Database query failed: " . mysql_error());
		}
		return $subject_set;
	}
	
	function get_myAd() {
		global $connection;
		$query = "SELECT * FROM sel_vehical";
		$subject_set = mysqli_query($connection, $query);
		if (!$subject_set) {
			die("Database query failed: " . mysql_error());
		}
		return $subject_set;
	}
	
	function get_vehi_parts() {
		global $connection;
		$query = "SELECT * FROM vehi_parts";
		$subject_set = mysqli_query($connection, $query);
		if (!$subject_set) {
			die("Database query failed: " . mysql_error());
		}
		return $subject_set;
	}
	
	function get_myAd_search($search_main, $cond, $loc, $vehi, $item) {
		global $connection;
		$query = "SELECT * FROM sel_vehical where (sel_vehical like '%{$search_main}%' or sel_part like '%{$search_main}%')
					and sel_cond like '%{$cond}%' and sel_location like '%{$loc}%' and sel_vehical like '%{$vehi}%' 
					and sel_part like '%{$item}%'";
		$subject_set = mysqli_query($connection, $query);
		if (!$subject_set) {
			die("Database query failed: " . mysql_error());
		}
		return $subject_set;
	}
	
?>