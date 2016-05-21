angular.module('myApp', []).controller(
	'mainController', function($scope, $http) {

	function getPosts(){

		$http.get('update_posts.php').then(function successCallback(response) {
			$scope.posts = response.data;
		}, function errorCallback(response){
			console.log(response);
		});
	};

	function getFollowing(){
		// if the user is logged in, get all posters that the current user is following
		$http.get('get_following.php').then(function successCallback(response) {
			if (response.data !== 'notLoggedIn') {
				$scope.following = [];
				for (var i=0; i<response.data.length; i++) {
					$scope.following.push(response.data[i].poster);
					console.log($scope.following);
				}
			} // end if
		}, function errorCallback(response){
			console.log(response);
		});
	};

	$scope.doVote = function(clickEvent, voteDirection) {

		$http.post('vote_process.php', {
			vote: voteDirection,
			pid: clickEvent.target.parentElement.id
		}).then(function successCallback(response){
			if (response.data == "notLoggedIn"){
				alert("You must be logged in to vote.");
			}
			else if (response.data == "alreadyVotedUp"){
				alert("You already voted up.");
			}
			else if (response.data == "alreadyVotedDown"){
				alert("You already voted down.");
			}
			else if (response.data == "success"){
				getPosts();
			}
		}, function errorCallback(response){
			console.log(response);
		});
	};

	$scope.follow = function(clickEvent){

		$http.post('follow_process.php', {
			poster: clickEvent.currentTarget.id
		}).then(function successCallback(response){
			if (response.data == 'success'){
				// update the following array
				getFollowing();
			} else {
				alert("You must be logged in to follow a poster.");
			}
		}, function errorCallback(response){
			console.log(response);
		});
	};

	$scope.unfollow = function(clickEvent){

		$http.post('unfollow_process.php', {
			poster: clickEvent.currentTarget.previousElementSibling.id
		}).then(function successCallback(response){
			if (response.data == 'success'){
				// update the following array
				getFollowing();
			}
		}, function errorCallback(response){
			console.log(response);
		});
	};

	getPosts();
	getFollowing();
})
