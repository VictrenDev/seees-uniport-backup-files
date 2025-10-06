$(document).ready(function () {

    // cookies

    function hasAcceptedCookies() {
        return document.cookie.includes("cookiesAccepted=true")
    }
    function hasRejectedCookies() {
        return document.cookie.includes("cookiesRejected=true")
    }
    function setCookie(name, value, days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000))
        const expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    //if cookies has not been accepted,
    function showCookiesPopup() {
        const cookiesPopup = $('#cookiesPopup')

        //check if user has accepted cookies
        if (!hasAcceptedCookies() && !hasRejectedCookies()) {
            // cookiesPopup.addClass("show")
            cookiesPopup.css("opacity", 0)
            cookiesPopup.delay(5000).animate({ "opacity": 1 }, 500);

        } else {
            cookiesPopup.hide()
        }
    }

    function createCookiesPopup() {
        const cookiesPopup = $("<div>", {
            class: "cookies-popup",
            id: "cookiesPopup",
            html: `
            <div class="container">
                <h3>Cookies <i class="fa-solid fa-cookie cookie-icon"></i></h3>             
                <p> This website uses cookies to improve your experience. By continuing to use this site, you must have read our <a href="/cookies.html"> Cookies Policy</a>.</p>
                <div class="cookie-button-container"> 
                    <button id="acceptCookiesButton">Accept</button>
                    <button id="rejectCookiesButton">Reject</button>
                </div>
            </div>  `
        })
        $('body').append(cookiesPopup)
    }
    
    function hideCookiesPopup(accepted) {
        const cookiesPopup = $('#cookiesPopup')

        if (accepted) {
            setCookie("cookiesAccepted", "true", 30)
        } else {
            setCookie("cookiesRejected", "true", 5)
        }
        $(cookiesPopup).fadeOut();
    }

    createCookiesPopup()
    $("#acceptCookiesButton").on("click", function () {
        hideCookiesPopup(true)
    })
    $("#rejectCookiesButton").on("click", function () {
        hideCookiesPopup(false)
    })
    showCookiesPopup()
})