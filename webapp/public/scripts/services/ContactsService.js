// scripts/services/ContactsService.js
'use strict';

angular.module('salesManager')
    .factory('contactsService', ContactsService)

function ContactsService($resource, $rootScope, $http) {

	return {
		restContacts: $resource('api/contacts/:id', {
			filter: '@filter'
		}, {
			getContact: {
				isArray: false
			},
			update: {
				method: 'PUT'
			},
		}),
		restPropertyWeights: $resource('api/propertyWeights'),
		restContactListCompleteness: $resource('api/contactListCompleteness', {}, {
			query: {
				isArray: false
			}
		}),

		getContact: function(id) {
			return this.restContacts.getContact({id}).$promise.then(onSuccess, onError);
		},
		getContacts: function() {
			var params = this.buildParams();
			return queryAPI(this.restContacts, params);
		},
		getPropertyWeights : function () {
	        return queryAPI(this.restPropertyWeights);
	    },
		saveContact: function(contact) {
	    	if (contact.id) {
	    		return this.restContacts.update({id: contact.id}, contact).$promise.then(onSuccess, onError);
	    	} else {
		    	return this.restContacts.save(contact).$promise.then(onSuccess, onError);
	    	}
	    },
	    getContactListCompleteness: function() {
	    	var params = this.buildParams();
	    	return this.restContactListCompleteness.query(params).$promise.then(onSuccess, onError);
	    },
	    buildParams: function() {
	    	var params = {};
			if (! $rootScope.isAdmin()) {
				params = {
					id_responsible: $rootScope.getUser().id
				};
			}
			return params;
	    }
	};
}