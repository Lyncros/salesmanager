/* scripts/services/EntitiesService.js */
'use strict';

angular.module('salesManager')
    .factory('entitiesService', EntitiesService);

function EntitiesService($resource) {
    
	return {
        restCountries: $resource('index.php/api/countries'),
        restContactTypes: $resource('index.php/api/contactTypes'),
        restGroupAreas: $resource('index.php/api/groupAreas'),
        restMarkets: $resource('index.php/api/markets'),
        restSegmentationsABC: $resource('index.php/api/segmentationsABC'),
        restSegmentationsClientType: $resource('index.php/api/segmentationsClientType'),
        restSegmentationsProductType: $resource('index.php/api/segmentationsProductType'),
        restSegmentationsFNCRelation: $resource('index.php/api/segmentationsFNCRelation'),
        restSegmentationsPotential: $resource('index.php/api/segmentationsPotential'),
        restEducationLevels: $resource('index.php/api/educationLevels'),
        restGenders: $resource('index.php/api/genders'),
        restAgeRanges: $resource('index.php/api/ageRanges'),
        restSizes: $resource('index.php/api/sizes'),
        restHonorifics: $resource('index.php/api/honorifics'),
        restLanguages: $resource('index.php/api/languages'),
        restCustomerSince: $resource('index.php/api/customerSince'),
        restBusinessOrigins: $resource('index.php/api/businessOrigins'),
    
		getCountries: function() {
            return queryAPI(this.restCountries);
        },
        getContactTypes: function() {
            return queryAPI(this.restContactTypes);
        },
            getGroupAreas: function() {
            return queryAPI(this.restGroupAreas);
        },
        getMarkets: function() {
            return queryAPI(this.restMarkets);
        },
        getSegmentationsABC: function() {
            return queryAPI(this.restSegmentationsABC);
        },
        getSegmentationsClientType: function() {
            return queryAPI(this.restSegmentationsClientType);
        },
        getSegmentationsProductType: function() {
            return queryAPI(this.restSegmentationsProductType);
        },
        getSegmentationsFNCRelation: function() {
            return queryAPI(this.restSegmentationsFNCRelation);
        },
        getSegmentationsPotential: function() {
            return queryAPI(this.restSegmentationsPotential);
        },
        getEducationLevels: function() {
            return queryAPI(this.restEducationLevels);
        },
        getGenders: function() {
            return queryAPI(this.restGenders);
        },
        getAgeRanges: function() {
            return queryAPI(this.restAgeRanges);
        },
        getSizes: function() {
            return queryAPI(this.restSizes);
        },
        getHonorifics: function() {
            return queryAPI(this.restHonorifics);
        },
        getLanguages: function() {
            return queryAPI(this.restLanguages);
        },
        getCustomerSince: function() {
            return queryAPI(this.restCustomerSince);
        },
        getBusinessOrigins: function() {
            return queryAPI(this.restBusinessOrigins);
        },
	}

}