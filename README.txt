=== Simple Cookie Control ===
Contributors: sumapress, pablocianes
Donate link: https://pablocianes.com/
Tags: cookie, cookie consent, cookie law, GDPR, gutenberg cookie block
Requires at least: 4.6
Tested up to: 5.3
Stable tag: trunk
Requires PHP: 5.2.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple banner to inform users that your site uses cookies and blocks them until the visitor accepts.

== Description ==

Cookie control and customizable cookie message to comply with the EU cookie law GDPR regulations with following features:

* Cookie banner configurable from the WordPress customizer: position, styles, colors and content.
* Show or not a secondary banner after the primary one is hidden: which allow users see again the main banner to change their previous decision.
* Activate or not the implementation of basic internal Analytics to know the number of acceptances and rejections.
* Change the name and days to expiry of the cookie that keeps track of users choice.
* Activate the implementation of Google Tag Manager (Google Analytics): conditional on the acceptance of cookies.


Also with this plugin you can show/hide conditional content depending on the acceptance of cookies with:

* A specific block of Gutenberg: you can show/hide conditional content depending on the acceptance of cookies.
* Some shortocodes described in the "Advanced control" inside the WordPress Customizer. Example: [SCC_ALLOW] your content [/SCC_ALLOW]
* Some extra advanced options to try force automatically the blocking of some scripts, and with it the control of cookies.

Both with the gutenberg block and with the shortcodes this plugin allows you to show or hide content, as well as allow partial acceptance and rejection of cookies for each content. It also allows the user to change his mind at all times.


**EXAMPLE of what you can do with this plugin** based on an idea from [UniversoSM](https://universosm.es/)
* Imagine that your visitor rejects cookies in the main banner. Which is quite possible.
* So where there should be a YouTube video you can only show a static image.
* Now the visitor can see a button next to the image that inform and allows to accept only the cookies to watch the video.
* If the visitor makes partial consent the page will show the iframe with the video replacing the image.
* In the same way it can be displayed a button next to the video to allow the visitor to reject that specific consent.


== Installation ==

1. Upload `simple-cookie-control.php` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to customizer to your own custom setup.
4. Search into post the block `Hide/Show blocks by Cookies` into `SumaPress` category.

== Frequently Asked Questions ==

= What can I do with this plugin? =

Show a simple banner to inform users that your site uses cookies and blocks them until the visitor accepts.
Also you can show/hide conditional content depending on the acceptance of your own cookies.

= How do I setup this plugin? =

First Go to customizer and search `Simple Cookie Control` to set all setup.
Keep in mind that there are no more options pages outside of the customizer.
Second, you have a Gutenberg block to show/hide conditional content depending on the acceptance of cookies.
Also possible using shortcodes if you prefer.

== Screenshots ==

1. Cookie banner configurable from the WordPress customizer.
2. Show or not a secondary banner after the primary one is hidden.
3. Activate or not the implementation of basic internal Analytics and Google Tag Manager.
4. With Gutenberg you can show/hide conditional content depending on the acceptance of cookies.

== Changelog ==

= 1.0.3 =
* Delete bug notice about undefined index

= 1.0.2 =
* Compatible with WP5.0

= 1.0.1 =
* Do not hide the acceptance button even when they are cookies already accepted to avoid being rejected after pressing the secondary banner.

= 1.0.0 =
* First publicly available version.

== Upgrade Notice ==

= 1.0.2 =
* Compatible with WP5.0

= 1.0.1 =
* Do not hide the acceptance button even when they are cookies already accepted to avoid being rejected after pressing the secondary banner.

= 1.0.0 =
* First publicly available version.

== Feedback and support ==

I would be happy to receive your feedback to improve this plugin.
Please let me know through [support forums](https://wordpress.org/support/plugin/simple-cookie-control) if you like it and please be sure to [leave a review.](https://wordpress.org/support/plugin/simple-cookie-control/reviews/#new-post).

Also you can contact me on my personal page [Pablo Cianes](https://pablocianes.com/) or even visit [Github of Simple Cookie Control](https://github.com/SumaPress/simple-cookie-control) where you can find all the development code of this plugin.

I hope it is useful for you and look forward to reading your reviews! ;-) Thanks!
