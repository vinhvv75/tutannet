tutannet = angular.module('tutannet', ['ngRoute', 'ngSanitize', 'ngResource']);

//Config the route
tutannet.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {
	
	$routeProvider
	.when('/', {
		templateUrl: myLocalized.partials + 'main.html',
		controller: 'Main'
	})
	.when('/tin-tuc-phat-su', {
		templateUrl: myLocalized.partials + 'home-news.html',
		controller: 'Home_News'
	})
	.when('/bai-doc/:slug', {
		templateUrl: myLocalized.partials + 'content.html',
		controller: 'Content'
	})
	.otherwise({
		redirectTo: '/'
	});
	
	$locationProvider.html5Mode(true);
}]); // config the route

tutannet.controller( 'Main', function( $scope, $http, $routeParams ) {

	// Load posts from the WordPress API
	$http({
		method: 'GET',
		url: getBaseUrl() + 'wp-json/posts/',
		params: {
			'filter[posts_per_page]' : 10,
			'filter[status]' : 'publish'
		},
	}).
	success( function( data, status, headers, config ) {
		$scope.posts = data;
	}).
	error(function(data, status, headers, config) {});

});

// *** HOME NEWS ***//
tutannet.controller( 'Home_News', function( $scope, $http, $routeParams ) {

	// Load posts from the WordPress API
	$http({
		method: 'GET',
		url: getBaseUrl() + 'wp-json/wp/v2/posts/',
		params: {
			'filter[posts_per_page]' : 10,
			'filter[status]' : 'publish',
			'filter[category_name]' : 'tin-tuc-phat-su'
		},
	}).
	success( function( data, status, headers, config ) {
		$scope.posts = data;
		console.log($scope.posts);
		
	}).
	error(function(data, status, headers, config) {});
	
});

//Content controller
tutannet.controller('Content', ['$scope', '$http', '$routeParams', function($scope, $http, $routeParams) {
	$http.get(getBaseUrl() + 'wp-json/wp/v2/posts/?filter[name]=' + $routeParams.slug).success(function(res){
		$scope.post = res[0];
	});	
}]); // controller Content

function getBaseUrl() {
    var re = new RegExp(/^.*\//);
    return re.exec(window.location.href);
}



