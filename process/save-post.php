<?php

function fs_portfolio_save_post_admin($post_id,$post,$update) {

        if(!$update) {
            return;
        }

        $portfolio_data  = array();

        $portfolio_data['github']  = sanitize_text_field($_POST['fs_github_url']);
        $portfolio_data['live']    = sanitize_text_field($_POST['fs_live_url']);
        $portfolio_data['tech']    = sanitize_text_field($_POST['fs_tech']);

        update_post_meta($post_id,'portfolio_data',$portfolio_data);

}

function fs_portfolio_add_custom_fields_to_rest(){
        register_rest_field(
            'portfolio',
            'meta',
            array(
                'get_callback'    => 'get_post_meta_for_api',
                'update_callback' => null,
                'schema'          => null
            )
        );

}

function get_post_meta_for_api( $object ) {
    //get the id of the post object array
    $post_id = $object['id'];

    //return the post meta
    return get_post_meta( $post_id );
}