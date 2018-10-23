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

<div class="wrap">
    <h3><?php esc_html_e( 'You can show/hide conditional content with the Gutenberg blocks of this plugin, but also with this available shortcodes to use:', 'simple-cookie-control' ); ?></h3>
    <hr>
    <h3>[SCC_IFRAME]</h3>
    <ul>
    	<li><strong><?php esc_html_e( 'Attributes', 'simple-cookie-control' ); ?>:</strong></li>
    	<li><strong>img=</strong>"<?php esc_html_e( 'url of the image to show when the user has NOT accepted cookies yet', 'simple-cookie-control' ); ?>"</li>
    	<li><strong>id=</strong>"<?php esc_html_e( 'unique name to identify the previous image with CSS or JS', 'simple-cookie-control' ); ?>"</li>
    	<li><strong>iframe=</strong>"<?php esc_html_e( 'url /embed/ of the iframe to show when the user has accepted cookies', 'simple-cookie-control' ); ?>"</li>
        <li><strong>message=</strong>"<?php esc_html_e( 'message to show like a button to allow user to accept cookies of the iframe', 'simple-cookie-control' ); ?>"</li>
        <li><strong>cookie_name=</strong>"<?php esc_html_e( "define a cookie if you want allow partial acceptance even though the main banner's cookies have been rejected", 'simple-cookie-control' ); ?>"</li>
        <li><strong>cookie_value=</strong>"<?php esc_html_e( 'define cookie value for your custom cookie', 'simple-cookie-control' ); ?>"</li>
    	<li><strong>width=</strong>"<?php esc_html_e( 'width in pixels for the iframe', 'simple-cookie-control' ); ?>"</li>
    	<li><strong>height=</strong>"<?php esc_html_e( 'height in pixels for the iframe', 'simple-cookie-control' ); ?>"</li>
    </ul>
    <hr>
    <h3>[SCC_ALLOW] <?php esc_html_e( 'your content', 'simple-cookie-control' ); ?> [/SCC_ALLOW]</h3>
    <p><?php esc_html_e( 'Shortcode to show content only when cookies have been accepted.', 'simple-cookie-control' ); ?></p>
    <h3>[SCC_DENY] <?php esc_html_e( 'your content', 'simple-cookie-control' ); ?> [/SCC_DENY]</h3>
    <p><?php esc_html_e( 'Shortcode to show content only when cookies have not been acepted or rejected.', 'simple-cookie-control' ); ?></p>
    <ul>
    	<li><strong><?php esc_html_e( 'Attributes for [SCC_ALLOW] & [SCC_DENY]', 'simple-cookie-control' ); ?>:</strong></li>
        <li><strong>message=</strong>"<?php esc_html_e( 'message to show like a button to allow user to accept cookies of these shortcodes restring content', 'simple-cookie-control' ); ?>"</li>
        <li><strong>cookie_name=</strong>"<?php esc_html_e( "define a cookie if you want allow partial acceptance even though the main banner's cookies have been rejected", 'simple-cookie-control' ); ?>"</li>
        <li><strong>cookie_value=</strong>"<?php esc_html_e( 'define cookie value for your custom cookie', 'simple-cookie-control' ); ?>"</li>
    </ul>
<hr>
<h3 style="color: red;"><?php esc_html_e( 'Try to force automatically the blocking of scripts', 'simple-cookie-control' ); ?></h3>
<p><?php esc_html_e( 'It is strongly recommended that you add type attributes ( type="javascript/blocked" ) to <script> tags having src attributes that you want to block. It is necessary for script execution blocking to work in the Edge browser, and has the benefit of also preventing the scripts from loading in all other major browsers.', 'simple-cookie-control' ); ?></p>
</div>