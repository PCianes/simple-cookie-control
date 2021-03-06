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
	 * The options of this plugin from customizer.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $options    The current options of this plugin.
	 */
	private $options;

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
		$this->options     = get_option( 'customizer_simple_cookie_control' );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( 'cookieconsent', plugin_dir_url( __FILE__ ) . 'css/cookieconsent.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'dashicons' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( 'cookieconsent', plugin_dir_url( __FILE__ ) . 'js/cookieconsent.min.js', array( 'jquery' ), $this->version, false );

		$options             = $this->options;
		$options['security'] = wp_create_nonce( 'simple_cookie_control_nonce_customizer' );

		wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/simple-cookie-control-public.min.js', array( 'cookieconsent', 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'customizerCookieOptions', $options );
		wp_enqueue_script( $this->plugin_name );

	}

	/**
	 * Register the JavaScript for the Yett library
	 *
	 * @since    1.0.0
	 */
	public function enqueue_yett_scripts() {
		$options = $this->options;
		?>
		<!-- Yett Manager -->
		<script>
			window.YETT_BLACKLIST = [ <?php echo esc_js( $options['blacklist'] ); ?> ];
			window.YETT_WHITELIST = [ <?php echo esc_js( $options['whitelist'] ); ?> ]; 
		</script>
		<script src='<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'js/simple-cookie-control-yett.min.js' ); ?>'></script>
		<!-- End Yett Manager -->
		<?php
	}

	/**
	 * Add attribute 'javascript/bloked' to some scripts to allow Yet block them
	 *
	 * @since    1.0.0
	 */
	function add_block_attribute_to_scripts( $tag, $handle, $src ) {

		$files_names_to_block = explode( ',', $this->options['scritpsBlocked'] );

		foreach ( $files_names_to_block as $file_name ) {
			if ( strrpos( $src, trim( $file_name ) ) !== false ) {
				return '<script type="javascript/bloked" src="' . esc_url( $src ) . '></script>';
			}
		}

		return $tag;
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
		})(window,document,'script','dataLayer','<?php echo esc_js( $this->options['googleManagerID'] ); ?>');</script>
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
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_js( $this->options['googleManagerID'] ); ?>"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<?php
	}

	/**
	 * Add Shortcode 'SCC_IFRAME' to conditional iframe by cookie control
	 *
	 * @since    1.0.0
	 * @param      array $atts       The attributes of the shortcode
	 */
	public function cookie_control_iframe( $atts ) {

		$options                 = $this->options;
		$value_of_cookie_control = 'allow';

		extract(
			shortcode_atts(
				array(
					'width'       => '600',
					'height'      => '450',
					'id'          => 'scc-iframe',
					'iframe'      => '#',
					'img'         => '#',
					'message'     => $options['contentMessage'],
					'cookie_name' => $options['cookieName'],
				),
				$atts
			)
		);

		if ( $value_of_cookie_control === $_COOKIE[ $options['cookieName'] ] || $value_of_cookie_control === $_COOKIE[ $cookie_name ] ) {
			return '<iframe width="' . (int) $width . '" height="' . (int) $height . '" src="' . esc_url( $iframe ) . '" frameborder="0" allowfullscreen></iframe>' . sprintf( '<span class="scc-secundary-deny" data-cookie-name="%s" data-cookie-value="%s" style="display: none;"></span>', esc_html( $cookie_name ), esc_html( $value_of_cookie_control ) );
		} else {
			return sprintf( '<img id="%s" src="%s"/><button type="button" class="scc-secundary-banner" data-cookie-name="%s" data-cookie-value="%s">%s</button>', esc_attr( $id ), esc_url( $img ), esc_html( $cookie_name ), esc_html( $value_of_cookie_control ), esc_html( $message ) );
		}

	}

	/**
	 * Add Shortcode 'SCC_ALLOW' to conditional content by cookie control
	 *
	 * @since    1.0.0
	 * @param      array  $atts       The attributes of the shortcode
	 * @param      string $content   The content of the shortcode
	 */
	public function cookie_control_allow( $atts, $content ) {

		return $this->return_shortcode_by_cookie_control( 'allow', $atts, $content );

	}

	/**
	 * Add Shortcode 'SCC_DENY' to conditional content by cookie control
	 *
	 * @since    1.0.0
	 * @param      array  $atts       The attributes of the shortcode
	 * @param      string $content   The content of the shortcode
	 */
	public function cookie_control_deny( $atts, $content ) {

		return $this->return_shortcode_by_cookie_control( 'deny', $atts, $content );

	}

	/**
	 * Return shortcode by parameters
	 *
	 * @since    1.0.0
	 * @param      string $value_of_cookie_control    The value of cookie control: 'allow' or 'deny'
	 * @param      array  $atts                  The attributes of the shortcode
	 * @param      string $content              The content of the shortcode
	 */
	private function return_shortcode_by_cookie_control( $value_of_cookie_control, $atts, $content ) {

		$options = $this->options;

		extract(
			shortcode_atts(
				array(
					'message'     => $options['contentMessage'],
					'cookie_name' => $options['cookieName'],
					'class'       => 'scc-secundary-cookie-button',
					'banner'      => 'true',
				),
				$atts
			)
		);

		/**
		 * Set the HTML to output with this function
		 */
		$output_content = do_shortcode( $content ) . sprintf( '<span class="scc-secundary-deny" data-cookie-name="%s" data-cookie-value="%s" style="display: none;"></span>', esc_attr( $cookie_name ), esc_attr( $value_of_cookie_control ) );
		$output_button  = sprintf( '<button type="button" class="scc-secundary-banner %s" data-cookie-name="%s" data-cookie-value="%s">%s</button>', esc_attr( $class ), esc_attr( $cookie_name ), esc_attr( $value_of_cookie_control ), esc_html( $message ) );

		/**
		 * Put under new variables the value of cookies for a better understanding
		*/
		$main_cookie_name       = $options['cookieName'];
		$main_cookie_value      = $_COOKIE[ $main_cookie_name ];
		$secundary_cookie_value = $_COOKIE[ $cookie_name ];

		/**
		 * Early return if all is allow under main cookie
		 */
		if ( 'allow' === $main_cookie_value ) {
			if ( 'allow' === $value_of_cookie_control ) {
				return $output_content; }
			if ( 'deny' === $value_of_cookie_control ) {
				return ''; }
		}

		/**
		 * In case of deny control and we are not under main cookie
		 * check control only under allow secundary cookie
		 */
		if ( ( 'deny' === $value_of_cookie_control ) && ( $main_cookie_name != $cookie_name ) && ( 'allow' === $secundary_cookie_value ) ) {
			if ( 'true' === $banner ) {
				return $output_button;
			} else {
				return ''; }
		}

		/**
		 * Check all other situations: not decision yet, main cookie and secundary cookies
		 */
		$check_deny_not_decision = ( 'deny' === $value_of_cookie_control ) && ( ! isset( $main_cookie_value ) );

		if ( $check_deny_not_decision || $value_of_cookie_control === $main_cookie_value || $value_of_cookie_control === $secundary_cookie_value ) {
			return $output_content;
		} elseif ( 'true' === $banner ) {
			return $output_button;
		}

	}

}
