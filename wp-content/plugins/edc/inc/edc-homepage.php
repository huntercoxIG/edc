<?php
/*
Plugin Name: EDC Custom Functionality
Description: Custom functionality to support the mobile and desktop versions of the Economic Development Corporation of Wayne County website. 
Author: Shaun Lieberman &amp; Pete Schaffner (IronGate Creative)
Version: 1.0
Author URI: http://irongatecreative.com/
*/

if (!class_exists('EdcHomepage')) {
		
	class EdcHomepage {

		private $field_names = array(
			'edc_placemark_type',
			'edc_placemark_name',
			'edc_placemark_company',
			'edc_placemark_company_url',
			'edc_placemark_testimonial',
			'edc_placemark_lat',
			'edc_placemark_lng',
			'edc_placemark_address'
		);

		function __construct() {
			add_theme_support( 'post-thumbnails', array( 'edc_placemark' ) );
			add_action('init', array($this, 'init'));
			add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
			add_action('admin_init', array($this, 'admin_init'));
			add_action('save_post', array($this, 'save_post'));
			add_filter('manage_edc_placemark_posts_columns', array($this, 'edit_columns'));
			add_filter('the_title', array($this, 'the_title'));
			add_action('manage_posts_custom_column', array($this, 'display_columns'));
		}

		function init() {
			register_post_type( 'edc_placemark',
				array(
					'labels' => array(
						'name' => __( 'Homepage' ),
						'singular_name' => __( 'Homepage' )
					),
					'public' => false,
					'show_ui' => true,
					'menu_position' => 2,
					'supports' => array('thumbnail', 'revisions')
				)
			);
		}

		function add_meta_boxes() {
			global $post;
			add_meta_box('edc_placemark', 'Homepage Placemark', array($this, 'create_edc_placemark_box'), 'edc_placemark', 'normal');
			add_meta_box('edc_placemark_name', 'Name', array($this, 'create_edc_placemark_name_box'), 'edc_placemark', 'normal');
			add_meta_box('edc_placemark_address', 'Address', array($this, 'create_edc_placemark_address_box'), 'edc_placemark', 'normal');
			add_meta_box('edc_testimonial_details', 'Testimonial Details', array($this, 'create_edc_testimonial_box'), 'edc_placemark', 'normal');
			if ('edc_placemark' == $post->post_type) {
				add_action('admin_head', array($this, 'create_edc_placemark_box_js'));
			}
		}

		function create_edc_placemark_box($post) {
			$edc_placemark_type = get_post_meta($post->ID, 'edc_placemark_type', true) OR $edc_placemark_type = 'testimonial';
			$edc_placemark_lat = get_post_meta($post->ID, 'edc_placemark_lat', true) OR $edc_placemark_lat = 39.831882;
			$edc_placemark_lng = get_post_meta($post->ID, 'edc_placemark_lng', true) OR $edc_placemark_lng = -84.981754;
			echo '<p><strong>Placemark Type</strong></p>';
			echo '<label class="screen-reader-text" for="edc_placemark_type">Placemark Type</label>';
			echo '<select id="edc_placemark_type" name="edc_placemark_type">';
			foreach(array('Testimonial'=>'Testimonial', 'Park'=>'Park', 'Site'=>'Site') as $val => $text) {
				$selected = ($val == $edc_placemark_type) ? 'selected="selected"' : '';
				echo "<option value='$val' $selected>$text</option>";
			}
			echo '</select>';
			echo '<p><strong>Click the location you want the placemark to show.</strong></p>';
			echo '<div id="edc_placemark_map" style="height: 400px;"></div>';
			echo "<input type='hidden' id='edc_placemark_lat' name='edc_placemark_lat' value='$edc_placemark_lat' />";
			echo "<input type='hidden' id='edc_placemark_lng' name='edc_placemark_lng' value='$edc_placemark_lng' />";
		}

		function create_edc_placemark_name_box($post) {
			$edc_placemark_name = get_post_meta($post->ID, 'edc_placemark_name', true) OR $edc_placemark_name = '';
			echo '<p><strong>Placemark Name</strong></p>';
			echo '<label class="screen-reader-text" for="edc_placemark_name">Name</label>';
			echo "<input style='width: 90%;' id='edc_placemark_name' name='edc_placemark_name' value='$edc_placemark_name' />";
		}

		function create_edc_placemark_address_box($post) {
			$edc_placemark_address = get_post_meta($post->ID, 'edc_placemark_address', true) OR $edc_placemark_address = '';
			echo '<p><strong>Placemark Street Address </strong><br/><em>(Must match "Address/Street Name" of location from Available Buildings &amp; Sites page)</em></p>';
			echo '<label class="screen-reader-text" for="edc_placemark_address">Address</label>';
			echo "<input style='width: 90%;' id='edc_placemark_address' name='edc_placemark_address' value='$edc_placemark_address' />";
		}

		function create_edc_testimonial_box($post) {
			$edc_placemark_company = get_post_meta($post->ID, 'edc_placemark_company', true) OR '';
			$edc_placemark_company_url = get_post_meta($post->ID, 'edc_placemark_company_url', true) OR '';
			$edc_placemark_testimonial = get_post_meta($post->ID, 'edc_placemark_testimonial', true) OR '';
			echo '<p><strong>Company Name</strong></p>';
			echo '<label class="screen-reader-text" for="edc_placemark_company">Company Name</label>';
			echo "<input style='width: 90%;' id='edc_placemark_company' name='edc_placemark_company' value='$edc_placemark_company' />";
			echo '<p><strong>Company URL</strong></p>';
			echo 'http://<label class="screen-reader-text" for="edc_placemark_company_url">Company URL</label>';
			echo "<input style='width: 90%;' id='edc_placemark_company_url' name='edc_placemark_company_url' value='$edc_placemark_company_url' />";
			echo '<p><strong>Testimonial</strong></p>';
			echo '<label class="screen-reader-text" for="edc_placemark_testimonial">Testimonial</label>';
			echo "<textarea rows='5' style='width: 90%;' id='edc_placemark_testimonial' name='edc_placemark_testimonial'>$edc_placemark_testimonial</textarea>";
		}

		function create_edc_placemark_box_js() {
			echo <<<JAVASCRIPT
<script src="http://maps.google.com/maps/api/js?v=3.4&sensor=false"></script>
<script type="text/javascript">
	(function(window, undefined) {
		var $ = jQuery;
		$(document).ready(function() {
			$('#edc_placemark_type').change(function() {
				if ('Testimonial' == $(this).val()) {
					$('#edc_testimonial_details').show();
				} else {
					$('#edc_testimonial_details').hide();
				}
				if ('Site' == $(this).val()) {
					$('#edc_placemark_address').show();
				} else {
					$('#edc_placemark_address').hide();
				}
			});
			$('#edc_placemark_type').change();

			var markerPosition = new google.maps.LatLng(
				+$('#edc_placemark_lat').val(),
				+$('#edc_placemark_lng').val()
			);
			var myOptions = {
			  zoom: 11,
			  center: markerPosition,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById("edc_placemark_map"), myOptions);

			var marker = new google.maps.Marker({
				map: map,
				position: markerPosition
			});
			google.maps.event.addListener(map, 'click', function(event) {
				marker.setPosition(event.latLng);
				$('#edc_placemark_lat').val(event.latLng.lat());
				$('#edc_placemark_lng').val(event.latLng.lng());
			});

		});
	})(window);
</script>
JAVASCRIPT;
		}

		function admin_init() {
		}

		public function save_post($id) {
			foreach ($this->field_names as $field) {
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

		public function the_title($title) {
			global $post;
			if ('edc_placemark' == $post->post_type) {
				$title = get_post_meta($post->ID, 'edc_placemark_name', true);
			}
			return $title;
		}

		public function edit_columns($columns) {
			return array(
				'title' => 'Title',
				'type' => 'Type',
				'date' => 'Date'
			);
		}

		public function display_columns($column) {
			global $post;

			switch ($column) {
				case 'type':
						echo get_post_meta($post->ID, 'edc_placemark_type', TRUE);
					break;
				case 'name':
						echo get_post_meta($post->ID, 'edc_placemark_name', TRUE);
					break;
			}
			
		}
	} //End Class EdcHomepage
}
?>