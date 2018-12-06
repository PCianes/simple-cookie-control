<?php
/**
 * The gutenberg-specific functionality of the plugin.
 *
 * @link       https://sumapress.com
 * @since      1.0.0
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/gutenberg
 */

/**
 * The gutenberg-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the gutenberg-specific stylesheet and JavaScript.
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/gutenberg
 * @author     SumaPress <soporte@sumapress.com>
 */
class Simple_Cookie_Control_Gutenberg {

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
	 * Add new custom categories for blocks
	 *
	 * @since    1.0.0
	 */
	public function add_custom_blocks_categories( $categories, $post ) {

		$custom_category = array(
			'slug'  => 'sumapress',
			'title' => esc_html__( 'SumaPress', 'simple-cookie-control' ),
		);

		if ( false === array_search( $custom_category['slug'], array_column( $categories, 'slug' ) ) ) {
			return array_merge( $categories, array( $custom_category ) );
		}

		return $categories;
	}

	/**
	 * Enqueue all Gutenberg blocks assets for only backend editor.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_all_blocks_assets_editor() {

		wp_register_script(
			'simple-cookie-control-gutenberg-editor',
			plugin_dir_url( __FILE__ ) . 'dist/blocks.build.js',
			array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor' ),
			filemtime( plugin_dir_path( __FILE__ ) . 'dist/blocks.build.js' )
		);

		$main_options = get_option( 'customizer_simple_cookie_control' );

		$data_to_gutenberg = array(
			'name'    => $main_options['cookieName'],
			'message' => $main_options['contentMessage'],
		);

		wp_localize_script( 'simple-cookie-control-gutenberg-editor', 'sccMainCookieData', $data_to_gutenberg );
		wp_enqueue_script( 'simple-cookie-control-gutenberg-editor' );

		wp_enqueue_style(
			'simple-cookie-control-gutenberg-editor',
			plugin_dir_url( __FILE__ ) . 'dist/blocks.editor.build.css',
			array( 'wp-edit-blocks' ),
			filemtime( plugin_dir_path( __FILE__ ) . 'dist/blocks.editor.build.css' )
		);

	}
}
