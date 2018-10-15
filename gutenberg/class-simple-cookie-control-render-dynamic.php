<?php
/**
 * The static callbacks from php to render by Gutenberg
 *
 * @link       https://sumapress.com
 * @since      1.0.0
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/gutenberg
 */

/**
 * The static callbacks from php to render by Gutenberg
 *
 * Defines the plugin name and version
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/gutenberg
 * @author     SumaPress <soporte@sumapress.com>
 */
class Simple_Cookie_Control_Render_Dynamic {

	/**
	 * Callback 'block-name-dynamic' to render dynamic block
	 *
	 * @since    1.0.0
	 */
	public static function block_name_dynamic( $attributes ) {

		$recent_posts = wp_get_recent_posts( [
			'numberposts' => (int) $attributes['number'],
			'post_status' => 'publish',
		] );

		if ( empty( $recent_posts ) ) {
			return '<p>No posts</p>';
		}

		$markup = '<ul>';

		foreach ( $recent_posts as $post ) {
			$post_id  = $post['ID'];
			$markup  .= sprintf(
				'<li><a href="%1$s">%2$s</a></li>',
				esc_url( get_permalink( $post_id ) ),
				esc_html( get_the_title( $post_id ) )
			);
		}

		return "{$markup}<ul>";

	}

}
