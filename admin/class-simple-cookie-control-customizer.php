<?php

/**
 * The info about this file
 *
 * @link       https://sumapress.com
 * @since      1.0.0
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/admin
 */

/**
 * The info about this class
 *
 * Defines the functions of this class
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/admin
 * @author     SumaPress <soporte@sumapress.com>
 */
class Simple_Cookie_Control_Customizer {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Customizer control to config cookie banner
	 *
	 * @since    1.0.0
	 */
	public function register_customizer_cookie_banner( $wp_customize ) {

		$wp_customize->add_panel(
			'demo_panel',
			array(
				'title'       => __( 'Esta es una demo', 'textdomain' ),
				'description' => __( 'Aqui podemos mostrar un mensaje', 'textdomain' ),
				'priority'    => 160,
				'capability'  => 'edit_theme_options',
			)
		);

		  // Primera seccion
		$wp_customize->add_section(
			'primera_seccion',
			array(
				'title'      => __( 'Primera Seccion', 'textdomain' ),
				'panel'      => 'demo_panel',
				'priority'   => 1,
				'capability' => 'edit_theme_options',
			)
		);

		  // Segunda Seccion
		$wp_customize->add_section(
			'segunda_seccion',
			array(
				'title'      => __( 'Segunda Seccion', 'textdomain' ),
				'panel'      => 'demo_panel',
				'priority'   => 2,
				'capability' => 'edit_theme_options',
			)
		);

		  // Campo de texto
		$wp_customize->add_setting(
			'campo_texto',
			array(
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			'campo_texto',
			array(
				'label'    => __( 'Ejemplo input', 'textdomain' ),
				'section'  => 'primera_seccion',
				'priority' => 1,
				'type'     => 'text',
			)
		);

			// Campo textarea
		$wp_customize->add_setting(
			'campo_textarea',
			array(
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			'campo_textarea',
			array(
				'label'    => __( 'Ejemplo textarea', 'textdomain' ),
				'section'  => 'primera_seccion',
				'priority' => 1,
				'type'     => 'textarea',
			)
		);

	}


}
