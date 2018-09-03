// GLOBAl JS/JQUERY
///////////////////
$(function() {
	// Only Allow Numbers To Be Entered
	// Add class 'num-only' to input to prevent anything but numbers
	$('body').on('keypress', '.num-only', function(e) {
	    if (e.which < 48 || e.which > 57) {
	      e.preventDefault();
	    }
	});
})





