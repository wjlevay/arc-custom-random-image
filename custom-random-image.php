<?php
/*
Plugin Name: ARC Custom Random Attached Image
Description: Display one random image that is attached to a post or page.

Use the native WP function "get_attachment_image" to randomly select and display an attached image
http://www.webgurus.biz/how-to-limit-wordpress-gallery-thumbnails-in-the-loop/
*/

function get_random_attached_image(){  
    global $wpdb,$post;  
        $ids = "";  
        $counter = 0;  
        $number_of_posts = 1;  
        $args = array(  
        'post_type' => 'attachment',  
        'numberposts' => 1,  
        'post_status' => null,  
        'orderby' => 'rand',  
        'post_parent' => $post->ID  
        );  
        $attachments = get_posts($args);  
        if ($attachments) {  
            foreach ($attachments as $attachment) {  
  
                if ($counter != 0) {  
                    $ids .= ','.$attachment->ID;  
                }  
                else {  
                    $ids .= $attachment->ID;  
                }  
                $counter++;  
            }  
        }  
        return $ids;  
}  

// Use this code to implement the above funtion in a template file or PHP-enabled widget
// $attachment_id = get_random_attached_image(); 
// echo wp_get_attachment_image( $attachment_id, 'bones-thumb-220' );

?>