<?php
// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

function acf_image_in_circle_block() {

	// check function exists
	if( function_exists('acf_register_block') ) {

		// register a portfolio item block
		acf_register_block(array(
			'name'				=> 'image-in-circle',
			'title'				=> __('Image in circle'),
			'description'		=> __('Creating image in circle'),
			'render_template'	=> 'template-parts/blocks/image-in-circle/block-image-in-circle.php',
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'keywords'			=> array( 'image' ),
		));
	}
}

function acf_buttons_block() {

	// check function exists
	if( function_exists('acf_register_block') ) {

		// register a portfolio item block
		acf_register_block(array(
			'name'				=> 'buttons',
			'title'				=> __('Buttons'),
			'description'		=> __('Creating button or group of buttons'),
			'render_template'	=> 'template-parts/blocks/buttons/block-buttons.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'button' ),
		));
	}
}

function acf_block_with_icon_block() {

	// check function exists
	if( function_exists('acf_register_block') ) {

		// register a portfolio item block
		acf_register_block(array(
			'name'				=> 'block-with-icon',
			'title'				=> __('Block with icon'),
			'description'		=> __('Creating a block with icon attached to left'),
			'render_template'	=> 'template-parts/blocks/block-with-icon/block-block-with-icon.php',
			'category'			=> 'layout',
			'icon'				=> 'align-pull-left',
			'keywords'			=> array( 'icon' ),
		));
	}
}

function acf_gallery_block() {

	// check function exists
	if( function_exists('acf_register_block') ) {

		// register a portfolio item block
		acf_register_block(array(
			'name'				=> 'gallery',
			'title'				=> __('Gallery'),
			'description'		=> __('Creating a gallery'),
			'render_template'	=> 'template-parts/blocks/gallery/block-gallery.php',
			'category'			=> 'layout',
			'icon'				=> 'format-gallery',
			'keywords'			=> array( 'gallery' ),
		));
	}
}

add_action('acf/init', 'acf_image_in_circle_block');
add_action('acf/init', 'acf_buttons_block');
add_action('acf/init', 'acf_block_with_icon_block');
add_action('acf/init', 'acf_gallery_block');

?>
