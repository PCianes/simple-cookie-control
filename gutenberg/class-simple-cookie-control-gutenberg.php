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

		$this->load_dependencies();
	}

	/**
	 * Load the required dependencies for the Gutenberg facing functionality.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		/**
		 * The static class responsible for dynamic callbacks from PHP to Gutenberg
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'gutenberg/class-simple-cookie-control-render-dynamic.php';
	}

	/**
	 * Add new custom categories for blocks
	 *
	 * @since    1.0.0
	 */
	public function add_custom_blocks_categories( $categories, $post ) {

		if ( $post->post_type !== 'post' ) {
			return $categories;
		}

		return array_merge(
			$categories,
			array(
				array(
					'slug' => 'simple-cookie-control',
					'title' => __( 'Simple_Cookie_Control', 'simple-cookie-control' ),
				),
			)
		);
	}

	/**
	 * Enqueue all Gutenberg blocks assets for only backend editor.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_all_blocks_assets_editor() {

		wp_enqueue_script(
			'simple-cookie-control-gutenberg-editor',
			plugin_dir_url( __FILE__ ) . 'dist/blocks.build.js',
			array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components' ),
			filemtime( plugin_dir_path( __FILE__ ) . 'dist/blocks.build.js' )
		);

		wp_enqueue_style(
			'simple-cookie-control-gutenberg-editor',
			plugin_dir_url( __FILE__ ) . 'dist/blocks.editor.build.css',
			array( 'wp-edit-blocks' ),
			filemtime( plugin_dir_path( __FILE__ ) . 'dist/blocks.editor.build.css' )
		);

	}

	/**
	 * Enqueue all Gutenberg blocks assets for both frontend + backend.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_all_blocks_assets() {

		wp_enqueue_style(
			'simple-cookie-control-gutenberg',
			plugin_dir_url( __FILE__ ) . 'dist/blocks.style.build.css',
			array( 'wp-blocks' ),
			filemtime( plugin_dir_path( __FILE__ ) . 'dist/blocks.style.build.css' )
		);
	}

	/**
	 * Enqueue all Gutenberg blocks assets for only frontend
	 *
	 * @since    1.0.0
	 */
	public function enqueue_all_blocks_assets_frontend() {

		/**
		 * If in the backend, bail out.
		 *
		 * @since    1.0.0
		 */
		if ( is_admin() ) {
			return;
		}

		wp_enqueue_script(
			'simple-cookie-control-gutenberg-frontend',
			plugin_dir_url( __FILE__ ) . 'src/frontend.blocks.js',
			array(),
			filemtime( plugin_dir_path( __FILE__ ) . 'src/frontend.blocks.js' )
		);
	}

	/**
	 * Allow to work in Gutenberg with dynamic blocks
	 *
	 * @since    1.0.0
	 */
	public function register_dynamic_blocks() {

		/**
		 * Only load if Gutenberg is available.
		 */
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

		/**
		 * Hook server side rendering into render callback
		 */
		register_block_type( 'simple-cookie-control/block-name-dynamic', array(
			'attributes'      => array(
				'number' => array(
					'type' => 'number',
					'default' => 5
				),
			),
			'render_callback' => array( Simple_Cookie_Control_Render_Dynamic::class, 'block_name_dynamic'),
		 	)
		);

	}

	/**
	 * Allow to work in Gutenberg with some meta fields
	 *
	 * @since    1.0.0
	 */
	public function register_meta_fields() {

		register_meta(
			'post',
			'simple-cookie-control-meta-key-name',
			array(
				'type'         => 'string', //'number'
				'single'       => true,
				'show_in_rest' => true,
			 )
		);

	}

	/**
	 * Add Gutenberg templates to post types
	 *
	 * @since    1.0.0
	 */
	public function add_templates_to_post_types( $args, $post_type ) {

		if ( 'post' == $post_type ) {

			$args['template_lock'] = true;
			$args['template']      = [
				[
					'core/image',
					[
						'align' => 'left',
					],
				],
				[
					'core/paragraph',
					[
						'placeholder' => 'The only thing you can add',
					],
				],
			];
		}

		return $args;

	}

	/**
	 * Limit and allowed blocks into a post type 
	 *
	 * @since    1.0.0
	 */
	public function allowed_blocks_to_post_types( $allowed_block_types, $post ) {

		/**
		 * List of core blocks: 'core/block-name'
		 * archives, audio, button, categories, code, column, columns, coverImage, embed, file, freeform,
		 * gallery, heading, html, image, latestComments, latestPosts, list, more, nextpage, paragraph,
		 * preformatted, pullquote, quote, reusableBlock, separator, shortcode, spacer, subhead,
		 * table, textColumns, verse, video
		 */
		if ( $post->post_type === 'book' ) {
			return array(
			  'core/paragraph',
			  'core/image',
			  'core/list'
			);
		}

		return $allowed_block_types;

	}

	/**
	 * Limit where you can work with Gutenberg
	 *
	 * @since    1.0.0
	 */
	public function gutenberg_removal() {

		$gutenfree = array( 'post_type_ONE', 'post_type_TWO', 'post_type_THREE' );

		// WP 5.0+ requires Classic Editor
		// WP 4.9- requires Gutenberg
		if ( ( version_compare( get_bloginfo( 'version' ), 5.0, '<=' ) && ! is_plugin_active( 'gutenberg/gutenberg.php' ) ) || ( version_compare( get_bloginfo( 'version' ), 5.0, '=>' ) && ! is_plugin_active( 'classic-editor/classic-editor.php' ) ) ) {
			return;
		}

		// Intercept Post Type
		$current_screen    = get_current_screen();
		$current_post_type = $current_screen->post_type;

		// If this is one of our custom post types, we don't gutenize
		if ( in_array( $current_post_type, $gutenfree, true ) ) {
			remove_filter( 'replace_editor', 'gutenberg_init' );
			remove_action( 'load-post.php', 'gutenberg_intercept_edit_post' );
			remove_action( 'load-post-new.php', 'gutenberg_intercept_post_new' );
			remove_action( 'admin_init', 'gutenberg_add_edit_link_filters' );
			remove_filter( 'admin_url', 'gutenberg_modify_add_new_button_url' );
			remove_action( 'admin_print_scripts-edit.php', 'gutenberg_replace_default_add_new_button' );
			remove_action( 'admin_enqueue_scripts', 'gutenberg_editor_scripts_and_styles' );
			remove_filter( 'screen_options_show_screen', '__return_false' );
		}

	}
}
