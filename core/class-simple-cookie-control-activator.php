<?php
/**
 * Fired during plugin activation
 *
 * @link       https://sumapress.com
 * @since      1.0.0
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/core
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/core
 * @author     SumaPress <soporte@sumapress.com>
 */
class Simple_Cookie_Control_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		$ajax_url = admin_url( 'admin-ajax.php' );

		$default_options = array(
			'position'                 => 'bottom',
			'theme'                    => 'block',
			'colors'                   => 1,
			'popupBackgroundColor'     => '#edeff5',
			'popupTextColor'           => '#838391',
			'popupLinkColor'           => '#ffffff',
			'buttonBackgroundColor'    => '#4b81e8',
			'buttonTextColor'          => '#ffffff',
			'buttonBorderColor'        => '#4b81e8',
			'highlightBackgroundColor' => 'transparent',
			'highlightTextColor'       => '#ffffff',
			'highlightBorderColor'     => 'transparent',
			'contentMessage'           => 'This website uses cookies to ensure you get the best experience on our website.',
			'contentAllow'             => 'Allow cookies',
			'contentDeny'              => 'Decline',
			'contentLink'              => 'Learn more',
			'contentHref'              => 'https://cookiesandyou.com',
			'contentPolicy'            => '<span class="dashicons dashicons-image-filter"></span>',
			'contentRevokable'         => true,
			'cookieName'               => 'SimpleCookieControl',
			'cookieDays'               => 180,
			'googleManager'            => 'stop',
			'googleManagerID'          => 'GTM-XXXX',
			'ajaxUrl'                  => $ajax_url,
			'reload'                   => true,
			'internalAnalytics'        => true,
			'yett'        				=> false,
			'scritpsBlocked'			=> '',
			'blacklist'        			=> '',
			'whitelist'			        => '',
		);
		add_option( 'customizer_simple_cookie_control', $default_options );

		$start_internal_analytics = array(
			'since'   => date_i18n( get_option( 'date_format' ) ),
			'allow'   => 0,
			'deny'    => 0,
			'ajaxUrl' => $ajax_url,
		);
		add_option( 'analytics_simple_cookie_control', $start_internal_analytics );

	}

}
