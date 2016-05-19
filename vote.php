<?php

	require_once('includes/head.php');

	$vote = $_GET['vote'];

	if ($vote == 'upvote'){

		$query = "UPDATE posts SET votes = votes+1 WHERE id=" . $_GET['id']; 
		try {
			DB::insert('votes', array(
				'post_id' => $_GET['id'],
				'vote' => 1,
				'voter' => $_GET['user']
			));
			DB::query($query);
			header('Location: http://kdavidmoore.com/savetherocks/index.php?vote=success#posts');
			exit;
		} catch(MeekroDBException $e){
			header('Location: http://kdavidmoore.com/savetherocks/index.php?vote=error#posts');
			exit;
		}
	} else if ($vote == 'downvote'){

		$query = "UPDATE posts SET votes = votes-1 WHERE id=" . $_GET['id'];
		try {
			DB::insert('votes', array(
				'post_id' => $_GET['id'],
				'vote' => -1,
				'voter' => $_GET['user']
			));
			DB::query($query);
			header('Location: http://kdavidmoore.com/savetherocks/index.php?vote=success#posts');
			exit;
		} catch(MeekroDBException $e){
			header('Location: http://kdavidmoore.com/savetherocks/index.php?vote=error#posts');
			exit;
		}
	}
