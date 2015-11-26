// scripts/filters/contactsFitler.js

function ContactsFilter(contactList, controller) {
    if (!controller.hasFilters()) {
        return contactList;
    }

    var fieldsToSearch = ['email', 'firstname', 'lastname', 'phone', 'skype', 'perfil', 'interes', 'company', 'market', 
        'language', 'city', 'country', 'consolidatedCode', 'segmentationContactType', 'profession', 'position', 'area'];

    return contactList.filter(function(contact) {
        return contactPassContactTypeFilter(contact, controller) && 
            contactPassGroupAreaFilter(contact, controller) && 
            contactPassSearchFilter(contact, controller, fieldsToSearch);
    });
}

function contactPassContactTypeFilter(contact, controller) {
    if (!controller.hasContactTypeFilters()) {
        return true;
    }

    if (!contact.contact_type) {
        return false;
    }

    var passFilter = false;
    controller.contactTypeFilters.forEach(function(type) {
        passFilter = passFilter || contact.contact_type.id == type.id;
    });
    return passFilter;
}

function contactPassGroupAreaFilter(contact, controller) {
    if (!controller.hasGroupAreaFilters()) {
        return true;
    }

    if (!contact.groupArea) {
        return false;
    }

    var groupAreaPass = false;
    controller.groupAreaFilters.forEach(function(ga) {
        groupAreaPass = groupAreaPass || contact.groupArea.id == ga.id;
    });
    return groupAreaPass;
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
