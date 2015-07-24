<?php


$links = array(
	'distribution-center-pdf' => '/wp-content/uploads/migrated/industry_analysis/distribution_center.pdf',
	'snack-food-processing-pdf' => '/wp-content/uploads/migrated/industry_analysis/food_processing.pdf',
	'renewable-energy-pdf' => '/wp-content/uploads/migrated/industry_analysis/renewable_energy_wind.pdf',
	'transportation-equipment-pdf' => '/wp-content/uploads/migrated/industry_analysis/transEquipMetals.pdf'
);


if ($_POST) {
	$response = array();

	$name = isset($_POST['tianame']) ? trim($_POST['tianame']) : '';
	$email = isset($_POST['tiaemail']) ? trim($_POST['tiaemail']) : '';
	$company = isset($_POST['tiacompany']) ? trim($_POST['tiacompany']) : '';
	$ip = $_SERVER['REMOTE_ADDR'];
	$submission_date = date('Y-m-d H:i:s');

	$response['submittedData']['name'] = $name;
	$response['submittedData']['email'] = $email;
	$response['submittedData']['company'] = $company;

	// Check for spam
	if (empty($_POST['url'])) {  // The URL field is a hidden "trap" field for bots.

		// Validate the data

		if (empty($name)) {
			$response['fieldErrors']['name'][] = 'Name cannot be blank';
		}
		if (empty($email)) {
			$response['fieldErrors']['email'][] = 'Email cannot be blank';
		}
		if (empty($company)) {
			$response['fieldErrors']['company'][] = 'Company cannot be blank';
		}
		if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email)) {
			$response['fieldErrors']['email'][] = 'Not a valid email address';
		}

		// Check if we have found any errors
		if ($_POST['linksOnly']) {
			$response = array(
				'links' => $links
			);
		}
		elseif ($response['fieldErrors']) {
			$response['status'] = 'error';
		}
		else {
			/**
			 * @var WPDB $wpdb
			 */
			global $wpdb;

			$data = array(
				'name' => $name,
				'email' => $email,
				'company' => $company,
				'ip' => $ip,
				'submission_date' => $submission_date
			);

			if ($wpdb->insert('edc_trgt_indstry_anlysis_rgstr', $data)) {  // All is well!
				$response['status'] = 'success';

				$response['links'] = $links;
			}
			else {
				$response['status'] = 'error';
			}
		}


		echo json_encode($response);
	}
	exit();
}




get_header(); ?>

			<div id="sbl">
				<div class="sbl-section">
				<?php do_action('edc_section_nav'); ?>
				</div>
			</div>

			<div id="ct">
				<div id="sbr"><?php get_template_part('sbr'); ?></div>

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>

					<div class="entry-content">
						<?php the_content(); ?>
						<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" name="tiaForm" id="tiaForm" style="margin-top: 0;">
							<div class="hidden">Thank you!</div>
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td>Name:</td>
									<td><input type="text" name="tianame"></td>
									<td class="error name nostyle"></td>
								</tr>
								<tr>
									<td><font face="Verdana" size="2">Company Name:</font></td>
									<td><input type="text" name="tiacompany"></td>
									<td class="error company nostyle"></td>
								</tr>
								<tr>
									<td><font face="Verdana" size="2">Email:</font></td>
									<td><input type="text" name="tiaemail"></td>
									<td class="error email nostyle"></td>
								</tr>
								<tr class="hide">
									<td><font face="Verdana" size="2">URL:</font></td>
									<td><input type="text" name="url"></td>
									<td class="error url nostyle"></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" value="Submit" id="submit-tia"></td>
									<td class="nostyle"></td>
								</tr>
							</table>
						</form>

						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
			</div><!-- #ct -->

<?php get_footer(); ?>
