// scripts/controllers/ContactsController.js
'use strict';

angular.module('salesManager')
    .filter('contacts', function() {
        return ContactsFilter;
    })
    .directive('tabs', TabDirective)
    .directive('pane', PaneDirective)
    .directive('booleanicon', BooleaniconDirective)
    .controller('ContactsController', ContactsController);


function ContactsController($http, contactsService, entitiesService) {

    Chart.defaults.global.tooltipTemplate = "<%=label%>: <%= Math.round(circumference / 6.283 * 100) %>% (<%=value%> hits)";

    this.contacts = [];
    this.editingContact = false;
    this.contactTypes = [];
    this.groupAreas = [];
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
    this.orderByField = '';
    this.orderByReverse = false;
    
    this.propertiesWeights = [];
    this.contactSelected = null;
    this.contactInterestsData = [];
    this.contactInterestsLabels = [];
    this.completenessPercentage = 0;
    this.nextEmptyPropertyPercentage = 0;

    var controller = this;

    contactsService.getContacts().then(onResultAssignProperty(this, 'contacts'));
    contactsService.getPropertyWeights().then(onResultAssignProperty(this, 'propertiesWeights'));
    entitiesService.getCountries().then(onResultAssignProperty(this, 'countries'));
    entitiesService.getContactTypes().then(onResultAssignProperty(this, 'contactTypes'));
    entitiesService.getGroupAreas().then(onResultAssignProperty(this, 'groupAreas'));
    entitiesService.getMarkets().then(onResultAssignProperty(this, 'markets'));
    entitiesService.getSegmentationsABC().then(onResultAssignProperty(this, 'segmentationsABC'));
    entitiesService.getSegmentationsClientType().then(onResultAssignProperty(this, 'segmentationsClientType'));
    entitiesService.getSegmentationsProductType().then(onResultAssignProperty(this, 'segmentationsProductType'));
    entitiesService.getSegmentationsFNCRelation().then(onResultAssignProperty(this, 'segmentationsFNCRelation'));
    entitiesService.getSegmentationsPotential().then(onResultAssignProperty(this, 'segmentationsPotential'));
    entitiesService.getEducationLevels().then(onResultAssignProperty(this, 'educationLevels'));
    entitiesService.getGenders().then(onResultAssignProperty(this, 'genders'));
    entitiesService.getAgeRanges().then(onResultAssignProperty(this, 'ageRanges'));
    entitiesService.getSizes().then(onResultAssignProperty(this, 'sizes'));

    this.isContactSelected = function() {
        return this.contactSelected != null;
    }

    this.isContactDetailsVisible = function() {
        return this.isContactSelected() && !this.isContactEditionVisible();
    }

    this.showContactDetails = function(contact) {
        this.hideContactEdition();
        contactsService.getContact(contact.id).then(this.onGetContactDataResult);
    }

    this.onGetContactDataResult = function(contact) {
        controller.setContactSelected(contact);
    }

    this.setContactSelected = function(contact) {
        this.contactSelected = contact;
        this.contactInterestsData = [];
        this.contactInterestsLabels = [];
        this.completenessPercentage = this.calculateCompletenessPercentage(contact);
        this.nextEmptyPropertyPercentage = this.getNextEmptyPropertyPercentage(contact);

        var controller = this;
        angular.forEach(this.contactSelected.interests, function(item, index, array) {
            controller.contactInterestsData[index] = item.hits;
            controller.contactInterestsLabels[index] = item.interest.description;
        });
    }

    this.resetContactSelected = function() {
        this.contactSelected = null;
        this.contactInterestsData = [];
        this.contactInterestsLabels = [];
        this.completenessPercentage = 0;
        this.nextEmptyPropertyPercentage = 0;
    }

    this.newContact = function() {
        this.contactSelected = {};
        this.showContactEdition();
    }

    this.showContactEdition = function() {
        this.editingContact = true;
    }

    this.isContactEditionVisible = function() {
        return this.isContactSelected() && this.editingContact;
    }

    this.hideContactEdition = function() {
        this.resetContactSelected();
        this.editingContact = false;
    }

    this.saveContactEdition = function() {
        var result = contactsService.saveContact(this.contactSelected).then(this.onSaveContactResult);
        this.editingContact = false;
    }

    this.onSaveContactResult = function(result) {
        if (result) {
            controller.setContactSelected(result);
            contactsService.getContacts().then(onResultAssignProperty(controller, 'contacts'));
        } else {
            controller.resetContactSelected();
            alert('Ocurrio un error al guardar el contacto.');
        }
    }

    this.cancelContactEdition = function() {
        this.editingContact = false;
        if (!this.contactSelected.id) {
            this.resetContactSelected();
        }
    }

    this.calculateCompletenessPercentage = function(contact) {
        var percentage = 0;

        this.propertiesWeights.forEach(function(prop, i) {
            percentage = percentage + calculateFieldWeight(contact, prop.name, prop.weight);
        });

        return Math.round(percentage);
    }

    this.getNextEmptyPropertyPercentage = function(contact) {
        var prop = null;

        for (var i = 0; prop == null && i < this.propertiesWeights.length; i++) {
            var p = this.propertiesWeights[i];
            prop = calculateFieldWeight(contact, p.name, p.weight) == 0 ? p : null;
        };

        return Math.round(prop.weight);
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

    this.orderByAZ = function() {
        this.orderByField = 'lastname';
        this.orderByReverse = false;
    }

    this.orderByZA = function() {
        this.orderByField = 'lastname';
        this.orderByReverse = true;
    }

    this.orderByRecent = function() {
        this.orderByField = 'created_at';
        this.orderByReverse = true;
    }

    this.getCssClassOrderByAZ = function() {
        return this.isOrderedByLastname() && !this.orderByReverse ? 'disabled' : '';
    }

    this.getCssClassOrderByZA = function() {
        return this.isOrderedByLastname() && this.orderByReverse ? 'disabled' : '';
    }

    this.isOrderedByLastname = function() {
        return this.orderByField == 'lastname';
    }

    this.getCssClassOrderByRecent = function() {
        return this.orderByField == 'created_at' && this.orderByReverse ? 'disabled' : '';
    }

    // Initialize controller.- jarias
    this.resetFilters();
	this.resetSearchKey();
    this.resetContactSelected();
    this.hideContactEdition();
    this.orderByAZ();
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
