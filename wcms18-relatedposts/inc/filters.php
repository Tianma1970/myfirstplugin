<?php

function wrp_the_content() {
    if (is_single() && get_option('wrp_add_to_posts') == 1) {
        if (!has_shortcode($content, 'related-posts')) {
            $related_posts = wrp_get_related_posts();
            $content = $content . $related_posts;

        }
    }

    return $content;
}

add_filter('the_content', 'wrp_the_content');

?>