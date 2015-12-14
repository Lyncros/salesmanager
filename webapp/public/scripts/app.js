/* scripts/app.js */
'use strict';

angular
	.module('salesManager', ['ngResource', 'ngAnimate', 'ngRoute', 'ngCookies', 'ui.bootstrap', 'chart.js'])

	.config(['$routeProvider', function ($routeProvider) {

	    $routeProvider
	        .when('/login', {
	            controller: 'LoginController',
	            templateUrl: 'views/login.html'
	        })

	        .when('/', {
	            controller: 'ContactsController as vm',
	            templateUrl: 'views/contacts.html'
	        })

	        .otherwise({ redirectTo: '/login' });
	}])

	.run(['$rootScope', '$location', '$cookies', '$http',
	    function ($rootScope, $location, $cookies, $http) {

	    	// keep user logged in after page refresh
	        $rootScope.globals = $cookies.getObject('globals') || {};
	        if ($rootScope.globals.currentUser) {
	            $http.defaults.headers.common['Authorization'] = 'Basic ' + $rootScope.globals.currentUser.authdata; 
	        }

	        $rootScope.$on('$locationChangeStart', function (event, next, current) {
	            // redirect to login page if not logged in
	            if ($location.path() !== '/login' && !$rootScope.globals.currentUser) {
	                $location.path('/login');
	            }
	        });

	        $rootScope.logout = function() {
		        $rootScope.globals = {};
		        $cookies.putObject('globals', {});
		        $location.path('/');
		    };

		    $rootScope.isAdmin = function() {
		    	return $rootScope.globals && 
		    		$rootScope.globals.currentUser && 
		    		$rootScope.globals.currentUser.role == 1000;
		    }

		    $rootScope.getUserId = function() {
		    	return $rootScope.globals.currentUser.id;
		    }
	    }
	]);
