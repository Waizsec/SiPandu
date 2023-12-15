$(document).ready(function() {
    $('.filter-button').on('click', function() {
         // Remove "selected" class from all buttons
         $('.filter-button').removeClass('selected');
        
         // Add "selected" class to the clicked button
         $(this).addClass('selected');
 
         const selectedType = $(this).data('type');
         
         // Hide all items
         $('.item').hide();
         
         if (selectedType === 'all') {
             // Show all items if "All" is selected
             $('.item').show();
         } else {
             // Show items of the selected type
             $(`.item[data-type="${selectedType}"]`).show();
         }
    });
});


$(document).ready(function() {
    // Listen for changes in the visible input
    $("#customerName").on("input", function() {
      // Update the value of the hidden input
      $("#custname").val($(this).val());
    });
  });

  document.addEventListener("DOMContentLoaded", function () {
    // Get the form element by its ID
    var form = document.getElementById("invoiceForm");

    form.addEventListener("submit", function (event) {
        // Get the value of the "customerName" input
        var customerName = document.getElementById("customerName").value;

        // Check if the "customerName" is empty
        if (customerName.trim() === "") {
            // Prevent form submission
            event.preventDefault();
            alert("Please enter the customer's name.");
        }
    });
});  

