;
(function ($) {


	// Sticky Footer
	var bumpIt = function() {
		$('body').css('padding-bottom', $('.footer').outerHeight(true));
		$('.footer').addClass('sticky-footer');
	},
	didResize = false;

	$(window).resize(function() {
		didResize = true;
	});
	setInterval(function() {
		if(didResize) {
			didResize = false;
			bumpIt();
		}
	}, 250);

	// Scripts which runs after DOM load

	$(document).ready(function () {

		//Remove placeholder on click
		$("input,textarea").each(function () {
			$(this).data('holder', $(this).attr('placeholder'));

			$(this).focusin(function () {
				$(this).attr('placeholder', '');
			});

			$(this).focusout(function () {
				$(this).attr('placeholder', $(this).data('holder'));
			});
		});

		//Make elements equal height
		$('.matchHeight').matchHeight();


		// Add fancybox to images
		$('.gallery-item a').attr('rel', 'gallery');
		$('a[rel*="album"], .gallery-item a, .fancybox, a[href$="jpg"], a[href$="png"], a[href$="gif"]').fancybox({
			minHeight: 0,
			helpers: {
				overlay: {
					locked: false
				}
			}
		});

		// HERO Slider

		$('#hero-slider').slick({
			cssEase: 'ease',
			// fade: true,  // Cause trouble if used slidesToShow: more than one
			arrows: true,
			dots: false,
			infinite: true,
			speed: 500,
			autoplay: true,
			autoplaySpeed: 5000,
			slidesToShow: 1,
			slidesToScroll: 1,
			responsive: [
			    {
			      breakpoint: 768,
			      	settings: {
			        	arrows: false
			      	}
			    }
			]
		});

		// array of layouts info (offset from top and layout height)
		var layouts = $('[id*="layout_"]');
		var layout_info = [];

		for(i = 0; i < layouts.length; i++){

			layout_info.push({
				offset_top: $(layouts[i]).offset().top,
				layout_height: $(layouts[i]).outerHeight()
			}
			);
		}

		// navigation dots behavior logic

		var nav_dots;
		var nav_dots_position_from_top = $('.navigation-dots');
		 	if (nav_dots_position_from_top.length != 0) {
		 		nav_dots_position_from_top = $('.navigation-dots').offset().top;
				nav_dots = $('.navigation-dots li');
		 	};
		var scroll_top = 0;
		var is_fixed = false;
		var nav_container_offset_left = $('.flexible-content-wrapper').offset();

		$('.navigation-dots').css('left', (nav_container_offset_left.left - 25) + 'px'); // navigation dots offset left when it has position "fixed"
		$(document).on('scroll', function(){

			scroll_top = $(document).scrollTop() + 50;

			if (scroll_top > nav_dots_position_from_top ) {
				// change nav dots position property to fixed
				if (!is_fixed) {
					$('.navigation-dots').toggleClass('pos-fixed');
					$('.navigation-dots').toggleClass('pos-absolute');
					is_fixed = true;
				};
			} else {
				if (is_fixed) {
					// change nav dots position property to absolute
					$('.navigation-dots').toggleClass('pos-fixed');
					$('.navigation-dots').toggleClass('pos-absolute');
					is_fixed = false;
				};
			};


			// add 'marked' class to appropriate .navigation-dots li depend on scrolling position
			for(i = 0; i < layouts.length; i++){

				if (scroll_top > layout_info[i].offset_top && scroll_top < scroll_top + layout_info[i].layout_height){
					$(nav_dots).eq(i).addClass('marked');
				} else {
					$(nav_dots).eq(i).removeClass('marked');
				}

			}

			// mark appropriate dot in dots navigation
			$('.navigation-dots li').find('a').css('background-color', 'transparent');
			$('.navigation-dots li.marked').last().find('a').css('background-color', '#d3bf79');

			//

		});
		$('a[href^="#"]').on('click', function(event) {
			var target = $(this.getAttribute('href'));
			if( target.length ) {
				event.preventDefault();
				$('html, body').stop().animate({
					scrollTop: target.offset().top
				}, 700);
			}
		});



		// Sticky footer
		bumpIt();


	});


	// Scripts which runs after all elements load

	$(window).load(function () {

		//jQuery code goes here


	});

	// Scripts which runs at window resize

	$(window).resize(function () {

		//jQuery code goes here

	});

	function new_map( $el ) {

	// var
	var $markers = $el.find('.marker');


	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};


	// create map
	var map = new google.maps.Map( $el[0], args);


	// add a markers reference
	map.markers = [];


	// add markers
	$markers.each(function(){

    	add_marker( $(this), map );

	});


	// center map
	center_map( map );


	// return
	return map;

}


	function add_marker( $marker, map ) {

		// var
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

		// create marker
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map
		});

		// add to array
		map.markers.push( marker );

		// if marker contains HTML, add it to an infoWindow
		if( $marker.html() )
		{
			// create info window
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});

			// show info window when marker is clicked
			google.maps.event.addListener(marker, 'click', function() {

				infowindow.open( map, marker );

			});
		}

	}


	function center_map( map ) {

		// vars
		var bounds = new google.maps.LatLngBounds();

		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ){

			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

			bounds.extend( latlng );

		});

		// only 1 marker?
		if( map.markers.length == 1 )
		{
			// set center of map
		    map.setCenter( bounds.getCenter() );
		    map.setZoom( 16 );
		}
		else
		{
			// fit to bounds
			map.fitBounds( bounds );
		}

	}


	// global var
	var map = null;

	$(document).ready(function(){

		$('.map').each(function(){

			// create map
			map = new_map( $(this) );

		});

	});



}(jQuery));
