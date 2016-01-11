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

function queryAPI(entityResource, params) {
	return entityResource.query(params).$promise.then(onSuccess, onError);
}
