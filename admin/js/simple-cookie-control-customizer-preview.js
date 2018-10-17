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
						case 'top-left':
							banner.removeClass('cc-right cc-banner cc-bottom').addClass('cc-top cc-left cc-floating');
							break;
						case 'top-right':
							banner.removeClass('cc-left cc-banner cc-bottom').addClass('cc-top cc-right cc-floating');
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

			wp.customize( 'customizer_simple_cookie_control[popupBackgroundColor]', function( value ) {
				value.bind( function( newValue ) {
					banner.css('background-color', newValue );
				} );
			} );

			wp.customize( 'customizer_simple_cookie_control[popupTextColor]', function( value ) {
				value.bind( function( newValue ) {
					banner.css('color', newValue );
				} );
			} );

			wp.customize( 'customizer_simple_cookie_control[popupLinkColor]', function( value ) {
				value.bind( function( newValue ) {
					$('.cc-message a').css('color', newValue );
				} );
			} );

			wp.customize( 'customizer_simple_cookie_control[buttonBackgroundColor]', function( value ) {
				value.bind( function( newValue ) {
					$('.cc-compliance .cc-allow').css('background-color', newValue );
				} );
			} );

			wp.customize( 'customizer_simple_cookie_control[buttonTextColor]', function( value ) {
				value.bind( function( newValue ) {
					$('.cc-compliance .cc-allow').css('color', newValue );
				} );
			} );

			wp.customize( 'customizer_simple_cookie_control[buttonBorderColor]', function( value ) {
				value.bind( function( newValue ) {
					$('.cc-compliance .cc-allow').css('border-color', newValue );
				} );
			} );

			wp.customize( 'customizer_simple_cookie_control[highlightBackgroundColor]', function( value ) {
				value.bind( function( newValue ) {
					$('.cc-compliance .cc-deny').css('background-color', newValue );
				} );
			} );

			wp.customize( 'customizer_simple_cookie_control[highlightTextColor]', function( value ) {
				value.bind( function( newValue ) {
					$('.cc-compliance .cc-deny').css('color', newValue );
				} );
			} );

			wp.customize( 'customizer_simple_cookie_control[highlightBorderColor]', function( value ) {
				value.bind( function( newValue ) {
					$('.cc-compliance .cc-deny').css('border-color', newValue );
				} );
			} );

			wp.customize( 'customizer_simple_cookie_control[contentMessage]', function( value ) {
				value.bind( function( newValue ) {
					let currentMessage = $('.cc-message'),
						anchorHtml = currentMessage.html().slice( currentMessage.html().indexOf('<a aria-label="learn more about cookies"') );
					currentMessage.html( newValue + anchorHtml );
				} );
			} );

			wp.customize( 'customizer_simple_cookie_control[contentLink]', function( value ) {
				value.bind( function( newValue ) {
					$('.cc-message a.cc-link').text( newValue );
				} );
			} );

			wp.customize( 'customizer_simple_cookie_control[contentHref]', function( value ) {
				value.bind( function( newValue ) {
					$('.cc-message a.cc-link').attr( 'href', newValue );
				} );
			} );

			wp.customize( 'customizer_simple_cookie_control[contentAllow]', function( value ) {
				value.bind( function( newValue ) {
					$('.cc-allow').text( newValue );
				} );
			} );

			wp.customize( 'customizer_simple_cookie_control[contentDeny]', function( value ) {
				value.bind( function( newValue ) {
					$('.cc-deny').text( newValue );
				} );
			} );

	});

})( jQuery );
