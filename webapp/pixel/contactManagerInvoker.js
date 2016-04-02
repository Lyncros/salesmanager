var url = 'http://cmtest.lyncros.com/api/contactInterestHit';

saveEMailCookie();

function saveEMailCookie() {
    var email = getUrlParameterByName('email');
    if (email) {
        document.cookie = 'contact_email=' + email;
    }
}

function getEmail() {
    var email = getUrlParameterByName('email'); 
    if (email) {
        return email;
    } else {
        var emailCookie = document.cookie.replace(/(?:(?:^|.*;\s*)contact_email\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        return emailCookie;
    }
}

function invokeContactManagerInterestHit(interest) {
    var email = getEmail();

    if (email) {
        var queryParameters = 'email=' + email + '&' + 'interest=' + interest;
        
        invoker = window.XDomainRequest ? new window.XDomainRequest() : new XMLHttpRequest();
        invoker.open('GET', url, true);
        invoker.send(queryParameters);
    }
}

function getUrlParameterByName(name) {
    var url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)", "i");
    var results = regex.exec(url);
    
    if (!results) {
        return null;
    }
    if (!results[2])  {
        return '';
    }
    
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
