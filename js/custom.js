var opacity = 0.5;
var cyclespeed = 2000;
var timeout = 1000;

$(document).ready(function(){
	
/*	$('.portfolio-images').cycle({ 
		fx:    'fade', 
		speed:  cyclespeed ,
		timeout: timeout ,
		next: '.portfolio-images'
	});
	
	/*$('.fadeimg').hover(function(){
		$(this).fadeTo('fast', 1.0); 
	},function(){
		$(this).fadeTo('fast', opacity); 
	});*/
	
	//$('.fadeimg').fadeTo('fast', opacity);

	$("#myController").jFlow({
		slides: "#slides",
		controller: ".jFlowControl", // must be class, use . sign
		slideWrapper : "#jFlowSlide", // must be id, use # sign
		selectedWrapper: "jFlowSelected",  // just pure text, no sign
		easing: "swing",
		width: "950px",
		height: "600px",
		duration: 600,
		prev: ".jFlowPrev", // must be class, use . sign
		next: ".jFlowNext" // must be class, use . sign
	});

	// Get BG Image

	/*if ( $( ".bg-img" ).length ) {

		$( ".bg-img" ).each(function() {

			var post 	= $(this),
				bg 		= post.data('bg');

			post.css( 'background-image', 'url(images/' + bg + ')' );

		});


	}*/
	
});