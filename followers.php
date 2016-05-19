<?php

	require_once('includes/head.php');
	require_once('includes/header.php');

	$followers = DB::query("SELECT * FROM following WHERE follower = %s", $_SESSION['username']);
	$all_users = DB::query("SELECT * FROM following WHERE follower != %s", $_SESSION['username']);

	print_r($all_users);

?>

