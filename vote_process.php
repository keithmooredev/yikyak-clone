<?php

	require_once('includes/head.php');

	if (!isset($_SESSION['username'])){
		print "notLoggedIn";
		exit;
	}

	$json_received = file_get_contents('php://input');

	$decoded_json = json_decode($json_received, true);

	$did_vote = DB::query("SELECT * FROM votes WHERE voter = %s AND pid = %i ORDER BY timestamp DESC;", $_SESSION['username'], $decoded_json['pid']);

	if (DB::count() !== 0){
		if ($decoded_json['vote'] == 1 && $did_vote[0]['vote'] == 1){
			print "alreadyVotedUp";
			exit;
		} else if ($decoded_json['vote'] == -1 && $did_vote[0]['vote'] == (-1)){
			print "alreadyVotedDown";
			exit;
		} else {
			// update the vote in the database
			DB::query("UPDATE votes SET vote = vote + %i WHERE voter = %s and pid = %i;", $decoded_json['vote'], $_SESSION['username'], $decoded_json['pid']);
			print "success";
			exit;
		}
	} else {
		// insert the vote in the database
		DB::insert('votes', array(
			'pid' => $decoded_json['pid'],
			'vote' => $decoded_json['vote'],
			'voter' => $_SESSION['username']
		));
		print "success";
		exit;
	}
