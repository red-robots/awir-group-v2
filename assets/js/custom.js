/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Current Page Active
	*
	------------------------------------*/
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});

	// Paralax
	skrollr.init({
    	forceHeight: false,
    	// smoothScrolling:true,
    	// smoothScrollingDuration:1000,
		 mobileCheck: function() {
                //hack - forces mobile version to be off
                return false;
            }
		
	});

	// $(function() {
	// 	var wrap = $("#mynav");

	// 	wrap.on("scroll", function(e) {
		    
	// 	  if (this.scrollTop > 147) {
	// 	    wrap.addClass("fix-search");
	// 	  } else {
	// 	    wrap.removeClass("fix-search");
	// 	  }
		  
	// 	});
	// });

	/*
	*
	*	Responsive iFrames
	*
	------------------------------------*/
	var $all_oembed_videos = $("iframe[src*='youtube']");
	
	$all_oembed_videos.each(function() {
	
		$(this).removeAttr('height').removeAttr('width').wrap( "<div class='embed-container'></div>" );
 	
 	});
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	// (function() {
 
	//   // store the slider in a local variable
	//   var $window = $(window),
	//       flexslider = { vars:{} };
	 
	//   // tiny helper function to add breakpoints
	//   function getGridSize() {
	//     return (window.innerWidth < 600) ? 2 :
	//            (window.innerWidth < 900) ? 2 : 3;
	//   }
	 
	//   $(function() {
	//     SyntaxHighlighter.all();
	//   });
	 
	//   $window.load(function() {
	//     $('.flexslider').flexslider({
	//       animation: "slide",
	//       animationLoop: false,
	//       itemWidth: 210,
	//       itemMargin: 10,
	//       minItems: getGridSize(), // use function to pull in initial value
	//       maxItems: getGridSize() // use function to pull in initial value
	//     });
	//   });
	 
	//   // check grid size on resize event
	//   $window.resize(function() {
	//     var gridSize = getGridSize();
	 
	//     flexslider.vars.minItems = gridSize;
	//     flexslider.vars.maxItems = gridSize;
	//   });
	// }());

	$('.flexslider').imagesLoaded( function() {
		$('.flexslider').flexslider({
			animation: "fade",
			slideshowSpeed: 5000,
			smoothHeight: false,
		}); // end register flexslider
	});
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	
	/*
	*
	*	Isotope with Images Loaded
	*
	------------------------------------*/
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 15
			}
 		 });
	});

	/*
	*
	*	Smooth Scroll to Anchor
	*
	------------------------------------*/
	 $('a').click(function(){
	    $('html, body').animate({
	        scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
	    }, 500);
	    return false;
	});

	/*
	*
	*	Nice Page Scroll
	*
	------------------------------------*/
	// $(function(){	
	// 	$("html").niceScroll();
	// });
	
	
	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();

});// END #####################################    END