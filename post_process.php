<?php

	require_once('includes/head.php');

	if (!isset($_SESSION['username'])){
		header('Location: /login.php');
		exit;
	}

	try {
		DB::insert('posts', array(
			'username' => $_SESSION['username'],
			'postText' => $_POST['post_text']
		));

		header('Location: /index.php?post=success');
		exit;
	} catch(MeekroDBException $e){
		header('Location: /index.php?post=failure');
		exit;
	}
