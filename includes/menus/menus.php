<?php

function fs_menus_get_all_menus() {
            $menus  =  [];
            foreach(get_registered_nav_menus() as $slug => $desc ){
            $obj = new stdClass;
            $obj->slug = $slug;
            $obj->description = $desc;
            $menus[] = $obj;

    }

    return $menus;
}