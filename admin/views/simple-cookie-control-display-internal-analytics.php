<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://sumapress.com
 * @since      1.0.0
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/admin/views
 */

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<li id="customize-control-customizer_simple_cookie_control-internalAnaltics" class="customize-control customize-control-analytics" style="display: list-item">
	<p class="css-analytics-total"><?php printf( esc_html__( 'Total: %s', 'simple-cookie-control' ), $total ); ?></p>
	<div class="pieContainer">
		<div class="pieBackground"></div>
		<div id="deny" class="hold"><div class="pie" style="transform:rotate(<?php echo esc_attr( $deny_deg ); ?>deg);"></div></div>
		<?php if ( $deny_extra ) : ?>
		<div id="deny-extra" class="hold" style="transform:rotate(<?php echo esc_attr( $deny_deg ); ?>deg);"><div class="pie" style="transform:rotate(<?php echo esc_attr( $deny_extra ); ?>deg);"></div></div>
		<?php endif; ?>
		<div class="innerCircle">
			<div class="content">
				<b><?php echo esc_html__( 'Data from:', 'simple-cookie-control' ); ?></b><br><?php echo esc_html( $current_analytics['since'] ); ?>
				<div class="css-analytics-allow-deny">
					<p class="allow"><?php echo esc_html__( 'Accepted', 'simple-cookie-control' ); ?>
					<span><?php echo (int) $allow; ?>%</span></p>
					<p class="deny"><?php echo esc_html__( 'Rejected', 'simple-cookie-control' ); ?>
					<span><?php echo (int) $deny; ?>%</span></p>
				</div>
			</div>
		</div>
	</div>
	<button id="scc-reset-cookies-analytics" type="button" class="css-analytics-reset"><?php echo esc_html__( 'Reset data', 'simple-cookie-control' ); ?></button>
</li>

