// GLOBAl JS/JQUERY
///////////////////

// Slide In Nav
$("#hamburger").on('click', function() {
	$("#mySidenav").toggleClass('navIn');
	$("#hamburger").toggleClass('open');
	$("#overlay").toggleClass('overlay');
})

// Only Allow Numbers To Be Entered
// Add class 'num-only' to input to prevent anything but numbers
$('body').on('keypress', '.num-only', function(e) {
    if (e.which < 48 || e.which > 57) {
      e.preventDefault();
    }
});

// Bootstrap popover 
$('body').popover({
	placement: 'top',
    container: 'body',
    html: true,
    selector: '[data-toggle="popover-course-name"]',
})


// var _this = $(e.target)[0]['dataset']['toggle'];