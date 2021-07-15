<?php

/**
 * Theme filters.
 */

namespace App;

/*
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

add_filter('do_shortcode_tag', function ($output, $tag, $attr) {
    if (isset($attr['container']) && 'true' === $attr['container']) {
        return '<div class="container">' . $output . '</div>';
    } else {
        return $output;
    }
}, 10, 3);

add_filter('widget_title', function ($title) {
    $output = string_parts($title, 2);

    if (is_array($output) && 2 === count($output)) {
        return "<span class='text-trim-500'>{$output[0]}</span> <span class='text-white font-bold'>{$output[1]}</span>";
    } else {
        return $title;
    }
});


function ky_schema_faqs_callback( $string ) {
    if(is_tax('ufaq-category') ) {
        return 'itemscope itemtype="https://schema.org/FAQPage"';
    }
    return $string;
}

add_filter( 'ky_schema_markup_filter', 'ky_schema_faqs_callback', 10, 3 );

function remove_nofollow($string) {
    $string = str_ireplace(' rel="nofollow"', '', $string);
    return $string;
}
add_filter('cancel_comment_reply_link', 'remove_nofollow');
