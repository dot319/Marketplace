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