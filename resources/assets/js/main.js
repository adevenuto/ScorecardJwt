// GLOBAl JS/JQUERY
///////////////////

// Slide In Nav
$("#hamburger").on('click', function() {
	$("#mySidenav").toggleClass('navIn');
	$("#hamburger").toggleClass('open');
	$("#overlay").toggleClass('overlay');
})
// Slide In Close
$("body").on('click', function(e) {
	let target = e.target.id;
	if (target === "overlay") {
		$("#mySidenav").toggleClass('navIn');
		$("#hamburger").toggleClass('open');
		$("#overlay").toggleClass('overlay');
	}
})
// Only Allow Numbers To Be Entered
// Add class 'num-only' to input to prevent anything but numbers
$('body').on('keypress', '.num-only', function(e) {
    if (e.which < 48 || e.which > 57) {
      e.preventDefault();
    }
});




