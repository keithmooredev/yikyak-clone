<?php

	require_once('includes/head.php');
	require_once('includes/header.php');

	$following_arr = DB::queryOneColumn('poster', "SELECT poster FROM following WHERE follower = %s", $_SESSION['username']);

	$following_str = implode("','", $following_arr);

	$not_following = DB::queryOneColumn('username', "SELECT * FROM following WHERE username != %s AND username NOT IN ('" . $following_str . "')", $_SESSION['username']);

?>

<div class="container" ng-controller="mainController">

	<div class="row">
		<div class="col-sm-12">


		</div>
	</div>
</div>