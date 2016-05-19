<?php

	require_once('includes/head.php');
	session_destroy();
	require_once('includes/header.php');
	
	print '<div class="container">'.
		'<div class="row">'.
		'<div class="col-sm-6">'.
		'<h4>You have been logged out. Thank you for supporting our cause!</h4>'.
		'</div></div></div>';
	
	require_once('includes/footer.php');
