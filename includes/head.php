<?php
	
	session_start();
	require_once 'meekrodb.2.3.class.php';
	DB::$user = 'test';
	DB::$password = 'testPassword!!1';
	DB::$dbName = 'hippo';
	DB::$host = '127.0.0.1';
	DB::$error_handler = false; // since we're catching errors, don't need error handler
	DB::$throw_exception_on_error = true;
?>
