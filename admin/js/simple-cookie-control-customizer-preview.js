(function( $ ) {
	'use strict';

	$( window ).load(
		function() {

			let banner = $("[aria-describedby*='cookieconsent:desc']");

			wp.customize( 'customizer_simple_cookie_control[position]', function( value ) {
				value.bind( function( newValue ) {
					switch ( newValue ) {
						case 'bottom':
							banner.removeClass('cc-right cc-left cc-top cc-floating').addClass('cc-bottom cc-banner');
							break;
						case 'top':
							banner.removeClass('cc-right cc-left cc-bottom cc-floating').addClass('cc-top cc-banner');
							break;
						case 'bottom-left':
							banner.removeClass('cc-right cc-banner cc-top').addClass('cc-bottom cc-left cc-floating');
							break;
						case 'bottom-right':
							banner.removeClass('cc-left cc-banner cc-top').addClass('cc-bottom cc-right cc-floating');
							break;
					
						default:
							break;
					}
				} );
			} );

			wp.customize( 'customizer_simple_cookie_control[theme]', function( value ) {
				value.bind( function( newValue ) {
					switch ( newValue ) {
						case 'block':
							banner.removeClass('cc-theme-classic cc-theme-edgeless').addClass('cc-theme-block');
							break;
						case 'classic':
							banner.removeClass('cc-theme-block cc-theme-edgeless').addClass('cc-theme-classic');
							break;
						case 'edgeless':
							banner.removeClass('cc-theme-block cc-theme-classic').addClass('cc-theme-edgeless');
							break;
					
						default:
							break;
					}
				} );
			} );

	});

})( jQuery );
