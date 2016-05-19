angular.module('myApp', []).controller(
	'mainController', function($scope, $http){

	function getPosts(){
		$http.get('posts_info.php').then(function successCallback(response){
		console.log(response.data);
		$scope.posts = response.data;
		}, function errorCallback(response){
			console.log(response);
		});
	}

	$scope.doVote = function(clickEvent, voteDirection){
		var myParentElementId = clickEvent.target.parentElement.id;
		$http.post('vote_process.php', {
			vote: voteDirection,
			pid: myParentElementId
		}).then(function successCallback(response){
			if (response.data == "notLoggedIn"){
				$scope.message = "You must be logged in to vote.";
			}
			getPosts();
		}, function errorCallback(response){
			console.log(response);
		});
	};

	getPosts();
})