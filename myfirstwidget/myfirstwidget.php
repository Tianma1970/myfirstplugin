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
 
 function mfw_shortcode($atts=[]){ 

     $mlp_atts = shortcode_atts([
         //det samlade antal posts
         'value' => 4,
     ], $atts, $tag);
     
   
       

         $posts = new WP_Query([
             'posts_per_page' => $mlp_atts['value'],
         ]);

         $output = "<h2>Latest Posts</h2>";
        if($posts->have_posts()) {
            $output .= "<ul>";
            while($posts->have_posts()) {
                $posts->the_post();

            
            $output .= "<li>";
            $output .= "<a href = '" .get_the_permalink() . "'> ";
            $output .=get_the_title();
            $output .="<br>";
            $output .=" Kategorier ";
            $output .=get_the_category_list();
            $output .=" by ";
            $output .=get_the_author();
            $output .=" at ";
            $output .=get_the_date('Y-m-d');
            $output .= "</a>";
            $output .= "</li>";
            }

            mfw_reset_postdata();
        $output .= "</ul>";

        } else {
            $output .="No latest posts available.";
        }
     return $output;
 }

 function mfw_init(){
     add_shortcode('latest-posts', 'mfw_shortcode');
 }
        
    
 