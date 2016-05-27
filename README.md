# Yik Yak Clone: Rock Talk

Share your thoughts about your favorite rocks.

## Features
* PHP app that allows the user to log in or register, saving their username as a session variable
* Session variable is used to track whether the user is logged in; if you aren't logged in, you cannot post, vote, or follow
* New user account info is saved to a 'users' table in a MySQL database
* New messages are saved to a 'posts' table
* Users that you follow are saved to a 'following' table
* MeekroDB is used to send queries to MySQL, protecting against SQL injection
* AngularJS controller sends http requests to PHP scripts, populating index.php with posts and followers

## In Progress
* Separating the AngularJS front-end from the PHP back-end; the front-end still depends on PHP for some functionality
* When alerting the user that you must be logged in to follow or vote -- change this to a less obtrusive message than window.alert()

## [Demo here](http://rocks.kdavidmoore.com)

[I learned this at DigitalCrafts](http://digitalcrafts.com)
