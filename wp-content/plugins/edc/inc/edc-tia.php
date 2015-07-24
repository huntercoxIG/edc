<?php

if (!class_exists('EdcTia')) {
		
	class EdcTia {
		
		function __construct() {
			add_action('admin_menu', array($this, 'edc_menu'));
			add_action('admin_head', array($this, 'admin_register_head'));
		}
		function edc_menu() {
			add_submenu_page('edc-main', 'Target Industry Analysis', 'Target Industry Analysis', 'edit_pages', 'edc-tia-data', array($this, 'edc_tia_data'));
		}
		function admin_register_head() {
			$url = WP_PLUGIN_URL . '/edc/css/main.css';
			echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
		}

		function edc_tia_data() {
			global $wpdb;

			if (!current_user_can('edit_pages'))  {
				wp_die( __('You do not have sufficient permissions to access this page.') );
			}
			$results = $wpdb->get_results('SELECT * from edc_trgt_indstry_anlysis_rgstr ORDER BY submission_date DESC;');

			echo '<div class="wrap">';
			echo '<h2>Target Industry Analysis</h2>';
			echo '<h3>Form Submissions</h3>';
			echo '<form action="' . WP_PLUGIN_URL . '/edc/inc/export-tia-data.php">';
			echo '<input class="button-primary" type="submit" name="excel-download" value="Download to Excel" id="submitbutton" />';
			echo '</form><br />';
			echo '<table class="widefat">';
			echo '<thead><tr><th>Name</th><th>Email</th><th>Company</th><th>IP Address</th><th>Date</th></tr></thead>';
			echo '<tfoot><tr><th>Name</th><th>Email</th><th>Company</th><th>IP Address</th><th>Date</th></tr><tfoot>';
			foreach($results as $result) {
				echo '<tr>';
				echo '<td>' . htmlentities($result->name) . '</td>';
				echo '<td><a href="mailto:' . htmlentities($result->email) . '">' . htmlentities($result->email) . '</a></td>';
				echo '<td>' . htmlentities($result->company) . '</td>';
				echo '<td>' . $result->ip . '</td>';
				echo '<td>' . date('m/d/Y G:i a', strtotime($result->submission_date)) . '</td>';
				echo '</tr>';
			}
			echo '</table>';
			echo '</div>';
		}
	} //End Class EdcTia
}
?>