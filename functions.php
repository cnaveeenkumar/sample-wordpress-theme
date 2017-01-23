<?php
// Theme Options
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
require_once get_template_directory() . '/options.php';
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );
function optionsframework_custom_scripts() { ?>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}
});
</script>
<?php }
// admin logo change
function custom_loginlogo() { echo '<style type="text/css">h1 a {background-image: url('.of_get_option("theme_logo").') !important;background-position: center top !important;background-repeat: no-repeat !important; background-size: auto !important;display: block !important;height: 50px !important;margin: 0 auto 25px !important;outline: 0 none !important;padding: 0 !important;text-indent: -9999px !important;width: 65% !important;}</style>';}
add_action('login_head', 'custom_loginlogo');
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function theme_favicon() {
  echo '<link rel="shortcut icon" type="image/x-icon" href="'.of_get_option("theme_fav").'" />';
}
add_action('wp_head', 'theme_favicon');
add_action('admin_head', 'theme_favicon');

//Initial Settings
add_theme_support('post-thumbnails');
add_image_size( 'slider', 1400, 696, true );

//Menus
register_nav_menu('main', 'Main navigation menu');
 
//Slider
$labels = array( 'name' => 'Slider', 'singular_name' => 'Slider', 'add_new' => 'Add New', 'add_new_item' => 'Add New Slider', 'edit_item' => 'Edit Slider', 'new_item' => 'New Slider', 'all_items' => 'All Sliders', 'view_item' => 'View Slider', 'search_items' => 'Search Sliders', 'not_found' =>  'No Sliders found', 'not_found_in_trash' => 'No Sliders found in Trash', 'parent_item_colon' => '', 'menu_name' => 'Sliders' );

$args = array( 'labels' => $labels, 'public' => true, 'publicly_queryable' => true, 'show_ui' => true,  'show_in_menu' => true, 'query_var' => true, 'rewrite' => array( 'slug' => 'slider' ), 'capability_type' => 'post', 'has_archive' => true, 'hierarchical' => false,'menu_position' => null,'supports' => array( 'title', 'thumbnail', 'editor' )); 

register_post_type( 'slider', $args );

function excerpt( $num=50 )
{
	$limit = $num+1;
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt);
	echo $excerpt;
}

//Widget Area
register_sidebar(array(
  'name' => __( 'Right Side bar' ),
  'id' => 'sidebar-1',
  'before_title' => '<h3>',
  'after_title' => '</h3>'
));
?>