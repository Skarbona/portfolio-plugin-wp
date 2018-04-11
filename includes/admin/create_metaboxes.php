<?php
function fs_create_metaboxes() {
    add_meta_box(
        'fs_portfolio_options_mb',
        __('Porfolio Options','portfolio'),
        'fs_portfolio_options_mb',
        'portfolio',
        'normal',
        'high'
    );

}