<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"my-data.csv\"");

require_once ('../../../../wp-load.php');

global $wpdb;

if (!current_user_can('edit_pages'))  {
	wp_die( __('You do not have sufficient permissions to access this page.') );
}

$results = $wpdb->get_results('SELECT * from edc_trgt_indstry_anlysis_rgstr ORDER BY submission_date DESC;');

echo 'name,email,company,"ip address","submission date"';
foreach($results as $result) {
	echo "\n" . '"' . $result->name . '","' . $result->email . '","' . $result->company . '","' . $result->ip . '","' . date('m/d/Y G:i a', strtotime($result->submission_date)) . '"';
}
?>