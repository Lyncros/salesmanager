/* scripts/app.js */
'use strict';

angular
	.module('salesManager', ['ngResource', 'ui.bootstrap', 'ngAnimate', 'ui.router', 'chart.js'])
	.config(function($stateProvider, $urlRouterProvider) {

        $urlRouterProvider.otherwise('/contacts');
        
        $stateProvider
            .state('contacts', {
                url: '/contacts',
                templateUrl: '/salesmanager/views/contacts.html',
                controller: 'ContactsController as vm'
            });
    });
