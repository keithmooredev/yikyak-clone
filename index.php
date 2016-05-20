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
		<a href="#mission"><h1>Talk about rocks</h1></a>
	</div>
</div>

<div class="container">
	<div class="content-wrapper">
		<div id="mission" class="mission">
			<h2>Our Mission</h2>
			<p>We are a society dedicated to bringing rock lovers together for the advancement of geoscience. Tell us about some cool rocks you saw recently.</p>
		</div>
		<div id="posts" class="posts-wrapper">
			<h2>Recent Posts</h2>
			<h1 id="add-post"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></h1>
			<div id="new-post-wrapper">
				<?php if(isset($_SESSION['username'])): ?>
					<form action="post_process.php" method="post">
						<div class="form-group">
							<textarea id="post-text" class="form-control" name="body" placeholder="Type your post here"></textarea>
						</div>
						<button type="submit" class="btn btn-default">Post</button>
					</form>
				<?php else: ?>
					<h4>You must be logged in to make a new post.</h4>
				<?php endif; ?>
			</div>
	
			<div class="post" ng-repeat="post in posts track by $index">
				<div class="row">
					<div class="col-sm-11">
						<h4>{{post.body}}</h4>
						<p>Posted: {{post.timestamp}} by {{post.username}}</p>
						<p id="{{post.username}}" class="follow" ng-click="follow($event)"><em>follow</em></p>
					</div>
					<div class="col-sm-1 votes-wrapper" id="{{post.id}}">
						<span ng-click="doVote($event, 1)" class="votes change-vote glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
						<div class="votes">{{post.vote_total}}</div>
						<span ng-click="doVote($event, -1)" class="votes change-vote glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
					</div>
				</div>
			</div> <!-- ./ng-repeat -->

		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	
	$.localScroll();

	$('#add-post').click(function(){
		$('#new-post-wrapper').toggle();
	});
	
});
</script>

<?php require_once('includes/footer.php'); ?>
