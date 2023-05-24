jQuery(document).ready(function($) {
    // Add your JavaScript code here
  
    // Example: Display a confirmation dialog before submitting the form
    $('#generate-page-form').submit(function(e) {
      e.preventDefault();
  
      var confirmMessage = 'Are you sure you want to generate the new page?';
      if (confirm(confirmMessage)) {
        $(this).off('submit').submit();
      }
    });
  
    // Example: AJAX request to retrieve additional data
    $('#template').change(function() {
      var templateValue = $(this).val();
  
      // Make an AJAX request to retrieve additional data based on the selected template
      $.ajax({
        url: ajaxurl, // WordPress AJAX URL
        type: 'POST',
        data: {
          action: 'get_additional_data',
          template: templateValue
        },
        success: function(response) {
          // Process the response data
          console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          // Handle AJAX error
          console.log(textStatus, errorThrown);
        }
      });
    });
  });
  