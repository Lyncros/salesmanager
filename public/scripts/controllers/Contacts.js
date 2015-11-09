/* scripts/controllers/Contacts.js */
    
(function() {

   'use strict';
    
    angular.module('salesManager').controller('Contacts', Contacts);

    function Contacts() {

        // vm is our capture variable
        var vm = this;

        vm.contactTypes = ['Solicitante', 'Cliente indirecto', 'Cliente potencial', 'Empleado', 'Contacto FNC', 'Otro'];
        
        vm.groupAreas = ['Compras', 'Gerencia', 'Mercadeo', 'Comercial', 'I&D', 'Logistica', 'Calidad'];

        vm.contacts = [{
		      "id":1,
		      "sapCode": "#11111111",
		      "honorific": "Mr.",
		      "firstname":"Mick",
		      "lastname":"Jagger",
		      "company": "Rolling Stones S.A.",
		      "phone": "5555-1111",
		      "skype": "mick.jagger",
		      "email": "mick@rollingstones.com",
		      "position": "Vocals",
		      "market": "Europe",
		      "address": "321 Abbey Road",
		      "city": "Knebworth, London 14280",
		      "country": "England",
		      "language": "English",
		      "contactType": "Solicitante"
		    },
		    {
		      "id":2,
		      "sapCode": "#22222222",
		      "honorific": "Mr.",
		      "firstname":"Keith",
		      "lastname":"Richards",
		      "company": "Rolling Stones S.A.",
		      "phone": "5555-2222",
		      "skype": "keith.richards",
		      "email": "keith@rollingstones.com",
		      "position": "Lead guitar",
		      "market": "Europe",
		      "address": "321 Abbey Road",
		      "city": "Knebworth, London 14280",
		      "country": "England",
		      "language": "English",
		      "contactType": "Cliente indirecto"
		    },
		    {
		      "id":3,
		      "sapCode": "#33333333",
		      "honorific": "Mr.",
		      "firstname":"Charlie",
		      "lastname":"Watts",
		      "company": "Rolling Stones S.A.",
		      "phone": "5555-",
		      "skype": "charlie.watts",
		      "email": "charlie@rollingstones.com",
		      "position": "Drums",
		      "market": "Europe",
		      "address": "321 Abbey Road",
		      "city": "Knebworth, London 14280",
		      "country": "England",
		      "language": "English",
		      "contactType": "Cliente potencial"
		    },
		    {
		      "id":4,
		      "sapCode": "#44444444",
		      "honorific": "Mr.",
		      "firstname":"Ron",
		      "lastname":"Wood",
		      "company": "Rolling Stones S.A.",
		      "phone": "5555-4444",
		      "skype": "ron.wood",
		      "email": "ron@rollingstones.com",
		      "position": "Second guitar",
		      "market": "Europe",
		      "address": "321 Abbey Road",
		      "city": "Knebworth, London 14280",
		      "country": "England",
		      "language": "English",
		      "contactType": "Otro"
		    }
	    ];

	    vm.contactSelected = null;

	    vm.showContactDetails = function() {
	    	return vm.contactSelected != null;
	    }

        vm.selectContact = function(contact) {
        	vm.contactSelected = contact;
        }
    }
})();