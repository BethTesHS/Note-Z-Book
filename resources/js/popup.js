// Get the popup and buttons
var profilePopup = document.getElementById('profilePopup');
var profileDisplay = document.getElementById('profileDisplay');




profileDisplay.onclick = function() {
    profilePopup.style.display = (profilePopup.style.display === 'block') ? 'none' : 'block';
}

// Close the popup when the close button is clicked
closeProfilePopupBtn.onclick = function() {
    profilePopup.style.display = 'none'; // Hide the popup
}

window.onclick = function(event) {
    if (event.target == profilePopup) {
        profilePopup.style.display = 'none';
    }
}