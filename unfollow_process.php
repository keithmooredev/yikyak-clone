<?php

	require_once('includes/head.php');

	if (isset($_SESSION['username'])){

		$json_received = file_get_contents('php://input');
		$decoded_json = json_decode($json_received, true);
		$poster_username = $decoded_json['poster'];

		try {
			DB::delete('following', "follower = %s AND poster = %s", $_SESSION['username'], $poster_username);
			print 'success';
			exit;
			
		} catch(MeekroDBException $e){
			print 'dbError';
			exit;
		}

	} else {
		print 'notLoggedIn';
		exit;
	}
