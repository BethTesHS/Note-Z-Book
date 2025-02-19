
    window.addNewBook = function() {
        document.getElementById('addBookPopup').style.display = 'flex'; // Show the popup
    };

    window.closePopup = function() {
        document.getElementById('addBookPopup').style.display = 'none'; // Hide the popup
    };

    // To update stock quantity
    window.add = function(ids) {
        let currentValue = parseInt(ids.value);
        ids.value = currentValue + 1;
        let subTot = ids.closest('tr').querySelector('.subTotal');
        subTot.value = (price * (currentValue + 1)).toFixed(2);
    }
    window.sub = function(ids) {
        let currentValue = parseInt(ids.value)
        if(currentValue > 0) {
            ids.value = currentValue - 1;
            let subTot = ids.closest('tr').querySelector('.subTotal');
            subTot.value = (price * (currentValue - 1)).toFixed(2);
        }
    }
    window.change = function(ids){
        let currentValue = parseInt(ids.value)
        if(currentValue < 0 || !currentValue){
            currentValue = 0;
        }
        ids.value = currentValue
        let subTot = ids.closest('tr').querySelector('.subTotal');
        subTot.value = (price * currentValue).toFixed(2);
    }

    window.adjustHeight = function(element) {
        element.style.height = "auto"; // Reset height to recalculate
        element.style.height = element.scrollHeight-20 + "px"; // Set to the scroll height
    }


    document.addEventListener("DOMContentLoaded", function() {

        flatpickr("#date", {
            dateFormat: "Y-m-d",
            enableTime: false,
            defaultDate: null,
            maxDate: "today",
            onChange: function(dateStr) {
                if (!dateStr) { 
                    dateStr = "Add Date";
                }
                filterDateInput.value = dateStr;
            },
            
        });
    
    });