angular.module('myApp', []).controller(
	'mainController', function($scope, $http){

	function getPosts(){
		$http.get('update_posts.php').then(function successCallback(response){
			$scope.posts = response.data;
		}, function errorCallback(response){
			console.log(response);
		});
	};

	function getFollowing(){
		// on login, get all posters that the current user is following
		$http.get('get_following.php').then(function successCallback(response){
			$scope.following = [];
			for (var i=0; i<response.data.length; i++) {
				$scope.following.push(response.data[i].poster);
				console.log($scope.following);
			}
		}, function errorCallback(response){
			console.log(response);
		});
	};

	$scope.doVote = function(clickEvent, voteDirection){
		var myParentElementId = clickEvent.target.parentElement.id;
		$http.post('vote_process.php', {
			vote: voteDirection,
			pid: myParentElementId
		}).then(function successCallback(response){
			if (response.data == "notLoggedIn"){
				$scope.message = "You must be logged in to vote.";
			}
			else if (response.data == "alreadyVotedUp"){
				$scope.message = "You already voted up.";
			}
			else if (response.data == "alreadyVotedDown"){
				$scope.message = "You already voted down.";
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
