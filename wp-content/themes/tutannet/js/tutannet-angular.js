tutannet = angular.module('tutannet', ['ngSanitize', 'ngResource' , 'ui.router', 'infinite-scroll']);

//Config the route
tutannet.config(['$stateProvider', '$urlRouterProvider' , '$locationProvider', function($stateProvider, $urlRouterProvider, $locationProvider) {

	$locationProvider.hashPrefix('!').html5Mode(true);
	$urlRouterProvider.otherwise('/');
	
	$stateProvider
	.state('home', {
		url: '/',
		templateUrl: myLocalized.partials + 'home.html',
		controller: 'Home'
	})
	.state('home-news', {
		url: '/tin-tuc-phat-su',
		templateUrl: myLocalized.partials + 'home-news.html',
		controller: 'Home_News'
	})
	.state('bai-doc', {
		url: '/bai-doc/:slug',
		templateUrl: myLocalized.partials + 'content.html',
		controller: 'Content'
	});
	
}]); // config the route

'use strict';

tutannet.factory('postRetrieve', PostRetrieve);

PostRetrieve.$inject = ['$q', '$http'];

function PostRetrieve($q, $http) {
    var data;

    var service = {
        getData: getData
    };

    return service;

    //////////////////////////////////////

    function getData(cat_name) {
        if (!data) {
            return $http({
            	cache: true,
    			method: 'GET',
    			url: getBaseUrl() + 'wp-json/wp/v2/posts/',
    			params: {
    				'filter[posts_per_page]' : 10,
    				'filter[status]' : 'publish',
    				'filter[category_name]' : cat_name
    			},
            }).then(function(data){
                this.data = data;
                return data;
            })
        }
        else {
            var deferrer = $q.defer();
            deferrer.resolve(data);
            return deferrer.promise;
        }
    }
}


tutannet.controller( 'Home', function( $scope, $http, postRetrieve, $filter ) {
 	postRetrieve.getData().then(function(data){
	    $scope.posts = data.data;
	    console.log($scope.posts);
	    }, function(err){
	});
});

// *** HOME NEWS ***//
tutannet.controller( 'Home_News', function( $scope, $http, postRetrieve ) {
	postRetrieve.getData('tin-tuc-phat-su').then(function(data){
	    $scope.posts = data.data;
	    console.log($scope.posts);
	}, function(err){

	});
});

//Content controller
tutannet.controller('Content', ['$scope', '$http', '$stateParams', function($scope, $http, $stateParams) {
	$http.get(getBaseUrl() + 'wp-json/wp/v2/posts/?filter[name]=' + $stateParams.slug).success(function(res){
		$scope.post = res[0];
	});	
}]); // controller Content



function getBaseUrl() {
    var re = new RegExp(/^.*\//);
    return re.exec(window.location.href);
}



