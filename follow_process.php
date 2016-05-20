<?php

	require_once('includes/head.php');

	if (isset($_SESSION['username'])){

		$json_received = file_get_contents('php://input');
		$decoded_json = json_decode($json_received, true);
		$poster_username = $decoded_json['poster'];

		DB::insert('following', array(
			'follower' => $_SESSION['username'],
			'poster' => $poster_username
		));

		print 'success';
	} else {
		print 'notLoggedIn';
		exit;
	}
