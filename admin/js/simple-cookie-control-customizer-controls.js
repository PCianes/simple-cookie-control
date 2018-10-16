(function( $ ) {
	'use strict';

	$( window ).load( function() {

		wp.customize.control( 'customizer_simple_cookie_control[colors]', function( value ) {
			value.setting.bind( function( newValue ) {
				$('#customize-control-popupBackgroundColor').toggle();
				$('#customize-control-popupTextColor').toggle();
				$('#customize-control-popupLinkColor').toggle();
				$('#customize-control-buttonBackgroundColor').toggle();
				$('#customize-control-buttonTextColor').toggle();
				$('#customize-control-buttonBorderColor').toggle();
				$('#customize-control-highlightBackgroundColor').toggle();
				$('#customize-control-highlightTextColor').toggle();
				$('#customize-control-highlightBorderColor').toggle();
			} );
		} );	

	});

})( jQuery );
