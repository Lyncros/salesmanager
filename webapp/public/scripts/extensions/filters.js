// scripts/extensions/filters.js

function ContactsFilter(contactList, controller) {
    if (!controller.hasFilters()) {
        return contactList;
    }

    var fieldsToSearch = ['email', 'firstname', 'lastname', 'phone', 'skype', 'perfil', 'interes', 'company', 'market', 
        'language', 'city', 'country', 'consolidatedCode', 'segmentationContactType', 'profession', 'position', 'area'];

    return contactList.filter(function(contact) {
        return contactPassContactTypeFilter(contact, controller) && 
            contactPassGroupAreaFilter(contact, controller) && 
            contactPassUserFilter(contact, controller) && 
            contactPassSearchFilter(contact, controller, fieldsToSearch);
    });
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

    return contactPassEntityFilter(contact, 'creator', controller.userFilters);
}

function contactPassEntityFilter(contact, propertyName, entitiesFilter) {
    if (!contact[propertyName]) {
        return false;
    }

    var pass = false;
    entitiesFilter.forEach(function(entity) {
        pass = pass || contact[propertyName].id == entity.id;
    });
    return pass;   
}

function contactPassSearchFilter(contact, controller, fieldsToSearch) {
    if (!controller.hasSearchKeyFilters()) {
        return true;
    }

    var searchKeyPass = false;
    controller.searchKeys.forEach(function(key) {
        fieldsToSearch.forEach(function(field) {
            searchKeyPass = searchKeyPass || fieldContainsKey(contact, field, key);
        });
    });
    return searchKeyPass;

}

function fieldContainsKey(obj, field, key) {
    if (obj && obj[field]) {
        return obj[field].toLowerCase().indexOf(key.toLowerCase()) > -1;
    } else {
        return false;
    }
}
