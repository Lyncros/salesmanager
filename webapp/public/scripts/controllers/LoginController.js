// scripts/controllers/LoginController.js

angular.module('salesManager')
	.controller('LoginController', LoginController);

function LoginController($rootScope, $scope, $cookies, $location, authService) {

    $scope.credentials = {
        email: '',
        password: ''
    };

    $scope.hasError = function (input) {
        return input.$dirty && input.$error.required;
    }

    $scope.login = function(credentials) {
        $scope.dataLoading = true;

        authService.login(credentials).then(function(response) {
            $rootScope.globals = {
                currentUser: response.user
            };
            $cookies.putObject('globals', $rootScope.globals);
            $location.path('/');
        }, function() {
            $scope.dataLoading = false;
            $scope.error = 'Usuario o contraseña inválidos';
        });
    }

}
