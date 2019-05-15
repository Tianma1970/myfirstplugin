<?php

/**
 * Plugin Name:     My first Widget
 * Plugin URI:      https://tilmann1970.se/naturupplevelser
 * Description:     This is my first Widget
 * Version:         0.1
 * Author:          Tillmann Weimer
 * License:         WTFPL
 * License URI:     http://www.wtfpl.net/
 * Text Domain:     myFirstWidget
 * Domain Path:     languages/
 */

require("class.MyFirstwidget.php");

 function mfw_widgets_init() {
     register_widget('MyFirstWidget');
 }
 add_action('widgets_init', 'mfw_widgets_init');