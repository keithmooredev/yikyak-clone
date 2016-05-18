<?php

	require_once('includes/head.php');
		
	try {
		$result = DB::query("SELECT * FROM users WHERE username = %s", $_POST['username']);
		$hash = $result[0]['password'];
		$passwordVerify = password_verify($_POST['password'], $hash);
		if ($passwordVerify){
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['uid'] = $result[0]['id'];
			header('Location: /index.php#mission');
			exit;
		} else {
			// if php gets to this line, then the passwords didn't match
			header('Location: /login.php?error=nomatch');
			exit;
		}
	} catch(MeekroDBException $e){
		// the user doesn't exist
		header('Location: /login.php?error=nouser');
		exit;
	}
