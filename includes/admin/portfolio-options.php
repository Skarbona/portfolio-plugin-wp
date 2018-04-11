<?php
function fs_portfolio_options_mb($post) {

    $portfolio_data = get_post_meta($post->ID,'portfolio_data', true);
        ?>
    <div class="form-group">
        <label  style="font-weight:700">Github Repo URL</label>
        <input type="text" class="form-control" name="fs_github_url" value="<?php echo $portfolio_data['github']; ?>" style="width:100%;">
    </div><br/>
    <div class="form-group">
        <label style="font-weight:700">Live Prieview URL</label>
        <input type="text" class="form-control" name="fs_live_url" value="<?php echo $portfolio_data['live']; ?>" style="width:100%;">
    </div>


    <?php

}