(function( $ ) {
	'use strict';

	var palette = ! customizerCookieOptions.colors ? null : {
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
					'cookie': {
						'name' : customizerCookieOptions.cookieName,
						'expiryDays': parseInt( customizerCookieOptions.cookieDays ),
					},
					onInitialise: function() {
						console.log( 'Simple Cookie Control: ', this.hasConsented() ? 'Accepted cookies' : 'Rejected Cookies' );
					},
					onStatusChange: function( status ) {
						if ( customizerCookieOptions.internalAnalytics ) {
							saveUserChoice( status ); }
						console.log( 'Simple Cookie Control: ', this.hasConsented() ? 'Accepted cookies' : 'Rejected Cookies' );
						if ( 'deny' === status ) {
							deleteSecundaryCookies(); }
						if ( customizerCookieOptions.yett && this.hasConsented() ) {
							window.yett.unblock(); }
						if ( customizerCookieOptions.reload ) {
							location.reload(); }
					},
				}
			);

			$( '.cc-revoke' ).click(
				function() {

					$( "[aria-describedby*='cookieconsent:desc']" ).removeClass( 'cc-invisible' ).removeAttr( 'style' );
					$( this ).css( 'display','none' );

				}
			);

			$( '.scc-secundary-banner' ).click(
				function() {
						window.cookieconsent.utils.setCookie( $( this ).data( 'cookie-name' ), $( this ).data( 'cookie-value' ), parseInt( customizerCookieOptions.cookieDays ) );
						location.reload();
				}
			);
		}
	);

	function deleteSecundaryCookies(){
		$( '.scc-secundary-deny' ).each(
			function() {
				if ( customizerCookieOptions.cookieName === $( this ).data( 'cookie-name' ) ) {
					return;
				}
					window.cookieconsent.utils.setCookie( $( this ).data( 'cookie-name' ), $( this ).data( 'cookie-value' ), parseInt( -customizerCookieOptions.cookieDays ) );
			}
		);
	}

	function saveUserChoice( status ){
		var postData = {
			action: 'save_user_choice',
			choice: status,
			security: customizerCookieOptions.security
		}
		jQuery.ajax(
			{
				url: customizerCookieOptions.ajaxUrl,
				type: 'POST',
				data: postData
			}
		);
	}

})( jQuery );
