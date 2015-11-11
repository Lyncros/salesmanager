/* scripts/controllers/Contacts.js */
    
(function() {

   'use strict';
    
    angular.module('salesManager').controller('Contacts', Contacts);

    function Contacts() {

        // vm is our capture variable
        var vm = this;

        vm.contactTypes = [
        	{'id': 1, 'description': 'Solicitante'}, 
        	{'id': 2, 'description': 'Cliente indirecto'}, 
        	{'id': 3, 'description': 'Cliente potencial'}, 
        	{'id': 4, 'description': 'Empleado'}, 
        	{'id': 5, 'description': 'Contacto FNC'}, 
        	{'id': 6, 'description': 'Otro'}
    	];
        
        vm.groupAreas = [
        	{'id': 1, 'description': 'Compras'}, 
        	{'id': 2, 'description': 'Gerencia'}, 
        	{'id': 3, 'description': 'Mercadeo'}, 
        	{'id': 4, 'description': 'Comercial'}, 
        	{'id': 5, 'description': 'I&D'}, 
        	{'id': 6, 'description': 'Logistica'}, 
        	{'id': 7, 'description': 'Calidad'}
    	];

        vm.propertiesWeights = [
            {'name': 'email', 'weight': 15},
            {'name': 'firstname', 'weight': 8},
            {'name': 'lastname', 'weight': 8},
            {'name': 'phone', 'weight': 2},
            {'name': 'skype', 'weight': 5},
            {'name': 'company', 'weight': 5.5},
            {'name': 'market', 'weight': 5},
            {'name': 'language', 'weight': 5},
            {'name': 'honorific', 'weight': 0.4},
            {'name': 'street', 'weight': 0.4},
            {'name': 'city', 'weight': 0.4},
            {'name': 'country', 'weight': 0.4},
            {'name': 'region', 'weight': 0.4},
            {'name': 'postalCode', 'weight': 0.4},
            {'name': 'sapCode', 'weight': 1},
            {'name': 'code10digits', 'weight': 0.4},
            {'name': 'De donde proviene el negocio', 'weight': 3.5},
            {'name': 'Nos interesa realizar alguna accion?', 'weight': 1.5},
            {'name': 'Tipo de Socio (ROL - FUNCION)', 'weight': 3.4},
            {'name': 'Segmentacion Tipo Cliente', 'weight': 3.9},
            {'name': 'Segmentacion Tipo Producto', 'weight': 2},
            {'name': 'Segmentacion Relacion FNC', 'weight': 1},
            {'name': 'Segmentacion Potencial a Futuro', 'weight': 1},
            {'name': 'Profesion', 'weight': 2.8},
            {'name': 'position', 'weight': 10},
            {'name': 'area', 'weight': 5},
            {'name': 'linkedinProfile', 'weight': 5},
            {'name': 'Nivel de educación', 'weight': 0.2},
            {'name': 'Desde hace cuanto es cliente?', 'weight': 0.2},
            {'name': 'Tarjetas de Navidad', 'weight': 0.2},
            {'name': 'Regalos de Navidad', 'weight': 0.2},
            {'name': 'newsletter', 'weight': 0.2},
            {'name': 'Boletin FNC', 'weight': 0.2},
            {'name': 'TALLA', 'weight': 0.2},
            {'name': 'ageRank', 'weight': 2.2}
        ];

        vm.contacts = [{
		      'id': 1,
		      'consolidatedCode': '#11111111',
              'code10digits': '1111111111',
		      'honorific': 'Mr.',
		      'firstname':'Mick',
		      'lastname':'Jagger',
		      'company': 'Rolling Stones S.A.',
		      'phone': '5555-1111',
		      'skype': 'mick.jagger',
		      'email': 'mick@rollingstones.com',
		      'position': '',
		      'market': 'Europe',
		      'street': '321 Abbey Road',
		      'city': 'Knebworth, London',
		      'country': 'England',
              'postalCode': '14280',
		      'language': 'English',
		      'contactType': {'id': 1, 'description': 'Solicitante'},
		      'groupArea': {'id': 1, 'description': 'Compras'},
              'linkedinProfile': 'https://ar.linkedin.com/in/mick-jagger-40446313'
		    },
		    {
		      'id': 2,
		      'consolidatedCode': '#22222222',
		      'honorific': 'Mr.',
		      'firstname':'Keith',
		      'lastname':'Richards',
		      'company': 'Rolling Stones S.A.',
		      'phone': '5555-2222',
		      'skype': 'keith.richards',
		      'email': 'keith@rollingstones.com',
		      'position': 'Lead guitar',
		      'market': 'Europe',
		      'street': '321 Abbey Road',
              'city': 'Knebworth, London',
              'country': 'England',
              'postalCode': '14280',
		      'language': 'English',
		      'contactType': {'id': 2, 'description': 'Cliente indirecto'},
		      'groupArea': {'id': 2, 'description': 'Gerencia'}
		    },
		    {
		      'id': 3,
		      'consolidatedCode': '#33333333',
		      'honorific': 'Mr.',
		      'firstname':'Charlie',
		      'lastname':'Watts',
		      'company': 'Rolling Stones S.A.',
		      'phone': '5555-3333',
		      'skype': 'charlie.watts',
		      'email': 'charlie@rollingstones.com',
		      'position': 'Drums',
		      'market': 'Europe',
		      'street': '321 Abbey Road',
              'city': 'Knebworth, London',
              'country': 'England',
              'postalCode': '14280',
		      'language': 'English',
		      'contactType': {'id': 3, 'description': 'Cliente potencial'},
		      'groupArea': {'id': 3, 'description': 'Mercadeo'}
		    },
		    {
		      'id': 4,
		      'consolidatedCode': '#44444444',
		      'honorific': 'Mr.',
		      'firstname':'Ron',
		      'lastname':'Wood',
		      'company': 'Rolling Stones S.A.',
		      'phone': '5555-4444',
		      'skype': 'ron.wood',
		      'email': 'ron@rollingstones.com',
		      'position': 'Second guitar',
		      'market': 'Europe',
		      'street': '321 Abbey Road',
              'city': 'Knebworth, London',
              'country': 'England',
              'postalCode': '14280',
		      'language': 'English',
		      'contactType': {'id': 6, 'description': 'Otro'},
		      'groupArea': {'id': 4, 'description': 'Comercial'}
		    }
	    ];


	    vm.showContactDetails = function() {
	    	return vm.contactSelected != null;
	    }

        vm.selectContact = function(contact) {
        	vm.contactSelected = contact;
        }

        vm.resetSearchKey = function() {
        	vm.searchKeys = [];
        }

        vm.updateSearchKey = function(key) {
        	vm.searchKeys = key.split(' ');
        }

        vm.resetFilters = function() {
        	vm.filterContactType = [];
        	vm.filterGroupArea = [];
        	vm.resetSearchKey();
        }

        vm.hasFilters = function() {
        	return vm.hasContactTypeFilters() || vm.hasGroupAreaFilters() || vm.hasSearchKeyFilters();
        }

        vm.hasContactTypeFilters = function() {
        	return vm.filterContactType.length > 0;
        }

        vm.hasGroupAreaFilters = function() {
        	return vm.filterGroupArea.length > 0;
        }

        vm.hasSearchKeyFilters = function() {
        	return vm.searchKeys.length > 0;
        }

        vm.updateFilterContactType = function(type) {
        	updateFilter(type, vm.filterContactType);
        }

        vm.updateFilterGroupArea = function(ga) {
        	updateFilter(ga, vm.filterGroupArea);
        }

        vm.doFilter = function(contact) {
        	if (!vm.hasFilters()) {
        		return contact;
        	}

        	var contactTypePass = !vm.hasContactTypeFilters();
        	var groupAreaPass = !vm.hasGroupAreaFilters();
        	var searchKeyPass = !vm.hasSearchKeyFilters();

    		for (var i = 0; i < vm.filterContactType.length ; i++) {
    			var type = vm.filterContactType[i];
				contactTypePass = contactTypePass || contact.contactType.id == type.id;
    		}

        	for (var i = 0; i < vm.filterGroupArea.length; i++) {
            	var ga = vm.filterGroupArea[i];
				groupAreaPass = groupAreaPass || contact.groupArea.id == ga.id;
        	}

        	for (var i = 0; i < vm.searchKeys.length; i++) {
        		var key = vm.searchKeys[i];

        		searchKeyPass = searchKeyPass || contact.firstname.indexOf(key) > -1 || 
        			contact.lastname.indexOf(key) > -1 ||
        			contact.company.indexOf(key) > -1 ||
        			contact.skype.indexOf(key) > -1 ||
        			contact.email.indexOf(key) > -1;
        	}

        	return contactTypePass && groupAreaPass && searchKeyPass ? contact : null;
        }

        vm.calculateCompletenessPercentage = function(contact) {
            var percentage = 0;


            angular.forEach(vm.propertiesWeights, function(prop, i) {
                percentage = percentage + calculateFieldWeight(contact, prop.name, prop.weight);
            });

            return Math.round(percentage) + '%';
        }

        // Initialize controller variables.- jarias
        vm.resetFilters();
    	vm.contactSelected = null;
    }

    function calculateFieldWeight(obj, field, weight) {
        return (obj[field]) ? weight : 0;
    }


    function updateFilter(obj, filterList) {
    	var i = $.inArray(obj, filterList);
        if (i > -1) {
            filterList.splice(i, 1);
        } else {
            filterList.push(obj);
        }
    }

})();