
var addPopup = document.getElementById('addMemberPopup');
var editPopup = document.getElementById('editMemberPopup');
var deletePopup = document.getElementById('deleteMemberPopup');





// Add popup
addMember.onclick = function() {
    addPopup.style.display = 'flex'; // Display the popup
}

// Close the popup when the close button is clicked
closeAddPopupBtn.onclick = function() {
    addPopup.style.display = 'none'; // Hide the popup
}

closeEditPopupBtn.onclick = function() {
    editPopup.style.display = 'none'; // Hide the popup
}

closeDeletePopupBtn.onclick = function() {
    deletePopup.style.display = 'none'; // Hide the popup
}

// Close the popup if the user clicks anywhere outside the popup content
window.onclick = function(event) {
    if (event.target == addPopup) {
        addPopup.style.display = 'none';
    }
    if (event.target == editPopup) {
        editPopup.style.display = 'none';
    }
    if (event.target == deletePopup) {
        deletePopup.style.display = 'none';
    }
}

// ----------------------- FOR MEMBERS ----------------------- //

document.querySelectorAll('.editMember').forEach(button => {
    button.addEventListener('click', function() {
        const member = JSON.parse(button.getAttribute('data-id'));

        id.value=member['id'];
        fn.value=member['firstName'];
        ln.value=member['lastName'];
        age.value=member['age'];
        loc.value=member['location'];
        tel.value=member['telNo'];

        editPopup.style.display = 'flex';
    });
});

document.querySelectorAll('.deleteMember').forEach(button => {
    button.addEventListener('click', function() {
        const member = JSON.parse(button.getAttribute('data-id'));

        d_id.value=member['id'];
        d_fn.value=member['firstName'];
        d_ln.value=member['lastName'];

        deletePopup.style.display = 'flex';
    });
});



// ----------------------- FOR CONTRIBUTORS ----------------------- //

document.querySelectorAll('.editContributor').forEach(button => {
    button.addEventListener('click', function() {
        const contributor = JSON.parse(button.getAttribute('data-id'));

        con_id.value=contributor['id'];
        con_fn.value=contributor['members']['firstName']+ ' ' + contributor['members']['lastName'];
        con_mon.value=contributor['money'];
        con_time.value=contributor['time'];

        editPopup.style.display = 'flex';
    });
});

document.querySelectorAll('.deleteContributor').forEach(button => {
    button.addEventListener('click', function() {
        const contributor = JSON.parse(button.getAttribute('data-id'));

        con_d_id.value=contributor['id'];
        con_d_fn.value=contributor['members']['firstName'];
        con_d_ln.value=contributor['members']['lastName'];

        deletePopup.style.display = 'flex';
    });
});

