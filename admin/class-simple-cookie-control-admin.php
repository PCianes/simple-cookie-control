<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://sumapress.com
 * @since      1.0.0
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/admin
 * @author     SumaPress <soporte@sumapress.com>
 */
class Simple_Cookie_Control_Admin {

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

		$this->load_dependencies();
	}

	/**
	 * Load the required dependencies for the Admin facing functionality.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		/**
		 * The class responsible for Customizer
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-simple-cookie-control-customizer.php';

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Simple_Cookie_Control_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Simple_Cookie_Control_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/simple-cookie-control-admin.min.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Simple_Cookie_Control_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Simple_Cookie_Control_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/simple-cookie-control-admin.min.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Add setting link to customizer on plugins table
	 *
	 * @since    1.0.0
	 * @param      array $links      Array with links of the plugin
	 */
	public function settings_link_on_plugins_table( $links ) {

		array_unshift( $links, '<a href="customize.php">' . __( 'Go to customizer', 'simple-cookie-control' ) . '</a>' );
		return $links;

	}


	/**
	 * Add new input into database about the choice of the user in relation to allow or not the cookies
	 * Action from Ajax by simple-cookie-control-public.js
	 *
	 * @since    1.0.0
	 */
	public function add_user_choice_into_db() {

		check_ajax_referer( 'simple_cookie_control_nonce_customizer', 'security' );

		$choice = ! empty( $_POST['choice'] ) ? $_POST['choice'] : false;

		if ( $choice ) {
			$current_analytics = get_option( 'analytics_simple_cookie_control' );
			switch ( $choice ) {
				case 'allow':
					$current_analytics['allow'] = $current_analytics['allow'] + 1;
					break;

				case 'deny':
					$current_analytics['deny'] = $current_analytics['deny'] + 1;
					break;

				default:
					break;
			}
			update_option( 'analytics_simple_cookie_control', $current_analytics );
		}

		header( 'Content-type: application/json' );
		echo json_encode( true );
		die;

	}

	/**
	 * Reset counters and date of internal cookies analytics which show into customizer
	 * Action from Ajax by simple-cookie-control-customizer-controls.js
	 *
	 * @since    1.0.0
	 */
	public function reset_cookies_analytics() {

		check_ajax_referer( 'simple_cookie_control_nonce_analytics', 'security' );

		if ( ! empty( $_POST['reset'] ) && $_POST['reset'] ) {
			$start_internal_analytics = array(
				'since'    => date_i18n( get_option( 'date_format' ) ),
				'allow'    => 0,
				'deny'     => 0,
				'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
				'security' => wp_create_nonce( 'simple_cookie_control_nonce_analytics' ),
			);
			update_option( 'analytics_simple_cookie_control', $start_internal_analytics );
		}

		header( 'Content-type: application/json' );
		echo json_encode( true );
		die;
	}

}
