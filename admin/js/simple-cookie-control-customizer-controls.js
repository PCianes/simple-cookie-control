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
		
		$('#scc-reset-cookies-analytics').click( function(){
			//console.log( $(this) );
			jQuery.ajax({
			  url: analyticsCookieOptions.ajaxUrl,
			  type: 'POST',
			  data: {
				action: 'reset_cookies_analytics',
				reset: true,
				security: analyticsCookieOptions.security
				}
			}).done( function( response ){ 
				if( response ){
					location.reload();
				}
			});
		});

	});

})( jQuery );
