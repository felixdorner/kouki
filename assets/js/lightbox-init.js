/**
 * Initialize lightbox
 */

jQuery( document ).ready( function( $ ) {

	"use strict";

	$(".entry-content a").attr('data-imagelightbox', '');

	// Activity Indicator
	var activityIndicatorOn = function() {
		$( '<div id="imagelightbox-loading"><div></div></div>' ).appendTo( 'body' );
	},
	activityIndicatorOff = function() {
		$( '#imagelightbox-loading' ).remove();
	},
	// Overlay
	overlayOn = function() {
		$( '<div id="imagelightbox-overlay"></div>' ).appendTo( 'body' );
	},
	overlayOff = function() {
		$( '#imagelightbox-overlay' ).remove();
	};

	// Init with Overlay
	// $( 'a[data-imagelightbox]' ).imageLightbox({
	// 	onStart: 	 function() { overlayOn(); },
	// 	onEnd:	 	 function() { overlayOff(); }
	// });

	// Init with Indicator and Overlay
	$( 'a[data-imagelightbox]' ).imageLightbox({
		onStart: 	 function() { overlayOn(); },
		onEnd:	 	 function() { overlayOff(); activityIndicatorOff(); },
		onLoadStart: function() { activityIndicatorOn(); },
		onLoadEnd:	 function() { activityIndicatorOff(); }
	});

});
