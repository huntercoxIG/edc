<?php
/*
Plugin Name: EDC Custom Functionality
Description: Custom functionality to support the mobile and desktop versions of the Economic Development Corporation of Wayne County website. 
Author: Shaun Lieberman &amp; Pete Schaffner (IronGate Creative)
Version: 1.0
Author URI: http://irongatecreative.com/
*/

if (!class_exists('EdcCustomFields')) {
		
	class EdcCustomFields {

		private $post_types = array('page', 'mobile_page');
		
		function __construct() {
			// Hook into admin section to add new meta fields and save the data
			add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
			add_action('pre_post_update', array($this, 'pre_post_update'));
			add_action('save_post', array($this, 'save_post'));
			
			// Hooks to use the EDC custom meta data
			add_action('template_redirect', array($this, 'template_redirect'));
			add_filter('the_content', array($this, 'mirror_content'));
		}
		
		public function add_meta_boxes() {
			foreach ($this->post_types as $post_type) {
				add_meta_box('edc_page_options', 'EDC Page Options', array($this, 'create_edc_page_options'), $post_type, 'side');
				add_meta_box('edc_redirect_options', 'EDC Page Redirect', array($this, 'create_edc_redirect_options'), $post_type, 'normal', 'high');
			}
			
			wp_enqueue_script('edc-admin-edit');
			wp_enqueue_script('jquery-effects-highlight');
		}
		
		public function create_edc_page_options($post) {
			
			// Page type dropdown
			$edc_page_type = get_post_meta($post->ID, 'edc_page_type', true) OR '';
			$edc_page_type_options = array(
				'' => 'Default',
				'mirror' => 'Mirror',
				'redirect' => 'Redirect'
			);						
			echo '<p><strong>Page Type</strong></p>';
			echo '<label class="screen-reader-text" for="edc_page_type">Page Type</label>';
			echo '<select id="edc_page_type" name="edc_page_type">';
			foreach($edc_page_type_options as $val => $text) {
				$selected = ($val == $edc_page_type) ? 'selected="selected"' : ''; 
				echo "<option value='$val' $selected>$text</option>";
			}
			echo '</select>';

			// Dropdown for page to mirror
			$edc_mirror_id = get_post_meta($post->ID, 'edc_mirror_id', true);
			$pages = wp_dropdown_pages(array(
				'post_type' => 'page', 
				'exclude_tree' => $post->ID, 
				'selected' => $edc_mirror_id, 
				'name' => 'edc_mirror_id', 
				'show_option_none' => '-- Select One --', 
				'sort_column'=> 'menu_order, post_title', 
				'echo' => 0
			));
			echo '<div id="edc_mirror_page_options"' . ($edc_page_type=='mirror' ? '' : ' style="display: none;"') . '">';
			echo '<p><strong>Page to Mirror</strong></p>';
			echo '<label class="screen-reader-text" for="edc_mirror_id">Page to Mirror</label>';
			echo $pages;
			echo '</div>';
			
			// Hide from menu checkbox
			$edc_hide_from_menu = get_post_meta($post->ID, 'edc_hide_from_menu', true);
			$checked = $edc_hide_from_menu ? 'checked="checked"' : ''; 
			echo '<p><strong>Menu Options</strong></p>';
			echo '<p><label class="selectit" for="edc_hide_from_menu">';
			echo " <input name='edc_hide_from_menu' type='hidden' value='0' />";
			echo " <input id='edc_hide_from_menu' name='edc_hide_from_menu' type='checkbox' $checked value='1' />";
			echo ' Hide from menu.';
			echo '</label></p>'; 
			
		}
		
		public function create_edc_redirect_options($post) {
			// Text box for redirect page
			$edc_redirect_url = get_post_meta($post->ID, 'edc_redirect_url', true) OR '';	
			echo '<p><strong>EDC Page Redirect URL</strong></p>';
			echo '<label class="screen-reader-text" for="edc_redirect_url">EDC Page Redirect URL</label>';
			echo "<input style='width: 90%;' id='edc_redirect_url' name='edc_redirect_url' value='$edc_redirect_url' />";
		}
		
		public function pre_post_update($id) {
			#TODO Validate our EDC custom fields and set error if needed
		}
		
		public function save_post($id) {
			$fields = array('edc_page_type', 'edc_mirror_id', 'edc_hide_from_menu', 'edc_redirect_url');
			foreach ($fields as $field) {
				$new = $_POST[$field];

				if ($new) {
					if (!update_post_meta($id, $field, $new)) {
						add_post_meta($id, $field, $new, true);
					}
				} else {
					delete_post_meta($id, $field);
				}
			}
		}
		
		public function template_redirect() {
			if (is_single() || is_page()) {
				$postID = get_the_ID();
				$edc_page_type = get_post_meta($postID, 'edc_page_type', true);


				if ('mirror' == $edc_page_type) {
					$mirrored_post_id = get_post_meta($postID, 'edc_mirror_id', true);
					if ($mirrored_post_id && get_post($mirrored_post_id)) {

                        if ($mirrored_post_id == get_option('page_for_posts')) {  // If the "mirrored" page is the main site's blog index.
                            include (TEMPLATEPATH . '/mobile_blog.php');  // Just load the special mobile blog template and exit.
                            exit;
                        } else {
                            $edc_page_type = get_post_meta($mirrored_post_id, 'edc_page_type', true);
                            $postID = $mirrored_post_id;
                        }
					}
				}


				if ('redirect' == $edc_page_type) {
					$url = get_post_meta($postID, 'edc_redirect_url', true);
					wp_redirect($url);
				}
	        }
		}

		public function mirror_content($content) {
			$postID = get_the_ID();
			$edc_page_type = get_post_meta($postID, 'edc_page_type', true);
			if ('mirror' == $edc_page_type) {
				$mirrored_post_id = get_post_meta($postID, 'edc_mirror_id', true);
				if ($mirrored_post_id && $mirrored_post = get_post($mirrored_post_id)) {
					$content = $mirrored_post->post_content;
				}
			}
			return $content;
		}

	} //End Class EdcCustomFields
}
?>