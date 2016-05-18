<?php

	require_once('includes/head.php');


	if ($_POST['password'] == $_POST['password2']){
		// store a hashed password in the $password variable
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	} else {
		header('Location: /register.php?error=passwords');
		exit;
	}

	$result_un = DB::query("SELECT * FROM users WHERE username = %s", $_POST['username']);
	if ($result_un){
		header('Location: /register.php?error=username');
		exit;
	}

	$result_email = DB::query("SELECT * FROM users WHERE email = %s", $_POST['email']);
	if ($result_email){
		header('Location: /register.php?error=email');
		exit;
	}

	try {
		DB::insert('users', array(
			'realName' => $_POST['realName'],
			'username' => $_POST['username'],
			'password' => $password,
			'email' => $_POST['email']
		));

		$realName = $_POST['realName'];
		$_SESSION['username'] = $_POST['username'];
		header('Location: /index.php#mission');
	} catch(MeekroDBException $e){
		header('Location: /register.php?error=insert');
	}
