// GLOBAl JS/JQUERY
///////////////////
$(function() {
	// Only Allow Numbers To Be Entered
	// Add class 'num-only' to input to prevent anything but numbers
	$(document).on('keypress paste', '.num-only', function(e) {
		event = e || window.event;
   	let charCode = event.which || event.keyCode;
		var inp = String.fromCharCode(charCode);
		var isNum = /^[0-9]*$/.test(inp);
    if (!isNum) e.preventDefault();
	});
	// Only Allow Letters To Be Entered
	// Add class 'letter-only' to input to prevent anything but letters
	$(document).on("keypress paste", ".letter_space-only", function(e) {
		event = e || window.event;
   	let charCode = event.which || event.keyCode;
		var inp = String.fromCharCode(charCode);
		var isAlpha = /^[a-zA-Z\s]*$/.test(inp);
    if (!isAlpha) e.preventDefault();
  });
})
	






