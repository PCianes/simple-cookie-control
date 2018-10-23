<?php

/**
 * The class to control all about WordPress Customizer
 *
 * @link       https://sumapress.com
 * @since      1.0.0
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/admin
 */

/**
 * The class to control all about WordPress Customizer
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
	 * The options to change colors.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $colors;

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
		$this->data_colors = array(
			'banner'    => array(
				array(
					'key'     => 'popupBackgroundColor',
					'text'    => esc_html__( 'Main Background Color', 'simple-cookie-control' ),
					'default' => '#edeff5',
				),
				array(
					'key'     => 'popupTextColor',
					'text'    => esc_html__( 'Main Text Color', 'simple-cookie-control' ),
					'default' => '#838391',
				),
				array(
					'key'     => 'popupLinkColor',
					'text'    => esc_html__( 'Main Link Color', 'simple-cookie-control' ),
					'default' => '#ffffff',
				),
			),
			'button'    => array(
				array(
					'key'     => 'buttonBackgroundColor',
					'text'    => esc_html__( 'Button Background Color', 'simple-cookie-control' ),
					'default' => '#4b81e8',
				),
				array(
					'key'     => 'buttonTextColor',
					'text'    => esc_html__( 'Button Text Color', 'simple-cookie-control' ),
					'default' => '#ffffff',
				),
				array(
					'key'     => 'buttonBorderColor',
					'text'    => esc_html__( 'Button Border Color', 'simple-cookie-control' ),
					'default' => '#ffffff',
				),
			),
			'highlight' => array(
				array(
					'key'     => 'highlightBackgroundColor',
					'text'    => esc_html__( 'Decline Button Background Color', 'simple-cookie-control' ),
					'default' => 'transparent',
				),
				array(
					'key'     => 'highlightTextColor',
					'text'    => esc_html__( 'Decline Button Text Color', 'simple-cookie-control' ),
					'default' => '#ffffff',
				),
				array(
					'key'     => 'highlightBorderColor',
					'text'    => esc_html__( 'Decline Button Border Color', 'simple-cookie-control' ),
					'default' => 'transparent',
				),
			),

		);
	}

	/**
	 * Register the JavaScript only for the customizer preview.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts_preview_init() {

		wp_enqueue_script( $this->plugin_name . '-customizer-preview', plugin_dir_url( __FILE__ ) . 'js/simple-cookie-control-customizer-preview.js', array( 'jquery', 'customize-preview' ), $this->version, true );
	}

	/**
	 * Register the JavaScript only for the customizer controls.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts_controls() {

		$options             = get_option( 'analytics_simple_cookie_control' );
		$options['security'] = wp_create_nonce( 'simple_cookie_control_nonce_analytics' );

		wp_register_script( $this->plugin_name . '-customizer-controls', plugin_dir_url( __FILE__ ) . 'js/simple-cookie-control-customizer-controls.js', array( 'jquery' ), $this->version, true );
		wp_localize_script( $this->plugin_name . '-customizer-controls', 'analyticsCookieOptions', $options );
		wp_enqueue_script( $this->plugin_name . '-customizer-controls' );
	}

	/**
	 * Register the Styles only for the customizer controls.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles_controls() {

		wp_enqueue_style( $this->plugin_name . '-customizer-controls', plugin_dir_url( __FILE__ ) . 'css/simple-cookie-control-customizer-controls.css', array(), $this->version, 'all' );

	}

	/**
	 * Customizer control to config custom cookie banner
	 *
	 * @since    1.0.0
	 * @param      object $wp_customize       Object from WP Customize Manager
	 */
	public function register_customizer_cookie_banner( $wp_customize ) {

		$wp_customize->add_panel(
			$this->plugin_name,
			array(
				'title'       => esc_html__( 'Simple Cookie Control', 'simple-cookie-control' ),
				'description' => esc_html__( 'Customize Manager for customcookie banner', 'simple-cookie-control' ),
				'priority'    => 160,
				'capability'  => 'manage_options',
			)
		);

		$this->add_cookies_styles_section( $wp_customize );
		$this->add_cookies_content_section( $wp_customize );
		$this->add_cookies_control_section( $wp_customize );
		$this->add_cookies_advanced_section( $wp_customize );

	}

	/**
	 * Customizer control to First section: styles of the banner
	 *
	 * @since    1.0.0
	 * @param      object $wp_customize       Object from WP Customize Manager
	 */
	public function add_cookies_styles_section( $wp_customize ) {

		$section = 'scc_styles';

		$wp_customize->add_section(
			$section,
			array(
				'title'      => esc_html__( 'Styles of the banner', 'simple-cookie-control' ),
				'panel'      => $this->plugin_name,
				'priority'   => 1,
				'capability' => 'manage_options',
			)
		);

		/**
		 * Add option to set the 'POSITION'
		 */
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[position]',
			array(
				'type'       => 'option',
				'capability' => 'manage_options',
				'default'    => 'bottom',
				'transport'  => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[position]',
			array(
				'description' => esc_html__( 'Set the position of the cookie banner', 'simple-cookie-control' ),
				'section'     => $section,
				'priority'    => 1,
				'type'        => 'select',
				'choices'     => array(
					'bottom'       => esc_html__( 'Banner bottom', 'simple-cookie-control' ),
					'bottom-left'  => esc_html__( 'Bottom - Floating left', 'simple-cookie-control' ),
					'bottom-right' => esc_html__( 'Bottom - Floating right', 'simple-cookie-control' ),
					'top'          => esc_html__( 'Banner top', 'simple-cookie-control' ),
					'top-left'     => esc_html__( 'Top - Floating left', 'simple-cookie-control' ),
					'top-right'    => esc_html__( 'Top - Floating right', 'simple-cookie-control' ),
				),
			)
		);

		/**
		 * Add option to set the 'LAYOUT'
		 */
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[theme]',
			array(
				'type'       => 'option',
				'capability' => 'manage_options',
				'default'    => 'block',
				'transport'  => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[theme]',
			array(
				'description' => esc_html__( 'Set the style of the cookie banner', 'simple-cookie-control' ),
				'section'     => $section,
				'priority'    => 2,
				'type'        => 'select',
				'choices'     => array(
					'block'    => esc_html__( 'Block', 'simple-cookie-control' ),
					'classic'  => esc_html__( 'Classic', 'simple-cookie-control' ),
					'edgeless' => esc_html__( 'Edgeless', 'simple-cookie-control' ),
				),
			)
		);

		/**
		 * Add options to set the 'COLOURS'
		 */
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[colors]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => 1,
				'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[colors]',
			array(
				'label'    => esc_html__( 'Check to change colors here or uncheck to defined them in CSS.', 'simple-cookie-control' ),
				'section'  => $section,
				'priority' => 3,
				'type'     => 'checkbox',
			)
		);

		foreach ( $this->data_colors as $item ) {
			foreach ( $item as $data ) {
				$wp_customize->add_setting(
					'customizer_simple_cookie_control[' . $data['key'] . ']',
					array(
						'type'              => 'option',
						'capability'        => 'manage_options',
						'default'           => $data['default'],
						'sanitize_callback' => 'sanitize_hex_color',
						'transport'         => 'postMessage',
					)
				);
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
						$wp_customize,
						$data['key'],
						array(
							'label'    => esc_html__( $data['text'], 'simple-cookie-control' ),
							'section'  => $section,
							'settings' => 'customizer_simple_cookie_control[' . $data['key'] . ']',
						)
					)
				);
			}
		}

	}

	/**
	 * Customizer control to Second section: contents of the banner
	 *
	 * @since    1.0.0
	 * @param      object $wp_customize       Object from WP Customize Manager
	 */
	public function add_cookies_content_section( $wp_customize ) {

		$section = 'scc_content';

		$wp_customize->add_section(
			$section,
			array(
				'title'      => esc_html__( 'Contents of the banner', 'simple-cookie-control' ),
				'panel'      => $this->plugin_name,
				'priority'   => 2,
				'capability' => 'manage_options',
			)
		);

		/**
		 * Add option to set the 'MAIN MESSAGE'
		 */
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[contentMessage]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => 'This website uses cookies to ensure you get the best experience on our website.',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[contentMessage]',
			array(
				'label'    => esc_html__( 'Main Message', 'simple-cookie-control' ),
				'section'  => $section,
				'priority' => 1,
				'type'     => 'textarea',
			)
		);

		/**
		 * Add option to set the 'LINK'
		 */
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[contentLink]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => 'Learn more',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[contentLink]',
			array(
				'label'    => esc_html__( 'Link text', 'simple-cookie-control' ),
				'section'  => $section,
				'priority' => 2,
				'type'     => 'text',
			)
		);
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[contentHref]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => 'https://cookiesandyou.com',
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[contentHref]',
			array(
				'label'    => esc_html__( 'Link href (internal or external)', 'simple-cookie-control' ),
				'section'  => $section,
				'priority' => 3,
				'type'     => 'url',
			)
		);

		/**
		 * Add option to set the 'BUTTONS'
		 */
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[contentAllow]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => 'Allow cookies',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[contentAllow]',
			array(
				'label'    => esc_html__( 'Main Button', 'simple-cookie-control' ),
				'section'  => $section,
				'priority' => 4,
				'type'     => 'text',
			)
		);
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[contentDeny]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => 'Decline',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[contentDeny]',
			array(
				'label'    => esc_html__( 'Secondary Button', 'simple-cookie-control' ),
				'section'  => $section,
				'priority' => 5,
				'type'     => 'text',
			)
		);

		/**
		 * Add options to set the 'SECONDARY BANNER'
		 */
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[contentPolicy]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => '<span class="dashicons dashicons-image-filter"></span>',
				'sanitize_callback' => 'wp_kses_post',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[contentPolicy]',
			array(
				'label'       => esc_html__( 'The content of the secondary banner', 'simple-cookie-control' ),
				'description' => esc_html__( 'Put only text or even html like: "<span class="dashicons dashicons-image-filter"></span>" or an img tag.', 'simple-cookie-control' ),
				'section'     => $section,
				'priority'    => 6,
				'type'        => 'textarea',
			)
		);
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[contentRevokable]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => 1,
				'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[contentRevokable]',
			array(
				'label'       => esc_html__( 'Show or not the secondary banner after the primary one is hidden', 'simple-cookie-control' ),
				'description' => esc_html__( 'The secondary banner allow users see again the main banner to change their previous decision.', 'simple-cookie-control' ),
				'section'     => $section,
				'priority'    => 7,
				'type'        => 'checkbox',
			)
		);

	}

	/**
	 * Customizer control to third section: Analytics & cookie control
	 *
	 * @since    1.0.0
	 * @param      object $wp_customize       Object from WP Customize Manager
	 */
	public function add_cookies_control_section( $wp_customize ) {

		$section = 'scc_control';

		$wp_customize->add_section(
			$section,
			array(
				'title'      => esc_html__( 'Analytics & Cookie control', 'simple-cookie-control' ),
				'panel'      => $this->plugin_name,
				'priority'   => 3,
				'capability' => 'manage_options',
			)
		);

		/**
		 * Add options to set the 'Cookie control'
		 */
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[internalAnalytics]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => 1,
				'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[internalAnalytics]',
			array(
				'label'    => esc_html__( 'Activate or not the implementation of basic internal Analytics.', 'simple-cookie-control' ),
				'section'  => $section,
				'priority' => 1,
				'type'     => 'checkbox',
			)
		);
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[cookieName]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => 'SimpleCookieControl',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[cookieName]',
			array(
				'label'       => esc_html__( 'Cookie name', 'simple-cookie-control' ),
				'description' => esc_html__( 'Name of the cookie that keeps track of users choice.', 'simple-cookie-control' ),
				'section'     => $section,
				'priority'    => 2,
				'type'        => 'text',
			)
		);
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[cookieDays]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => 180,
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[cookieDays]',
			array(
				'label'       => esc_html__( 'Days to expiry', 'simple-cookie-control' ),
				'description' => esc_html__( 'The cookies expire date, specified in days.', 'simple-cookie-control' ),
				'section'     => $section,
				'priority'    => 3,
				'type'        => 'number',
			)
		);
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[reload]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => 1,
				'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[reload]',
			array(
				'label'    => esc_html__( 'Reload or not the web after the user make a choice.', 'simple-cookie-control' ),
				'section'  => $section,
				'priority' => 4,
				'type'     => 'checkbox',
			)
		);

		/**
		 * Add options to set the 'GTM-XXXX of Google Tag Manager'
		 */
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[googleManagerID]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => 'GTM-XXXX',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[googleManagerID]',
			array(
				'label'       => esc_html__( 'Google Tag Manager ID', 'simple-cookie-control' ),
				'description' => esc_html__( 'Set your ID of Google Tag Manager to insert your own analytics scripts.', 'simple-cookie-control' ),
				'section'     => $section,
				'priority'    => 4,
				'type'        => 'text',
			)
		);
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[googleManager]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => 'stop',
				'sanitize_callback' => array( $this, 'sanitize_radio' ),
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[googleManager]',
			array(
				'label'    => esc_html__( 'Activate or not the implementation of Google Tag Manager', 'simple-cookie-control' ),
				'section'  => $section,
				'priority' => 5,
				'type'     => 'radio',
				'choices'  => array(
					'stop'        => esc_html__( 'Do not activate it never', 'simple-cookie-control' ),
					'conditional' => esc_html__( 'Conditional on the acceptance of cookies', 'simple-cookie-control' ),
					'always'      => esc_html__( 'Always activated', 'simple-cookie-control' ),
				),
			)
		);

	}

	/**
	 * Customizer control to last section: advanced control
	 *
	 * @since    1.0.0
	 * @param      object $wp_customize       Object from WP Customize Manager
	 */
	public function add_cookies_advanced_section( $wp_customize ) {

		$section = 'scc_advanced';

		$wp_customize->add_section(
			$section,
			array(
				'title'      => esc_html__( 'Advanced control', 'simple-cookie-control' ),
				'panel'      => $this->plugin_name,
				'priority'   => 4,
				'capability' => 'manage_options',
			)
		);

		/**
		 * Add option to set or not 'YETT'
		 */
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[yett]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => 0,
				'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[yett]',
			array(
				'label'    => esc_html__( 'Add or not extra control to prevents the execution of third party scripts.', 'simple-cookie-control' ),
				'section'  => $section,
				'priority' => 1,
				'type'     => 'checkbox',
			)
		);
		/**
		 * Add options to set the 'blacklist & whitelist'
		 */
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[blacklist]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => '/googletagmanager\.com/, /piwik\.php/, /cdn\.mxpnl\.com/',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[blacklist]',
			array(
				'label'       => esc_html__( 'Blacklist to block', 'simple-cookie-control' ),
				'description' => esc_html__( 'Set comma separated list of regexes to test urls against.', 'simple-cookie-control' ),
				'section'     => $section,
				'priority'    => 2,
				'type'        => 'textarea',
			)
		);
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[whitelist]',
			array(
				'type'              => 'option',
				'capability'        => 'manage_options',
				'default'           => '/my-whitelisted-domain/',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[whitelist]',
			array(
				'label'       => esc_html__( 'Whitelist not to block', 'simple-cookie-control' ),
				'description' => esc_html__( 'Set comma separated list of regexes to test urls against.', 'simple-cookie-control' ),
				'section'     => $section,
				'priority'    => 3,
				'type'        => 'textarea',
			)
		);

	}

	/**
	 * Add extra information about shortcodes above yett control
	 *
	 * @since    1.0.0
	 */
	public function add_extra_information_above_yett_control() {

		/**
		 * Include here all html with a view file.
		 * All about [shortcode] information.
		 */
		include plugin_dir_path( dirname( __FILE__ ) ) . 'admin/views/simple-cookie-control-display-shortcode-information.php';
	}

	/**
	 * Add extra information above cookie name field
	 *
	 * @since    1.0.0
	 */
	public function add_extra_information_above_cookieName_field() {

		$current_analytics = get_option( 'analytics_simple_cookie_control' );
		$total             = $current_analytics['allow'] + $current_analytics['deny'];
		$allow             = ( 0 !== (int) $current_analytics['allow'] ) ? ( ( $current_analytics['allow'] * 100 ) / $total ) : 0;
		$deny              = ( 0 !== (int) $current_analytics['deny'] ) ? ( 100 - (int) $allow ) : 0;

		$allow_deg  = (int) ( $allow * 3.6 );
		$deny_deg   = 360 - $allow_deg;
		$deny_extra = false;
		if ( $deny_deg > 180 ) {
			$deny_extra = $deny_deg - 180;
			$deny_deg   = 180;
		}

		/**
		 * Include here all html with a view file.
		 * All about internal analytics information.
		 */
		include plugin_dir_path( dirname( __FILE__ ) ) . 'admin/views/simple-cookie-control-display-internal-analytics.php';
	}

	/**
	 * Sanitize checkbox
	 *
	 * @since    1.0.0
	 * @param      boolean $checked       Value of a checked
	 */
	public function sanitize_checkbox( $checked ) {
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	/**
	 * Sanitize radio
	 *
	 * @since    1.0.0
	 * @param      string $input      Value of selection
	 * @param      string $etting      Values of settings
	 */
	public function sanitize_radio( $input, $setting ) {
		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

}
