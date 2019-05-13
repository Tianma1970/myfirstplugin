<?php
/**
 * Plugin Name:     WCMS18 Latest Posts
 * Plugin URI:      https://tilmann1970.se/naturupplevelser
 * Description:     This is my first Plugin
 * Version:         0.1
 * Author:          Tillmann Weimer
 * License:         WTFPL
 * License URI:     http://www.wtfpl.net/
 * Text Domain:     wcms18 latest posts
 * Domain Path:     languages/
 */

 function wlp_shortcode($atts=[]){ 
     $mlp_atts = shortcode_atts([
         //det samlade antal posts
         'value' => 4,
     ], $atts, $tag);
     
   
       

         $posts = new WP_Query([
             'posts_per_page' => $mlp_atts['value'],
         ]);
        


         //var_dump($atts)

         
     

     $output = "<h2>Latest Posts</h2>";
        if($posts->have_posts()) {
            $output .= "<ul>";
            while($posts->have_posts()) {
                $posts->the_post();

            
            $output .= "<li>";
            $output .= "<a href = '" .get_the_permalink() . "'> ";
            $output .=get_the_title();
            $output .=get_the_category_list();
            $output .= "</a>";
            $output .= "</li>";
        }
        wp_reset_postdata();
        $output .= "</ul>";

        } else {
            $output .="No latest posts available.";
        }
     return $output;
 }
 function wlp_init(){
     add_shortcode('latest-posts', 'wlp_shortcode');

 }
 add_action('init', 'wlp_init');

