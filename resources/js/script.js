// Get the popup and buttons
var profilePopup = document.getElementById('profilePopup');
var profileDisplay = document.getElementById('profileDisplay');


profileDisplay.onclick = function() {
    // profilePopup.style.display = (profilePopup.style.display === 'block') ? 'none' : 'block';
    profilePopup.classList.toggle('open');
}

// Close the popup when the close button is clicked
closeProfilePopupBtn.onclick = function() {
    // profilePopup.style.display = 'none'; // Hide the popup
    profilePopup.classList.toggle('open');
}

// window.onclick = function(event) {
//     if (event.target == profilePopup) {
//         // profilePopup.style.display = 'none';
//         profilePopup.classList.toggle('open');
//     }
// }

window.toggleDrawer = function() {
    var drawer = document.getElementById('drawer');
    var menuBtn = document.getElementById('menu-btn');
    var mainContent = document.querySelector('.main-content');

    drawer.classList.toggle('open');

    if (window.innerWidth >= 768) {
        mainContent.classList.toggle('shifted');
    }

    if (drawer.classList.contains('open')) {
        menuBtn.innerHTML = '<i class="fa fa-close"></i>';
    } else {
        menuBtn.innerHTML = '<i class="fa fa-navicon"></i>';
    }

}

window.toggleLightMode = function() {
    document.body.classList.toggle('light-mode');
    const isLightMode = document.body.classList.contains("light-mode");
    localStorage.setItem('lightMode', isLightMode);

    document.getElementById('light-mode-btn').innerHTML = isLightMode
        ? `<i class="fa fa-moon-o"></i> Dark Mode`
        : `<i class="fa fa-sun-o"></i> Light Mode`;
}

// Check for light mode preference on page load
document.addEventListener("DOMContentLoaded", function () {
    if (localStorage.getItem("lightMode") === "true") {
        document.body.classList.add("light-mode");
        document.getElementById("light-mode-btn").innerHTML = `<i class="fa fa-moon-o"></i> Dark Mode`;
    }
});
