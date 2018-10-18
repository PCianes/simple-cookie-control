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
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site and also into admin area, like libraries and helpers
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-simple-cookie-control-includes.php';

		$includes = new Simple_Cookie_Control_Includes( $this->get_plugin_name(), $this->get_version() );

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
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_filter( 'plugin_action_links_simple-cookie-control/simple-cookie-control.php', $plugin_admin, 'settings_link_on_plugins_table' );

		$customizer = new Simple_Cookie_Control_Customizer( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'customize_preview_init', $customizer, 'enqueue_scripts_preview_init' );
		$this->loader->add_action( 'customize_controls_enqueue_scripts', $customizer, 'enqueue_scripts_controls' );
		$this->loader->add_action( 'customize_register', $customizer, 'register_customizer_cookie_banner' );
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

		if( 'always' === $plugin_options['googleManager'] || ( 'conditional' === $plugin_options['googleManager'] && 'allow' === $_COOKIE[ $plugin_options['cookieName'] ] ) ) {
			$this->loader->add_action( 'wp_head', $plugin_public, 'enqueue_head_google_scripts', 1 );
			$this->loader->add_action( 'wp_footer', $plugin_public, 'enqueue_body_google_scripts', 1 );
		}
		
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
		$this->loader->add_action( 'enqueue_block_assets', $plugin_gutenberg, 'enqueue_all_blocks_assets' );
		$this->loader->add_action( 'enqueue_block_assets', $plugin_gutenberg, 'enqueue_all_blocks_assets_frontend' );

		$this->loader->add_filter( 'block_categories', $plugin_gutenberg, 'add_custom_blocks_categories', 10, 2 );
		$this->loader->add_action( 'init', $plugin_gutenberg, 'register_dynamic_blocks' );
		$this->loader->add_action( 'init', $plugin_gutenberg, 'register_meta_fields' );
		//$this->loader->add_filter( 'register_post_type_args', $plugin_gutenberg, 'add_templates_to_post_types', 20, 2 );
		//$this->loader->add_filter( 'allowed_block_types', $plugin_gutenberg, 'allowed_blocks_to_post_types', 20, 2 );
		//$this->loader->add_action( 'current_screen', $plugin_gutenberg, 'gutenberg_removal' );


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
