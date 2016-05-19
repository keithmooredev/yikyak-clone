<?php

	require_once('includes/head.php');

	if (!isset($_SESSION['username'])){
		print "notLoggedIn";
		exit;
	}

	$json_received = file_get_contents('php://input');

	$decoded_json = json_decode($json_received, true);

	$vote_total = "SELECT SUM(vote) AS vote_total FROM votes WHERE pid=" . $decoded_json['pid'];

	$did_vote = DB::query("SELECT * FROM votes WHERE username = %s AND pid = %i", $_SESSION['username'], $decoded_json['pid']);

	if (DB::count() !== 0){
		print "alreadyVoted";
		exit;
	}

	try {
		DB::insert('votes', array(
			'pid' => $decoded_json['pid'],
			'vote' => $decoded_json['vote'],
			'voter' => $_SESSION['username']
		));

		$result = DB::query($vote_total);
	
		print json_encode($result[0]['vote_total'], JSON_NUMERIC_CHECK);

		} catch(MeekroDBException $e){
		print json_encode("error");
	}
