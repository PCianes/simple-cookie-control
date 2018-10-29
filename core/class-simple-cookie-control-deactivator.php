<?php
/**
 * Fired during plugin deactivation
 *
 * @link       https://sumapress.com
 * @since      1.0.0
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/core
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/core
 * @author     SumaPress <soporte@sumapress.com>
 */
class Simple_Cookie_Control_Deactivator {

	/**
	 * Action to run during the plugin's deactivation.
	 *
	 * Set to false Yett extra control which prevents the execution of third party scripts
	 * since it can give problems depending on the configuration given by the user
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

		$options         = get_option( 'customizer_simple_cookie_control' );
		$options['yett'] = false;

		update_option( 'customizer_simple_cookie_control', $options );

	}

}
