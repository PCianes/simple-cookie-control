<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://sumapress.com
 * @since      1.0.0
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/public
 * @author     SumaPress <soporte@sumapress.com>
 */
class Simple_Cookie_Control_Public {

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
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->load_dependencies();
	}

	/**
	 * Load the required dependencies for the Public facing functionality.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		/**
		 * The class responsible for ...
		 */
		// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-simple-cookie-control-class-name.php'; .
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/simple-cookie-control-public.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cookieconsent.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'dashicons' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( 'cookieconsent', plugin_dir_url( __FILE__ ) . 'js/cookieconsent.js', array( 'jquery' ), $this->version, false );

		$options = get_option( 'customizer_simple_cookie_control' );
		$options['security'] = wp_create_nonce( 'simple_cookie_control_nonce_customizer' );

		wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/simple-cookie-control-public.js', array( 'cookieconsent', 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'customizerCookieOptions', $options );
		wp_enqueue_script( $this->plugin_name );

	}

	/**
	 * Add Google tag manager script into the head
	 *
	 * @since    1.0.0
	 */
	public function enqueue_head_google_scripts() {
		?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','<?php echo esc_js( get_option( 'customizer_simple_cookie_control' )['googleManagerID'] ); ?>');</script>
		<!-- End Google Tag Manager -->
		<?php 
	}

	/**
	 * Add Google tag manager script into the body
	 *
	 * @since    1.0.0
	 */
	public function enqueue_body_google_scripts() {
		?>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_js( get_option( 'customizer_simple_cookie_control' )['googleManagerID'] ); ?>"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<?php
	}

}