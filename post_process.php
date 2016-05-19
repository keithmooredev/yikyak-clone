<?php

	require_once('includes/head.php');

	if (!isset($_SESSION['username'])){
		header('Location: http://kdavidmoore.com/savetherocks/login.php');
		exit;
	}

	try {
		DB::insert('posts', array(
			'username' => $_SESSION['username'],
			'body' => $_POST['body']
		));

		header('Location: http://kdavidmoore.com/savetherocks/index.php?post=success#posts');
		exit;
	} catch(MeekroDBException $e){
		header('Location: http://kdavidmoore.com/savetherocks/index.php?post=failure#posts');
		exit;
	}
