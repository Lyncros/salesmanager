// scripts/controllers/ContactsController.js
'use strict';

angular.module('salesManager')
    .filter('contacts', function() {
        return ContactsFilter;
    })
    .directive('tabs', TabDirective)
    .directive('pane', PaneDirective)
    .controller('ContactsController', ContactsController);


function ContactsController($http) {

    this.contactTypes = [];
    this.groupAreas = [];
    this.propertiesWeights = [];
    this.contacts = [];
    this.countries = [];
    this.markets = [];
    this.segmentationsABC = [];
    this.segmentationsClientType = [];
    this.segmentationsProductType = [];
    this.segmentationsFNCRelation = [];
    this.segmentationsPotential = [];
    this.educationLevels = [];
    this.genders = [];
    this.ageRanges = [];
    this.sizes = [];

    this.getContacts = function () {
        var controller = this;

        $http.get('index.php/api/contacts').
            success(function(data, status, headers, config) {
                controller.contacts = data;
            }).
            error(function(data, status, headers, config) {
                console.error('Error getting contacts!');
            });
    };

    this.getPropertyWeights = function() {
        var controller = this;

        $http.get('index.php/api/propertyWeights').
            success(function(data, status, headers, config) {
                controller.propertiesWeights = data;
            }).
            error(function(data, status, headers, config) {
                console.error('Error getting property weights!');
            });
    };

    this.getCountries = function() {
        var controller = this;

        $http.get('index.php/api/countries').
            success(function(data, status, headers, config) {
                controller.countries = data;
            }).
            error(function(data, status, headers, config) {
                console.error('Error getting countries!');
            });
    };

    this.getContactTypes = function() {
        var controller = this;

        $http.get('index.php/api/contactTypes').
            success(function(data, status, headers, config) {
                controller.contactTypes = data;
            }).
            error(function(data, status, headers, config) {
                console.error('Error getting contact types!');
            });
    };

    this.getGroupAreas = function() {
        var controller = this;

        $http.get('index.php/api/groupAreas').
            success(function(data, status, headers, config) {
                controller.groupAreas = data;
            }).
            error(function(data, status, headers, config) {
                console.error('Error getting group areas!');
            });
    };

    this.getMarkets = function() {
        var controller = this;

        $http.get('index.php/api/markets').
            success(function(data, status, headers, config) {
                controller.markets = data;
            }).
            error(function(data, status, headers, config) {
                console.error('Error getting markets!');
            });
    };

    this.getSegmentationsABC = function() {
        var controller = this;

        $http.get('index.php/api/segmentationsABC').
            success(function(data, status, headers, config) {
                controller.segmentationsABC = data;
            }).
            error(function(data, status, headers, config) {
                console.error('Error getting segmentations ABC!');
            });
    };

    this.getSegmentationsClientType = function() {
        var controller = this;

        $http.get('index.php/api/segmentationsClientType').
            success(function(data, status, headers, config) {
                controller.segmentationsClientType = data;
            }).
            error(function(data, status, headers, config) {
                console.error('Error getting segmentations Client Type!');
            });
    };

    this.getSegmentationsProductType = function() {
        var controller = this;

        $http.get('index.php/api/segmentationsProductType').
            success(function(data, status, headers, config) {
                controller.segmentationsProductType = data;
            }).
            error(function(data, status, headers, config) {
                console.error('Error getting segmentations Product Type!');
            });
    };

    this.getSegmentationsFNCRelation = function() {
        var controller = this;

        $http.get('index.php/api/segmentationsFNCRelation').
            success(function(data, status, headers, config) {
                controller.segmentationsFNCRelation = data;
            }).
            error(function(data, status, headers, config) {
                console.error('Error getting segmentations FNC relation!');
            });
    };

    this.getSegmentationsPotential = function() {
        var controller = this;

        $http.get('index.php/api/segmentationsPotential').
            success(function(data, status, headers, config) {
                controller.segmentationsPotential = data;
            }).
            error(function(data, status, headers, config) {
                console.error('Error getting segmentations potential!');
            });
    };

    this.getEducationLevels = function() {
        var controller = this;

        $http.get('index.php/api/educationLevels').
            success(function(data, status, headers, config) {
                controller.educationLevels = data;
            }).
            error(function(data, status, headers, config) {
                console.error('Error getting education levels!');
            });
    };

    this.getGenders = function() {
        var controller = this;

        $http.get('index.php/api/genders').
            success(function(data, status, headers, config) {
                controller.genders = data;
            }).
            error(function(data, status, headers, config) {
                console.error('Error getting genders!');
            });
    };

    this.getAgeRanges = function() {
        var controller = this;

        $http.get('index.php/api/ageRanges').
            success(function(data, status, headers, config) {
                controller.ageRanges = data;
            }).
            error(function(data, status, headers, config) {
                console.error('Error getting age ranges!');
            });
    };

    this.getSizes = function() {
        var controller = this;

        $http.get('index.php/api/sizes').
            success(function(data, status, headers, config) {
                controller.sizes = data;
            }).
            error(function(data, status, headers, config) {
                console.error('Error getting sizes!');
            });
    };

    this.isContactDetailsVisible = function() {
    	return this.contactSelected != null && !this.isContactEditionVisible();
    }

    this.showContactDetails = function(contact) {
        this.hideContactEdition();
        this.contactSelected = contact;
    }

    this.resetContactSelected = function() {
        this.contactSelected = null;
    }

    this.newContact = function() {
        this.contactSelected = {};
        this.showContactEdition();
    }

    this.showContactEdition = function() {
        this.editingContact = true;
    }

    this.isContactEditionVisible = function() {
        return this.contactSelected != null && this.editingContact;
    }

    this.hideContactEdition = function() {
        this.resetContactSelected();
        this.editingContact = false;
    }

    this.saveContactEdition = function() {
        if (this.contactSelected) {
            this.contacts.push(this.contactSelected);
        }
        this.hideContactEdition();
    }

    this.cancelContactEdition = function() {
        this.hideContactEdition();
    }

    this.resetSearchKey = function() {
    	this.searchKeys = [];
    }

    this.updateSearchKey = function(key) {
        if (key) {
    	    this.searchKeys = key.split(' ');
            this.resetContactSelected();
        }
    }

    this.resetFilters = function() {
    	this.contactTypeFilters = [];
    	this.groupAreaFilters = [];
    	this.resetSearchKey();
    }

    this.hasFilters = function() {
    	return this.hasContactTypeFilters() || this.hasGroupAreaFilters() || this.hasSearchKeyFilters();
    }

    this.hasContactTypeFilters = function() {
    	return this.contactTypeFilters.length > 0;
    }

    this.hasGroupAreaFilters = function() {
    	return this.groupAreaFilters.length > 0;
    }

    this.hasSearchKeyFilters = function() {
    	return this.searchKeys.length > 0;
    }

    this.updateFilterContactType = function(type) {
    	updateFilter(type, this.contactTypeFilters);
        this.resetContactSelected();
    }

    this.updateFilterGroupArea = function(ga) {
    	updateFilter(ga, this.groupAreaFilters);
        this.resetContactSelected();
    }

    this.isCompletenessBarVisible = function() {
        return this.contactSelected && this.contactSelected.contact_type &&
            this.contactSelected.contact_type.completeness_measure;
    }

    this.calculateCompletenessPercentage = function(contact) {
        var percentage = 0;

        angular.forEach(this.propertiesWeights, function(prop, i) {
            percentage = percentage + calculateFieldWeight(contact, prop.name, prop.weight);
        });

        return Math.round(percentage) + '%';
    }

    // Initialize controller.- jarias
    this.resetFilters();
	this.resetSearchKey();
    this.resetContactSelected();
    this.hideContactEdition();
    this.getPropertyWeights();
    this.getCountries();
    this.getContactTypes();
    this.getGroupAreas();
    this.getMarkets();
    this.getSegmentationsABC();
    this.getSegmentationsClientType();
    this.getSegmentationsProductType();
    this.getSegmentationsFNCRelation();
    this.getSegmentationsPotential();
    this.getEducationLevels();
    this.getGenders();
    this.getAgeRanges();
    this.getSizes();
    this.getContacts();
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
