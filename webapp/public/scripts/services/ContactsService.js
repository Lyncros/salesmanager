// scripts/services/ContactsService.js
'use strict';

angular.module('salesManager')
    .factory('contactsService', ContactsService);

function ContactsService($resource, $rootScope) {

	return {
		restContacts: $resource('index.php/api/contacts/:id', {
			filter: '@filter'
		}, {
			getContact: {
				isArray: false
			},
			update: {
				method: 'PUT'
			}
		}),
		restPropertyWeights: $resource('index.php/api/propertyWeights'),

		getContact: function(id) {
			return this.restContacts.getContact({id}).$promise.then(onSuccess, onError);
		},
		getContacts: function() {
			return queryAPI(this.restContacts);
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
	    }
	};
}