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
    <h3 style="color: red;"><?php esc_html_e( 'With this plugin you can show/hide conditional content depending on the acceptance of cookies with:', 'simple-cookie-control' ); ?></h3>
    <ul>
        <li>* <?php esc_html_e( 'A specific block of gutenberg.' , 'simple-cookie-control' ); ?></li>
        <li>* <?php esc_html_e( 'Some shortocodes described below.' , 'simple-cookie-control' ); ?></li>
        <li>* <?php esc_html_e( 'Others advanced options that you can configure in this section.' , 'simple-cookie-control' ); ?></li>
    </ul>
    <hr>
    <h3>[SCC_ALLOW] <?php esc_html_e( 'your content', 'simple-cookie-control' ); ?> [/SCC_ALLOW]</h3>
    <p><?php esc_html_e( 'Shortcode to show the content only when cookies have been accepted.', 'simple-cookie-control' ); ?></p>
    <h3>[SCC_DENY] <?php esc_html_e( 'your content', 'simple-cookie-control' ); ?> [/SCC_DENY]</h3>
    <p><?php esc_html_e( 'Shortcode to show the content only when cookies have not been yet accepted (or even are rejected).', 'simple-cookie-control' ); ?></p>
    <h3>[SCC_IFRAME]</h3>
    <p><?php esc_html_e( 'Shortcode to show IFRAME only when the user has accepted cookies or in another case this one show an IMAGE.', 'simple-cookie-control' ); ?></p>
    <ul>
    	<li><strong><?php esc_html_e( 'Attributes for [SCC_ALLOW], [SCC_DENY], [SCC_IFRAME] ', 'simple-cookie-control' ); ?>:</strong></li>
        <li><strong>message=</strong>"<?php esc_html_e( 'message to show like a button to allow user to accept cookies of these shortcodes restring content', 'simple-cookie-control' ); ?>"</li>
        <li><strong>cookie_name=</strong>"<?php esc_html_e( "define a cookie if you want allow partial acceptance even though the main banner's cookies have been rejected", 'simple-cookie-control' ); ?>"</li>
        <li><strong>cookie_value=</strong>"<?php esc_html_e( 'define cookie value for your custom cookie', 'simple-cookie-control' ); ?>"</li>
        <li><strong>banner=</strong>"<?php esc_html_e( "define 'true'(default) or 'false' to show or not a secundary banner as button.", 'simple-cookie-control' ); ?>"</li>
    </ul>
    <ul>
    	<li><strong><?php esc_html_e( 'Extra attributes only for [SCC_IFRAME] ', 'simple-cookie-control' ); ?>:</strong></li>
    	<li><strong>img=</strong>"<?php esc_html_e( 'url of the image to show when the user has NOT accepted cookies yet', 'simple-cookie-control' ); ?>"</li>
    	<li><strong>id=</strong>"<?php esc_html_e( 'unique name to identify the previous image with CSS or JS', 'simple-cookie-control' ); ?>"</li>
    	<li><strong>iframe=</strong>"<?php esc_html_e( 'url /embed/ of the iframe to show when the user has accepted cookies', 'simple-cookie-control' ); ?>"</li>
    	<li><strong>width=</strong>"<?php esc_html_e( 'width in pixels for the iframe', 'simple-cookie-control' ); ?>"</li>
    	<li><strong>height=</strong>"<?php esc_html_e( 'height in pixels for the iframe', 'simple-cookie-control' ); ?>"</li>
    </ul>
<hr>
<h3 style="color: red;"><?php esc_html_e( 'Try to force automatically the blocking of scripts?', 'simple-cookie-control' ); ?></h3>
</div>