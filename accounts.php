<?php

if (isset($_GET['action'])){
	$acct_action = $_GET['action'];

	if ($acct_action == 'register'){
		$username = $_POST['username'];
		if ($_POST['password'] == $_POST['password2']){
			$password = $_POST['password'];
		} else {
			$errorMessage = "The passwords do not match.";
		}

	} else if ($acct_action == 'login'){


	}
}
