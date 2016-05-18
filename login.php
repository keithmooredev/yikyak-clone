<?php

	require_once('includes/head.php');
	require_once('includes/header.php');
?>


<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h1>Log In</h1>
			<h5>Please enter your username and password</h5>
		</div>
	</div>
	<div class="row">
		<?php 
			if ($_GET['error'] == 'true'){
				print "<h5>The username or password entered is not correct.</h5>";
		} ?>
	</div>
	<div class="row">
		<div class="col-sm-12 text-center">
			<form action="login_process.php" method="post" class="form-horizontal">
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

<?php require_once('includes/footer.php'); ?>
