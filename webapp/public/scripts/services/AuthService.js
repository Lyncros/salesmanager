// scripts/services/AuthService.js
'use strict';

angular.module('salesManager')
    .factory('authService', AuthService);

function AuthService($resource) {

	return {
		restLogin: $resource('api/login', {}, {
			login: {
				method: 'POST',
				isArray: false
			},
		}),

		login: function(credentials) {
			return this.restLogin.login(credentials).$promise;
		}
	};

}
