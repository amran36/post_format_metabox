<?php


function video_featured_metabox($metaboxes){


    $post_id = 0;
    if( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ){
        $post_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }
    $current_post_format = get_post_format( $post_id );

    if( 'video' != $current_post_format ){
        return $metaboxes;
    }



    $metaboxes[] = array(
        'id' => 'video_post_metaboxes',
        'title' => __('Video Post Metaboxes', 'ever'),
        'post_type' => array('post'),
        'context' => 'normal',
        'priority' => 'default',
        'sections' => array(
            array(
                'id'      => 'video_post_meta',
                //'title'     => __('Featured Post', 'ever'),
                'icon'      => 'fa fa-video',
                'fields'    => array(
                    array(
                        'id'    => 'featured_check',
                        'type'  => 'text',
                        'title' => __('Paste Your Video Link', 'ever'),
                    ),
                ),
            ),
        ),
    );
    return $metaboxes;
}
add_filter('cs_metabox_options', 'video_featured_metabox');