<div class="wrap">

<div id="post-body" class="metabox-holder columns-2">
<div id="post-body-content">
<div class="postbox">
<div class="inside">

<h2>Stylish Internal Links</h2>

<strong><p>Stylish Internal Links WordPress plugin Set up documentation &rArr; <a rel="nofollow noopener noreferrer" href="https://www.allwebtuts.com/stylish-internal-links-wordpress-plugin/" target="_blank">Click Here</a></p></strong>

<strong><p>Stylish Internal Link Shortcode &rArr; <code>[mlink subhd="SUB HEADING" link="YOUR POST LINK"]YOUR POST TITLE[/mlink]</code></p></strong>

<form method="post" action="options.php">
<?php settings_fields('stylnk_mskvr_topt'); ?>

<p>Background Color</p>
<input type="text" name="mlstl_background_color" class="my-color-field" data-default-color="#f5f5f5" value="<?php echo get_option('mlstl_background_color'); ?>" />
<p>Left Border Color</p>
<input type="text" name="mlstl_border_color" data-default-color="#d35400" class="my-color-field" value="<?php echo get_option('mlstl_border_color'); ?>" />
<p><th scope="row">Link Text color</p>
<input type="text" name="mlstl_textlink_color" data-default-color="#000000" class="my-color-field" value="<?php echo get_option('mlstl_textlink_color'); ?>" />
<p><th scope="row">Sub heading color</p>
<input type="text" name="mlstl_subheading_color" data-default-color="#666" class="my-color-field" value="<?php echo get_option('mlstl_subheading_color'); ?>" />
<p><input type="checkbox" name="mlstl_link_icons" value="1" <?php checked(1, get_option('mlstl_link_icons'), true); ?>" /> &rArr; <th scope="row">Enable Font Awesome ICON For Link Icon - If your theme already Having Font awesome ICON Feature then Leave this option</p>
<p class="submit">
<?php submit_button();?>
</p>

</form>

</div>
</div>
</div>
</div>
</div>
