window.onload = function() {
    resizeDivs();
}

function resizeDivs() {
    var bloopie = document.getElementById("registration-form");
    expandDiv(bloopie);
}


function expandDiv(element) {
    console.log("test1");
    var windowHeight = window.innerHeight;
    var navbarHeight = document.getElementById("navbar").clientHeight;
    var searchbarHeight = document.getElementById("top-searchbar").clientHeight;
    var footerHeight = document.getElementById("copyright-footer").clientHeight;
    var minDivHeight = windowHeight - navbarHeight - searchbarHeight - footerHeight;
    if (element.clientHeight < minDivHeight) {
        console.log(element.clientHeight);
        console.log(minDivHeight);
        element.style.height = minDivHeight + "px";
    }
}