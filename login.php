<?php

	require_once('includes/head.php');
?>


<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1>Log In</h1>
			<h5>Enter your username and password</h5>
		</div>
	</div>
	<div class="row">
		<h5 class="error-message text-center">PHP Error Message Goes Here</h5>
	</div>
	<div class="row">
		<div class="col-sm-12 text-center">
			<form action="accounts.php?action=login" method="post" class="form-horizontal">
				<div class="form-group">
					<label for="unField" class="col-sm-4 control-label">Username:</label>
					<div class="col-sm-4">
						<input type="text" id="unField" name="username" placeholder="Your name" minlength="4" maxlength="50" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="pwField" class="col-sm-4 control-label">Password:</label>
					<div class="col-sm-4">
						<input type="password" id="pwField" name="password" placeholder="Choose a password" minlength="4" maxlength="20" class="form-control">
					</div>
				</div>
				<div class="button-holder">
					<button type="submit" class="btn btn-success">Log In</button>
				</div>
			</form>
		</div>
	</div>
</div>