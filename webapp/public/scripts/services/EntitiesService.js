/* scripts/services/EntitiesService.js */
'use strict';

angular.module('salesManager')
    .factory('entitiesService', EntitiesService);

function EntitiesService($resource) {
    
	return {
        restCountries: $resource('api/countries'),
        restContactTypes: $resource('api/contactTypes'),
        restGroupAreas: $resource('api/groupAreas'),
        restMarkets: $resource('api/markets'),
        restSegmentationsABC: $resource('api/segmentationsABC'),
        restSegmentationsClientType: $resource('api/segmentationsClientType'),
        restSegmentationsProductType: $resource('api/segmentationsProductType'),
        restSegmentationsFNCRelation: $resource('api/segmentationsFNCRelation'),
        restSegmentationsPotential: $resource('api/segmentationsPotential'),
        restEducationLevels: $resource('api/educationLevels'),
        restGenders: $resource('api/genders'),
        restAgeRanges: $resource('api/ageRanges'),
        restSizes: $resource('api/sizes'),
        restHonorifics: $resource('api/honorifics'),
        restLanguages: $resource('api/languages'),
        restCustomerSince: $resource('api/customerSince'),
        restBusinessOrigins: $resource('api/businessOrigins'),
        restUsers: $resource('api/users'),
    
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
        getUsers: function() {
            return queryAPI(this.restUsers);
        },
	}

}