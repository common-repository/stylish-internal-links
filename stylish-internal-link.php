<?php
/*
* Plugin Name: Stylish Internal Links
* Plugin URI: https://www.allwebtuts.com/stylish-internal-links-wordpress-plugin/
* Description: Display a stylish Internal Links in your Wordpress posts.
* Version: 1.9
* Author: Santhosh veer
* Author URI: https://www.allwebtuts.com
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

//define the plugin version
if (!defined('MMTY_STL_INTLNKS_VERSION_NUM')){ //define plugin version
    define('MMTY_STL_INTLNKS_VERSION_NUM', '1.9');
}

// register admin script
add_action( 'admin_enqueue_scripts', 'mskslnks_enqueue_color_picker' );
function mskslnks_enqueue_color_picker( $hook_suffix ) {
wp_enqueue_style( 'wp-color-picker' );
wp_enqueue_script( 'my-script-handle', plugins_url('slnk.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

// Plugin CSS File
add_action('wp_head','ssmsklnk_css');
function ssmsklnk_css() {

$bgcolor = get_option('mlstl_background_color');
$bdrcolor = get_option('mlstl_border_color');
$lnnkcolor = get_option('mlstl_textlink_color');
$sbhdcle = get_option('mlstl_subheading_color');

$output="<style>
.awts-inl {
 display: block;
 font-family: -apple-system, system-ui, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
 font-size: 17px;
 line-height: 1;
 color: $sbhdcle;
 border-left: 5px solid $bdrcolor;
 background: $bgcolor;
 padding: 10px 10px 1px 20px;
 margin: 20px 20px 20px 10px
 }
 .awts-inl a {
 line-height: 26px
 }
 .awts-inl p {
 font-size: 16px;
 margin-bottom: 10px!important
 }
.awts-inl a {color: $lnnkcolor;}
</style>";

echo $output;

}

//plugin open registration
function activate_mmstylishinternallink() {
  add_option('mlstl_background_color', '#f5f5f5');
  add_option('mlstl_border_color', '#d35400');
  add_option('mlstl_textlink_color', '#000000');
  add_option('mlstl_subheading_color', '#666');
  add_option('mlstl_link_icons');
}

function deactive_mmstylishinternallink() {
  delete_option('mlstl_background_color');
  delete_option('mlstl_border_color');
  delete_option('mlstl_textlink_color');
  delete_option('mlstl_subheading_color');
  delete_option('mlstl_link_icons');
}

function admin_init_mmstylishinternallink() {
  register_setting('stylnk_mskvr_topt', 'mlstl_background_color');
  register_setting('stylnk_mskvr_topt', 'mlstl_border_color');
  register_setting('stylnk_mskvr_topt', 'mlstl_textlink_color');
  register_setting('stylnk_mskvr_topt', 'mlstl_subheading_color');
  register_setting('stylnk_mskvr_topt', "mlstl_link_icons");
}

// Get Option for Font awesome Instllation!
if(get_option("mlstl_link_icons") == 1){
function awts_adding_styles() {
wp_register_style('stylish-inlinks-icon', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css');
wp_enqueue_style('stylish-inlinks-icon');
}
add_action( 'wp_enqueue_scripts', 'awts_adding_styles' );
}
function add_font_awesome_5_cdn_attributes( $html, $handle ) {
  if ( 'stylish-inlinks-icon' === $handle ) {
      return str_replace( "media='all'", "media='all' integrity='sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V' crossorigin='anonymous'", $html );
  }
  return $html;
}

add_filter( 'style_loader_tag', 'add_font_awesome_5_cdn_attributes', 10, 2 );
// plugin option panel
function admin_menu_mmstylishinternallink() {
  add_options_page('Stylish Internal Link', 'Stylish Internal Link', 'manage_options', 'stylnk_mskvr_topt', 'options_page_mmstylishinternallink');
}

// Stylish Internal link
function options_page_mmstylishinternallink() {
  include( plugin_dir_path( __FILE__ ) .'options.php');
}

// Stylish Internal Links
function stylnk_mskvr_topt($atts, $content = null) {

 extract( shortcode_atts( array(
), $atts ) );
// Return custom embed code
return '<div class="awts-inl"><p>' . $atts['subhd'] . '</p><p><i class="fas fa-link" aria-hidden="true"></i> <a href="' . $atts['link'] . '">'.$content.'</a></p></div>';
}
add_shortcode( 'mlink', 'stylnk_mskvr_topt' );


// plugin register hooks
register_activation_hook(__FILE__, 'activate_mmstylishinternallink');
register_deactivation_hook(__FILE__, 'deactive_mmstylishinternallink');

if (is_admin()) {
  add_action('admin_init', 'admin_init_mmstylishinternallink');
  add_action('admin_menu', 'admin_menu_mmstylishinternallink');

}

// TinyMCE Plugin
function awts_stylnkz_scripts($plugin_array)
{
  //enqueue TinyMCE plugin script with its ID.
  $plugin_array["Stylish_Internallink_button"] =  plugin_dir_url(__FILE__) . "tiny.js";
  return $plugin_array;
}

add_filter("mce_external_plugins", "awts_stylnkz_scripts");

function register_buttons_frstylnks($buttons)
{
  //register buttons with their id.
  array_push($buttons, "stylishinternallinks");
  return $buttons;
}

add_filter("mce_buttons", "register_buttons_frstylnks");


/* plugin menu link*/
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'stlnks_optge_links' );

function stlnks_optge_links ( $links ) {
 $mylinks = array(
 '<a href="' . admin_url( 'options-general.php?page=stylnk_mskvr_topt' ) . '">Plugin Settings</a>',
 );
return array_merge( $links, $mylinks );
}
