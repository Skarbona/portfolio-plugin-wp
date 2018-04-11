<?php

function fs_activate_plugin(){

        if(version_compare(get_bloginfo('version'),'4.8','<')){
            wp_die(__('You must update WP to use this plugin','portfolio'));
        }




}