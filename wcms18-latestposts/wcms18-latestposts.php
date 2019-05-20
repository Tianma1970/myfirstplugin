<?php
/**
 * Plugin Name:     WCMS18 Latest Posts
 * Plugin URI:      https://tilmann1970.se/naturupplevelser
 * Description:     This is my second Plugin
 * Version:         0.1
 * Author:          Tillmann Weimer
 * License:         WTFPL
 * License URI:     http://www.wtfpl.net/
 * Text Domain:     wcms18 latest posts
 * Domain Path:     languages/
 */

 function wlp_shortcode($atts = [], $content = null, $tag = '' ){ 
     $default_atts = [
         'posts' => 3,
         'title'=> __('Latest Posts', 'wcms18-latestposts')
     ];

     $atts = shortcode_atts($default_atts, $user_atts, $tag);

     $posts = new WP_Query ([
         'post_per_page' => $atts['posts']
     ]);
     
         //var_dump($atts)

     $output = "<h2>". esc_html($atts['title']) . "</h2>";
        if($posts->have_posts()) {
            $output .= "<ul>";
            while($posts->have_posts()) {
                $posts->the_post();
            $output .= "<li>";
            $output .= "<a href = '" . get_the_permalink() . "'> ";
            $output .=get_the_title();
            $output .= "</a>";

            $output .="<small>";
            $output .=" in ";
            $output .=get_the_category_list();
            $output .=" by ";
            $output .=get_the_author();
            $output .=" ";
            $output .=human_time_diff(get_the_time('U')) . 'ago';
            $output .= "</small>";
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

