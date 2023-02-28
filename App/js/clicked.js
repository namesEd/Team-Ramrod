$(document).on('click', '#myButton', function() { 
  $(this).addClass('clicked');
  $(this).prop("disabled",true);
});