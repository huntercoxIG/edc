(function ($) {
	
	"use strict";

	$(document).ready(function() {

		// Comments
		$(".commentlist li").addClass("panel panel-default");
		$(".comment-reply-link").addClass("btn btn-default");
	
		// Forms
		$('select, input[type=text], input[type=email], input[type=password], textarea').addClass('form-control');
		$('input[type=submit]').addClass('btn btn-primary');



		
		// On page load check if document width is less than 992
			// if true, add class of "collapse" 		
		if ($(this).width() < 992) { 
    	$('#mobile').addClass("collapse");

    }



	});
	$
	$(window).on('resize', function(){
    var win = $(this); //this = window
    if (win.width() < 992) { 
    	$('#mobile').addClass("collapse");
    }
    if (win.width() > 992) { 
    	$('#mobile').removeClass("collapse");
    }
	});

}(jQuery));
