// scripts/extensions/filters.js

/*
 * ContactsFilter
 * 
 * Filter contacts based on controller's data: contact type, group area, search box.
 */

function ContactsFilter() {
    return function(contactList, controller) {
        if (!controller.hasFilters()) {
            return contactList;
        }

        var fieldsToSearch = ['email', 'firstname', 'lastname', 'phone', 'skype', 'perfil', 'interes', 
            'company_name', 'company_area', 'market', 'segmentationContactType', 'profession', 'position',
            'language', 'city', 'country', 'consolidatedCode', 'sap_code'];

        return contactList.filter(function(contact) {
            return contactPassContactTypeFilter(contact, controller) && 
                contactPassGroupAreaFilter(contact, controller) && 
                contactPassUserFilter(contact, controller) && 
                contactPassSearchFilter(contact, controller, fieldsToSearch);
        });
    }
}

function contactPassContactTypeFilter(contact, controller) {
    if (!controller.hasContactTypeFilters()) {
        return true;
    }

    return contactPassEntityFilter(contact, 'contact_type', controller.contactTypeFilters);
}

function contactPassGroupAreaFilter(contact, controller) {
    if (!controller.hasGroupAreaFilters()) {
        return true;
    }

    return contactPassEntityFilter(contact, 'group_area', controller.groupAreaFilters);
}

function contactPassUserFilter(contact, controller) {
    if (!controller.hasUserFilters()) {
        return true;
    }

    if (!contact.responsibles) {
        return false;
    }

    var pass = false;
    angular.forEach(controller.userFilters, function(entity) {
        angular.forEach(contact.responsibles, function(resp){
            pass = pass || resp.id == entity.id;
        });
    });
    return pass; 
}

function contactPassEntityFilter(contact, propertyName, entitiesFilter) {
    if (!contact[propertyName]) {
        return false;
    }

    var pass = false;
    angular.forEach(entitiesFilter, function(entity) {
        pass = pass || contact[propertyName].id == entity.id;
    });
    return pass;   
}

function contactPassSearchFilter(contact, controller, fieldsToSearch) {
    if (!controller.hasSearchKeyFilters()) {
        return true;
    }

    var searchKeyPass = false;
    angular.forEach(controller.searchKeys, function(key){
        angular.forEach(fieldsToSearch, function(field) {
            searchKeyPass = searchKeyPass || fieldContainsKey(contact, field, key);
        });        
    });
    return searchKeyPass;
}

function fieldContainsKey(obj, field, key) {
    var keyStnd = key.toLowerCase();
    var valueStnd = '';
    if (obj && obj[field]) {
        if (angular.isObject(obj[field])) {
            if (obj[field].description) {
                valueStnd = obj[field].description.toLowerCase();
            } else if (obj[field].name) {
                valueStnd = obj[field].name.toLowerCase();
            }
        } else {
            valueStnd = obj[field].toLowerCase();
        }
        return valueStnd.indexOf(keyStnd) > -1;
    } else {
        return false;
    }
}


/*
 * ResponsiblesFilter
 *
 * Displays responsible list in one line.
 */

function ResponsiblesFilter() {
    return function(responsiblesList) {
        var text = '';

        angular.forEach(responsiblesList, function(resp){
            text += resp.lastname + ', ' + resp.firstname + ' - ';
        });

        return text.slice(0, text.length - 3);
    }
}
