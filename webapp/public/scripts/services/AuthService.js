// scripts/services/AuthService.js
'use strict';

angular.module('salesManager')
    .factory('authService', AuthService);

function AuthService($resource) {

	return {
		login: function(credentials) {
			return {};
		}
	};

}
