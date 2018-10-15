(function( $ ) {
	'use strict';

	$( window ).load(function() {

		window.cookieconsent.initialise({
			"container": document.getElementById("content"),
			"palette": {
				"popup": {
				"background": "#edeff5",
				"text": "#838391"
				},
				"button": {
				"background": "#4b81e8"
				}
			},
			"theme": "edgeless",
			"position": "bottom-right"
		})
		
	});

})( jQuery );
