<?php

	require_once('includes/head.php');

	if (isset($_SESSION['username'])){

		$json_received = file_get_contents('php://input');
		$decoded_json = json_decode($json_received, true);
		$poster_username = $decoded_json['poster'];

		$result = DB::query("SELECT poster FROM following WHERE follower = %s",
		$_SESSION['username'], $poster_username);

		print json_encode($result);
		exit;

	} else {
		print 'notLoggedIn';
		exit;
	}
