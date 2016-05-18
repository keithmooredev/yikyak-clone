<?php

	require_once('includes/head.php');

	if (!isset($_SESSION['username'])){
		header('Location: /login.php');
		exit;
	}

	try {
		DB::insert('posts', array(
			'username' => $_SESSION['username'],
			'body' => $_POST['body']
		));

		header('Location: /index.php?post=success#posts');
		exit;
	} catch(MeekroDBException $e){
		header('Location: /index.php?post=failure#posts');
		exit;
	}
