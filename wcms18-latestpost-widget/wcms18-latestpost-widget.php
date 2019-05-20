<?php
/**
 * Plugin Name: WCMS18 Latest posts Widget
 * Plugin URI:  https://thehiveresistance.com/myfirstwidget
 * Description: This plugin adds a widget to show the latest posts.
 * Version:     0.1
 * Author:      Johan Nordström
 * Author URI:  https://thehiveresistance.com
 * License:     WTFPL
 * License URI: http://www.wtfpl.net/
 * Text Domain: wcms-18-latestposts-widget
 * Domain Path: /languages
 */
require("class.LatestPostsWidget.php");
function wlpw_widgets_init() {
	register_widget('LatestPostsWidget');
}
add_action('widgets_init', 'wlpw_widgets_init');