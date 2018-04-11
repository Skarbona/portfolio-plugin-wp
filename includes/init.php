<?php
function fs_portfolio_init() {

    $labels = array(
        'name'               => __( 'Portfolio',  'portfolio' ),
        'singular_name'      => __( 'Portfolio Item',  'portfolio' ),
        'menu_name'          => __( 'Portfolio',  'portfolio' ),
        'name_admin_bar'     => __( 'Portfolio Item',  'portfolio' ),
        'add_new'            => __( 'Add New',  'portfolio' ),
        'add_new_item'       => __( 'Add New Portfolio Item', 'portfolio' ),
        'new_item'           => __( 'New Portfolio Item', 'portfolio' ),
        'edit_item'          => __( 'Edit Portfolio Item', 'portfolio' ),
        'view_item'          => __( 'View Portfolio Item', 'portfolio' ),
        'all_items'          => __( 'All Portfolio Items', 'portfolio' ),
        'search_items'       => __( 'Search Portfolio Items', 'portfolio' ),
        'parent_item_colon'  => __( 'Parent Portfolio:', 'portfolio' ),
        'not_found'          => __( 'No portfolio items found.', 'portfolio' ),
        'not_found_in_trash' => __( 'No portfolio items found in Trash.', 'portfolio' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'A Filip Sokolowski portfolio', 'portfolio' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'show_in_rest'       => true,
        'rest_base'          => 'portfolio-api',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'taxonomies'         => array('portfolio-category','portfolio-tags')
    );

    register_post_type( 'portfolio', $args );

}

function fs_create_portfolio_taxonomies()
{

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'               => __('Portfolio Category', 'fs-portfolio'),
        'singular_name'      => __('Portfolio Category',  'fs-portfolio'),
        'search_items'       => __('Search Portfolio Categories', 'fs-portfolio'),
        'all_items'          => __('All Portfolio Categories', 'fs-portfolio'),
        'parent_item'        => __('Parent Portfolio Category', 'fs-portfolio'),
        'parent_item_colon'  => __('Parent Portfolio Category:', 'fs-portfolio'),
        'edit_item'          => __('Edit Portfolio Category', 'fs-portfolio'),
        'update_item'        => __('Update Portfolio Category', 'fs-portfolio'),
        'add_new_item'       => __('Add New Portfolio Category', 'fs-portfolio'),
        'new_item_name'      => __('New Portfolio Category Name', 'fs-portfolio'),
        'menu_name'          => __('Portfolio Category', 'fs-portfolio')
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'portfolio-category'),
        'show_in_rest'       => true,
        'rest_base'          => 'portfolio-category',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
    );



    register_taxonomy( 'portfolio-category', array( 'portfolio' ), $args );

    // Add new taxonomy, NOT hierarchical (like tags)
    $labelst = array(
        'name'                       => __( 'Porftolio Tags', 'fs-portfolio' ),
        'singular_name'              => __( 'Tag',  'fs-portfolio' ),
        'search_items'               => __( 'Search Tags', 'fs-portfolio' ),
        'popular_items'              => __( 'Popular Tags', 'fs-portfolio' ),
        'all_items'                  => __( 'All Tags', 'fs-portfolio' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Tag', 'fs-portfolio' ),
        'update_item'                => __( 'Update Tag', 'fs-portfolio' ),
        'add_new_item'               => __( 'Add New Tag', 'fs-portfolio' ),
        'new_item_name'              => __( 'New Tag Name', 'fs-portfolio' ),
        'separate_items_with_commas' => __( 'Separate tags with commas', 'fs-portfolio' ),
        'add_or_remove_items'        => __( 'Add or remove tags', 'fs-portfolio' ),
        'choose_from_most_used'      => __( 'Choose from the most used tags', 'fs-portfolio' ),
        'not_found'                  => __( 'No tags found.', 'fs-portfolio' ),
        'menu_name'                  => __( 'Portfolio Tags', 'fs-portfolio' )
    );

    $argst = array(
        'hierarchical'               => false,
        'labels'                     => $labelst,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'update_count_callback'      => '_update_post_term_count',
        'query_var'                  => true,
        'rewrite'                    => array( 'slug' => 'portfolio-tags' ),
        'show_in_rest'              => true,
        'rest_base'                 => 'porfolio-tags',
        'rest_controller_class'     => 'WP_REST_Terms_Controller',
    );

    register_taxonomy( 'portfolio-tags', 'portfolio', $argst );
}