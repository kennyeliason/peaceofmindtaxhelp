<?php

/**
 * Theme helpers.
 */

namespace App;

function nb_get_post_thumbnail($post_id = null, $size = 'medium', $attr = [])
{
    if (! $post_id) {
        $post_id = get_the_ID();
    }

    // Step 1: Use the featured image if it's there
    if (! empty($image = get_the_post_thumbnail($post_id, $size, $attr))) {
        return $image;
    }

    // Step 2: Try to get the first cover image
    $content = get_post_field('post_content', $post_id);

    // Get the the first cover, image, or media block you can find
    preg_match('/<!-- (wp:cover|wp:image|wp:media-text) (.*)\/(?:\1) -->/ms', $content, $imageBlockMatches);
    if (isset($imageBlockMatches[2])) {
        preg_match('/(?:"id"|"mediaId")(?:\D*)(\d*)/', $imageBlockMatches[2], $imageId);
        if (! empty($image = wp_get_attachment_image($imageId[1], $size, false, $attr))) {
            return $image;
        }
    }

    // The easy part is over. Now we need to delve into the rendered content!
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);

    // Get the first img tag's src attribute you see, then remove the -200x200 part, get the ID from the URL, Whabam
    preg_match('/(?:<img)(?:.*?)(?:src=["|\'])(.*?)["|\']/ms', $content, $srcMatch);
    if (isset($srcMatch[1]) && ! empty($srcMatch[1])) {
        $baseUrl = preg_replace('/(.*)(-\d*x\d*)/', '$1', $srcMatch[1]);
        if (! empty($imageId = attachment_url_to_postid($baseUrl))) {
            if (! empty($image = wp_get_attachment_image($imageId, $size, false, $attr))) {
                return $image;
            }
        }
    }

    // If there is legitimately no image on your page, get the logo of the site as a final fallback.
    if (empty($image)) {
        if (! empty($image = wp_get_attachment_image(get_theme_mod('custom_logo'), $size, false, $attr))) {
            return $image;
        }
    }

    // And if there really is nothing...sorry =(
    return '';
}

function string_parts($string, $parts = 2)
{
    $array = preg_split('/\s+/', $string);
    if (! (count($array) > 1)) {
        return $string;
    }
    $chunks = array_chunk($array, floor(count($array) / $parts));

    if (count($chunks) > $parts) {
        $popped = array_pop($chunks);
        $chunks[$parts - 1] = array_merge($chunks[$parts - 1], $popped);
    }

    $output = [];

    foreach ($chunks as $chunk) {
        $output[] = implode(' ', $chunk);
    }

    return $output;
}

function nb_get_post_thumbnail_src( $post_id = null, $size = 'medium' ) {
    if(!$post_id) $post_id = get_the_ID();
    // Get the post's featured image ID
    if($attempt = attemptRetrieval(get_post_thumbnail_id( $post_id ), $size)) return $attempt;

    // Get an attached image inside the post's image ID
    $content = get_post_field('post_content', $post_id);
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
    preg_match_all('/(?:"url":)(?:\s|)(?:")(http?s?:?\/\/[^"\']*\.(?:png|jpg|jpeg|gif|png|svg))/m',
       $content,
       $otherMatches);
    if(isset($matches) && isset($matches[ 1 ])) {
        if(isset($matches[ 1 ][ 0 ])) {
            $first_img = $matches[ 1 ][ 0 ];
        } else if(isset($otherMatches[ 1 ][ 0 ])) {
            $first_img = $otherMatches[ 1 ][ 0 ];
        }
        if(!empty($first_img)) {
            if($attempt = attemptRetrieval(attachment_url_to_postid($first_img), $size))  return $attempt;
        }
    }

    if($attempt = attemptRetrieval($post_id, $size))  return $attempt;

    if($attempt = attemptRetrieval(get_theme_mod('custom_logo'), $size))  return $attempt;

    return false;
}

function attemptRetrieval($imageID, $size) {
    if($src = wp_get_attachment_image_src($imageID, $size)) {
        return json_encode([
           'src' => $src[0],
           'srcset' => wp_get_attachment_image_srcset($imageID, $size),
           'width' => $src[1],
           'height' => $src[2],
       ], JSON_UNESCAPED_SLASHES);
    } else {
        return false;
    }
}

function wrap_last($string, $wrap_start = '<span class="font-bold">', $wrap_finish = '</span>') {
    $string_array = explode(' ', $string);
    $count = count($string_array);
    $new_array = array();
    foreach ($string_array as $i => $value) {
        $i = $i + 1;
        $array_part = '';
        if ($i == $count) {
             $array_part .= $wrap_start;
         }
         $array_part .= $value;
         if ($i == $count) {
             $array_part .= $wrap_finish;
        }
        $new_array[] = $array_part;
    }
    $new_string = implode(' ', $new_array);
    return $new_string;
}

function wrap_part($string, $wrap_start = '<span class="font-bold">', $wrap_finish = '</span>', $start_char, $end_char) {
    $start_pos = strpos($string, $start_char);
    $end_pos = strpos($string, $end_char);
    $string = substr_replace($string, $wrap_start, $start_pos, 0);
    $end_pos = strpos($string, $end_char) + 1;
    $string = substr_replace($string, $wrap_finish, $end_pos, 0);
    return $string;
}
