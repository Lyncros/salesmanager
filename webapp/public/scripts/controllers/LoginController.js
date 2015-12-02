// scripts/controllers/LoginController.js

angular.module('salesManager')
	.controller('LoginController', LoginController);

function LoginController($state) {
	
	this.login = function() {

        var credentials = {
            email: this.email,
            password: this.password
        }
        
        // Use Satellizer's $auth service to login
        //authService.login(credentials).then(function(data) {

            // If login is successful, redirect to the users state
            $state.go('contacts', {});
        //});
    }

}
