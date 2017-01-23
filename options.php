<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}
/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */
function optionsframework_options() {
	// Test data
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
	);
	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_framework_theme'),
		'two' => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four' => __('Crepe', 'options_framework_theme'),
		'five' => __('Waffle', 'options_framework_theme')
	);
	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);
	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );
	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);
	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	$options_posts = array();
	$options_posts_obj = get_posts(array(
	'posts_per_page'   => 50));
	$options_posts[''] = 'Select a post:';
	foreach ($options_posts_obj as $posts) {
		$options_posts[$posts->ID] = $posts->post_title;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}
	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/inc/images/';
	$options = array();
	
	$options[] = array(
		'name' => __('Basic Settings', 'options_framework_theme'),
		'type' => 'heading');
	
	
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	
	$options[] = array(
		'name' => __('Favicon', 'options_framework_theme'),
		'id' => 'theme_fav',
		'type' => 'upload');		
			
	$options[] = array(
		'name' => __('Logo', 'options_framework_theme'),
		'id' => 'theme_logo',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Copy', 'options_framework_theme'),
		'id' => 'theme_copy',
		'type' => 'text');

	$options[] = array(
		'name' => __('Address', 'options_framework_theme'),
		'id' => 'theme_address',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
	
	
	$options[] = array(
		'name' => __('Sharing Settings', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Facebook', 'options_framework_theme'),
		'id' => 'theme_facebook',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Google Plus', 'options_framework_theme'),
		'id' => 'theme_gplus',
		'type' => 'text');

	$options[] = array(
		'name' => __('Twitter', 'options_framework_theme'),
		'id' => 'theme_twitter',
		'type' => 'text');

	$options[] = array(
		'name' => __('Youtube', 'options_framework_theme'),
		'id' => 'theme_youtube',
		'type' => 'text');

	$options[] = array(
		'name' => __('RSS Feed', 'options_framework_theme'),
		'id' => 'theme_rssfeed',
		'type' => 'text');
		

		
	$options[] = array(
		'name' => __('Posts & Category', 'options_framework_theme'),
		'type' => 'heading');
	
	if ( $options_posts ) {
	$options[] = array(
		'name' => __('Welcome Post', 'options_framework_theme'),
		'id' => 'theme_welcome',
		'type' => 'select',
		'options' => $options_posts);
	}

	if ( $options_categories ) {
	$options[] = array(
		'name' => __('Blog - Category', 'options_framework_theme'),
		'id' => 'theme_blog',
		'type' => 'select',
		'options' => $options_categories);
	}
	
	
	return $options;
}