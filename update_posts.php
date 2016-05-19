<?php

	require_once('includes/head.php');

	try {
		$query = "SELECT posts.id, posts.username, posts.body, posts.timestamp, COALESCE(SUM(votes.vote),0) AS vote_total FROM posts posts LEFT JOIN votes votes ON posts.id = votes.pid
			GROUP BY posts.id ORDER BY posts.timestamp DESC;";

		$result = DB::query($query);
		if ($result){
			print json_encode($result, JSON_NUMERIC_CHECK);
		}
	} catch (MeekroDBException $e){
		print "error";
	}