<?php
/*
Plugin Name: EDC Custom Functionality
Description: Custom functionality to support the mobile and desktop versions of the Economic Development Corporation of Wayne County website.
Author: Shaun Lieberman &amp; Pete Schaffner (IronGate Creative)
Version: 1.0
Author URI: http://irongatecreative.com/
*/

// require_once 'inc/edc-custom-fields.php';
require_once 'inc/edc-menu.php';
// require_once 'inc/edc-utility.php';
// require_once 'inc/edc-homepage.php';
// require_once 'inc/edc-tia.php';

if (!class_exists('Edc')) {

	class Edc {

		function __construct() {
			// add_action('init', array($this, 'init'));
			// add_action('admin_init', array($this, 'admin_init'));
			// add_action('admin_menu', array($this, 'edc_menu'));

			// new EdcCustomFields();
			new EdcMenu();
			// new EdcUtility();
			// new EdcHomepage();
			// new EdcTia();
		}

		// function init() {
		// 	register_post_type( 'mobile_page',
		// 		array(
		// 			'labels' => array(
		// 				'name' => __( 'Mobile Pages' ),
		// 				'singular_name' => __( 'Mobile Page' )
		// 			),
		// 			'public' => true,
		// 			'menu_position' => 20,
		// 			'hierarchical' => true,
		// 			'supports' => array('title','editor','revisions','page-attributes', 'custom-fields'),
		// 			'rewrite' => array(
		// 				'slug' => 'm',
		// 				'with_front' => false
		// 			),
		// 			'exclude_from_search' => true,
		// 			'has_archive' => true
		// 		)
		// 	);
		// }

		// function admin_init() {
		// 	wp_register_script('edc-admin-edit', plugins_url('/js/edc-admin-edit.js', __FILE__));
		// 	wp_register_script('jquery-effects-highlight', plugins_url('/js/jquery.effects.highlight.js', __FILE__));
		// }

		// function edc_menu() {
		// 	add_menu_page('EDC Custom Functionality', 'EDC', 'edit_pages', 'edc-main', array($this, 'edc_main'));
		// }

		// function edc_main() {
		// }

	} //End Class Edc

	new Edc();
}
?>
