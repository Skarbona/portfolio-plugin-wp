<?php
/*
 * Plugin Name: Portfolio by FilipS
 * Description: A simple plugin to create own portfolio
 * Version: 1.0
 * Author: Filip Sokolowski
 * Author URI: http://filip-sokolowski.pl
 * Text Domain: portfolio
 */

if(!function_exists('add_action')) {
    die('Hi there, why are you doing this? Lets go outside');
}

//Setup
define('PORTFOLIO_PLUGIN_URL',__FILE__);

//Includes
include('includes/activate.php');
include('includes/init.php');
include('includes/admin/init.php');
include('process/save-post.php');

//Hooks
register_activation_hook(__FILE__,'fs_activate_plugin');
add_action('init','fs_portfolio_init');
add_action('init','fs_create_portfolio_taxonomies');
add_action('admin_init','fs_portfolio_admin_init');
add_action('init','fs_gallery_init');
add_action('save_post_portfolio','fs_portfolio_save_post_admin', 10, 3);
add_action( 'rest_api_init', 'fs_portfolio_add_custom_fields_to_rest' );
//Shortcodes

