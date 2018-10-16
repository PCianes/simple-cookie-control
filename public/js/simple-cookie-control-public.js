(function( $ ) {
	'use strict';

	let palette = ! customizerCookieOptions.colors ? null : {
		'popup': {
			'background': customizerCookieOptions.popupBackgroundColor,
			'text': customizerCookieOptions.popupTextColor,
			'link': customizerCookieOptions.popupLinkColor
		},
		'button': {
			'background': customizerCookieOptions.buttonBackgroundColor,
			'text': customizerCookieOptions.buttonTextColor,
			'border': customizerCookieOptions.buttonBorderColor
		},
		'highlight': {
			'background': customizerCookieOptions.highlightBackgroundColor,
			'text': customizerCookieOptions.highlightTextColor,
			'border': customizerCookieOptions.highlightBorderColor
		}
	};

	$( window ).load(
		function() {

			window.cookieconsent.initialise(
				{
					'position': customizerCookieOptions.position,
					'theme': customizerCookieOptions.theme,
					//'container': document.getElementById( 'content' ),
					'palette': palette,
					'content': {
						'message': 'message',
						'dismiss': 'Ok!',
						'link': 'link',
					},
					"type": "opt-out"
				}
			)

		}
	);

})( jQuery );
