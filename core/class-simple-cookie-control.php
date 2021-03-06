<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that core attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://sumapress.com
 * @since      1.0.0
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/core
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/core
 * @author     SumaPress <soporte@sumapress.com>
 */
class Simple_Cookie_Control {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Simple_Cookie_Control_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'SIMPLE_COOKIE_CONTROL_VERSION' ) ) {
			$this->version = SIMPLE_COOKIE_CONTROL_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'simple-cookie-control';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_gutenberg_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Simple_Cookie_Control_Loader. Orchestrates the hooks of the plugin.
	 * - Simple_Cookie_Control_i18n. Defines internationalization functionality.
	 * - Simple_Cookie_Control_Admin. Defines all hooks for the admin area.
	 * - Simple_Cookie_Control_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/class-simple-cookie-control-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/class-simple-cookie-control-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-simple-cookie-control-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-simple-cookie-control-public.php';

		/**
		 * The class responsible for defining all actions that occur about new WordPress editor: GUTENBERG
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'gutenberg/class-simple-cookie-control-gutenberg.php';

		/**
		 * Get loader using its singleton
		 */
		$this->loader = Simple_Cookie_Control_Loader::get_instance();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Simple_Cookie_Control_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Simple_Cookie_Control_I18n( $this->plugin_name );

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * Instance all class you have into ADMIN folder and add the objet to the loader,
	 * and remember to 'require_once' into admin class on the function: load_dependencies()
	 * similar this core class.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Simple_Cookie_Control_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_filter( 'plugin_action_links_simple-cookie-control/simple-cookie-control.php', $plugin_admin, 'settings_link_on_plugins_table' );
		$this->loader->add_filter( 'wp_ajax_save_user_choice', $plugin_admin, 'add_user_choice_into_db' );
		$this->loader->add_filter( 'wp_ajax_nopriv_save_user_choice', $plugin_admin, 'add_user_choice_into_db' );
		$this->loader->add_filter( 'wp_ajax_reset_cookies_analytics', $plugin_admin, 'reset_cookies_analytics' );
		$this->loader->add_filter( 'wp_ajax_nopriv_reset_cookies_analytics', $plugin_admin, 'reset_cookies_analytics' );

		$customizer = new Simple_Cookie_Control_Customizer( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'customize_preview_init', $customizer, 'enqueue_scripts_preview_init' );
		$this->loader->add_action( 'customize_controls_enqueue_scripts', $customizer, 'enqueue_scripts_controls' );
		$this->loader->add_action( 'customize_controls_print_styles', $customizer, 'enqueue_styles_controls' );
		$this->loader->add_action( 'customize_register', $customizer, 'register_customizer_cookie_banner' );
		$this->loader->add_action( 'customize_render_control_customizer_simple_cookie_control[cookieName]', $customizer, 'add_extra_information_above_cookieName_field' );
		$this->loader->add_action( 'customize_render_control_customizer_simple_cookie_control[yett]', $customizer, 'add_extra_information_above_yett_control' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * Instance all class you have into PUBLIC folder and add the objet to the loader,
	 * and remember to 'require_once' into admin class on the function: load_dependencies()
	 * similar this core class.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Simple_Cookie_Control_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		$plugin_options = get_option( 'customizer_simple_cookie_control' );

		if ( $plugin_options['yett'] && 'allow' !== $_COOKIE[ $plugin_options['cookieName'] ] ) {
			$this->loader->add_action( 'wp_head', $plugin_public, 'enqueue_yett_scripts', 1 );
			$this->loader->add_action( 'script_loader_tag', $plugin_public, 'add_block_attribute_to_scripts', 9999, 3 );
		}

		if ( 'always' === $plugin_options['googleManager'] || ( 'conditional' === $plugin_options['googleManager'] && isset( $_COOKIE[ $plugin_options['cookieName'] ] ) && 'allow' === $_COOKIE[ $plugin_options['cookieName'] ] ) ) {
			$this->loader->add_action( 'wp_head', $plugin_public, 'enqueue_head_google_scripts', 1 );
			$this->loader->add_action( 'wp_footer', $plugin_public, 'enqueue_body_google_scripts', 1 );
		}

		$this->loader->add_shortcode( 'SCC_IFRAME', $plugin_public, 'cookie_control_iframe' );
		$this->loader->add_shortcode( 'SCC_ALLOW', $plugin_public, 'cookie_control_allow', 10, 2 );
		$this->loader->add_shortcode( 'SCC_DENY', $plugin_public, 'cookie_control_deny', 10, 2 );

	}

	/**
	 * Register all of the hooks related to Gutenberg
	 *
	 * Instance all class you have into GUTENBERG folder and add the objet to the loader,
	 * and remember to 'require_once' into gutenberg class on the function: load_dependencies()
	 * similar this core class.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_gutenberg_hooks() {

		$plugin_gutenberg = new Simple_Cookie_Control_Gutenberg( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'enqueue_block_editor_assets', $plugin_gutenberg, 'enqueue_all_blocks_assets_editor' );

		$this->loader->add_filter( 'block_categories', $plugin_gutenberg, 'add_custom_blocks_categories', 10, 2 );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Simple_Cookie_Control_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
