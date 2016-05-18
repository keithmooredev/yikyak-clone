<?php
	// some error reporting stuff
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);
	
	// get the header and navbar in here
	require_once('includes/head.php');
	require_once('includes/header.php');
?>


<div class="splash">
	<div class="splash-inner">
		<a href="#mission"><h1>Save the Rocks</h1></a>
	</div>
</div>

<div class="container">
	<div class="content-wrapper">
		<div id="mission" class="mission">
			<h2>Our Mission</h2>
			<p>We are a society dedicated to saving the rocks. Each day, thousands of rocks are blasted into oblivion by anthropogenic activities. If we don't act soon, there will be no more rocks left.</p>
			<p>We have been active for over 3 years and embrace every chance we get to save these majestic accumulations of minerals and sediment. This site is a means for you to share your rock saving activity with other rock lovers. Please sign up and tell us a bit about the last rock you saved.</p>
		</div>
		<div id="posts" class="posts-wrapper">
			<h2>Recent Posts</h2>
			<p>Posts go here...</p>
			<div class="post">
				<div class="row">
					<div class="col-sm-11">
						<h4>Test Post</h4>
						<p>This is a post.</p>
					</div>
					<div class="col-sm-1 votes-wrapper">
						<a href="#" class="votes"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
						<div class="votes">0</div>
						<a href="#" class="votes"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>