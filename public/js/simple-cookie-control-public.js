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
					'palette': palette,
					'content': {
						'message': customizerCookieOptions.contentMessage,
						'dismiss': customizerCookieOptions.contentDeny,
						'allow'	: customizerCookieOptions.contentAllow,
						'deny'	: customizerCookieOptions.contentDeny,
						'link'	: customizerCookieOptions.contentLink,
						'href': customizerCookieOptions.contentHref,
						'policy': customizerCookieOptions.contentPolicy, 
					},
					'type': 'opt-in',
					'revokable' : customizerCookieOptions.contentRevokable,
					'animateRevokable' : false,
				}
			);

			let banner = $("[aria-describedby*='cookieconsent:desc']");
			$( ".cc-revoke" ).click(function() {
				banner.removeClass('cc-invisible').removeAttr('style');
				$(this).css('display','none');
			});
		}
	);

})( jQuery );
