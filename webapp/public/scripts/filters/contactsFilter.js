/* scripts/filters/contactsFitler.js */

function contactsFilter(contactList, controller) {
    var out = [];
    var fieldsToSearch = ['email', 'firstname', 'lastname', 'phone', 'skype', 'perfil', 'interes', 'company', 'market', 
        'language', 'city', 'country', 'consolidatedCode', 'segmentationContactType', 'profession', 'position', 'area'];

    angular.forEach(contactList, function(contact) {
        if (!controller.hasFilters()) {
            out.push(contact)
        } else if (contactPassContactTypeFilter(contact, controller) && 
            contactPassGroupAreaFilter(contact, controller) && 
            contactPassSearchFilter(contact, controller, fieldsToSearch)) {
            out.push(contact);
        }
    })

    return out;
}

function contactPassContactTypeFilter(contact, controller) {
    if (!controller.hasContactTypeFilters()) {
        return true;
    }

    if (!contact.contactType) {
        return false;
    }

    var contactTypePass = false;
    controller.contactTypeFilters.forEach(function(type) {
        contactTypePass = contactTypePass || contact.contactType.id == type.id;
    });
    return contactTypePass;
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
