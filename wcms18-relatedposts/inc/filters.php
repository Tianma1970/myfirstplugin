<?php

function wrp_the_content() {
    if (is_single()) {
        if (!has_shortcode($content, 'related-posts')) {
            $related_posts = wrp_get_related_posts();
            $content = $content . $related_posts;

        }
    }

    return $content;
}

add_filter('content', 'wrp_the_content');

?>