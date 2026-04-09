jQuery.noConflict()( function($){
	$(document).ready(function(){
	    wow = new WOW (
	      {
	        animateClass: 'animated',
	        mobile: false,
	        offset: 150
	      }
	    );
	    wow.init();
	});
});





