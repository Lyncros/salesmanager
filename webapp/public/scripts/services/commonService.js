/* scripts/services/commonService.js */

function onResultAssignProperty(obj, prop) {
	return function(results) {
        obj[prop] = results;
    }
}

function onSuccess(results) {
	return results;
}

function onError(error) {
	console.log(error);
}

function queryAPI (entityResource) {
	return entityResource.query().$promise.then(onSuccess, onError);
}