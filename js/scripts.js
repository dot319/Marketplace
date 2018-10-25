window.onload = function() {
    resizeDivs();
}

function resizeDivs() {
    if (document.getElementById("registration-form")) {
        expandDiv(document.getElementById("registration-form"));
    }
    if (document.getElementById("registered-successfully")) {
        expandDiv(document.getElementById("registered-successfully"));
    }
    if (document.getElementById("login-page")) {
        expandDiv(document.getElementById("login-page"));
    }
    if (document.getElementById("loggedin")) {
        expandDiv(document.getElementById("loggedin"));
    }
    if (document.getElementById("loggedout")) {
        expandDiv(document.getElementById("loggedout"));
    }
    if (document.getElementById("place-ad")) {
        expandDiv(document.getElementById("place-ad"));
    }
    if (document.getElementById("own-profile")) {
        expandDiv(document.getElementById("own-profile"));
    }
    if (document.getElementById("ad-placed")) {
        expandDiv(document.getElementById("ad-placed"));
    }
    if (document.getElementById("view-ads")) {
        expandDiv(document.getElementById("view-ads"));
    }
    if (document.getElementById("ad-details")) {
        expandDiv(document.getElementById("ad-details"));
    }
    if (document.getElementById("message-sent")) {
        expandDiv(document.getElementById("message-sent"));
    }
    if (document.getElementById("messages")) {
        expandDiv(document.getElementById("messages"));
    }
}

function expandDiv(element) {
    var windowHeight = window.innerHeight;
    var navbarHeight = document.getElementById("navbar").clientHeight;
    var searchbarHeight = document.getElementById("top-searchbar").clientHeight;
    var footerHeight = document.getElementById("copyright-footer").clientHeight;
    var minDivHeight = windowHeight - navbarHeight - searchbarHeight - footerHeight;
    if (element.clientHeight < minDivHeight) {
        element.style.height = minDivHeight + "px";
    }
}