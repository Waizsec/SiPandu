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
