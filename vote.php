<?php

	require_once('includes/head.php');

	$vote = $_GET['vote'];

	if ($vote == 'upvote'){
		try {
			DB::insert('votes', array(
				'post_id' => $_GET['id'],
				'vote' => 1,
				'voter' => $_GET['user']
			));
			header('Location: /index.php?vote=success');
			exit;
		} catch(MeekroDBException $e){
			header('Location: /index.php?vote=error');
			exit;
		}
	} else if ($vote == 'downvote'){
		try {
			DB::insert('votes', array(
				'post_id' => $_GET['id'],
				'vote' => -1,
				'voter' => $_GET['user']
			));
			header('Location: /index.php?vote=success');
			exit;
		} catch(MeekroDBException $e){
			header('Location: /index.php?vote=error');
			exit;
		}
	}
