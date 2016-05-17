<?php

	require_once('includes/head.php');
?>


<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1>Registration</h1>
			<h5>Choose a username and password</h5>
		</div>
	</div>
	<div class="row">
		<h5 class="error-message text-center">PHP Error Message Goes Here</h5>
	</div>
	<div class="row">
		<div class="col-sm-12 text-center">
			<form action="accounts.php?action=register" method="post" class="form-horizontal">
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
				<div class="form-group">
					<label for="pwField2" class="col-sm-4 control-label"></label>
					<div class="col-sm-4">
						<input type="password" id="pwField2" name="password2" placeholder="Repeat the password" minlength="4" maxlength="20" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="emailField" class="col-sm-4 control-label">Email:</label>
					<div class="col-sm-4">
						<input type="email" id="emailField" name="email" placeholder="Your email address" minlength="4" maxlength="50" class="form-control">
					</div>
				</div>
				<div class="button-holder">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>