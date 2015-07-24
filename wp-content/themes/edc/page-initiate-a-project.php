
<?php get_header(); ?>

<div id="sbl">
	<div class="sbl-section">
	<?php do_action('edc_section_nav'); ?>
	</div>
</div>

<div id="ct">
	<div id="sbr"><?php get_template_part('sbr'); ?></div>


	<?php

if ($_POST) {

	// Check for spam
	if (empty($_POST['url'])) { // The URL field is a hidden "trap" field for bots.

		$ip = $_SERVER['REMOTE_ADDR'];
		$submission_date = date('Y-m-d H:i:s');

		$projectTypes = array();
		isset($_POST['expansion']) AND $projectTypes[] = 'expansion';
		isset($_POST['relocation']) AND $projectTypes[] = 'relocation';
		isset($_POST['consolidation']) AND $projectTypes[] = 'consolidation';
		$projectTypes = implode($projectTypes, ', ');

		$message = <<<MESSAGE
Name: {$_POST['fullname']}
Company Name: {$_POST['company_name']}
Email: {$_POST['email']}
Phone: {$_POST['phone']}
Type(s) of Project: {$projectTypes}
Industry Type: {$_POST['industry_type']}
Square Feet: {$_POST['square_feet']}
Ceiling Height: {$_POST['ceiling_height']}
Number Docks: {$_POST['number_docks']}
Number Acres: {$_POST['number_acres']}
Prefer Industrial Park: {$_POST['prefer_industrial_park']}

Submission Date: {$submission_date}
IP Address: {$ip}
MESSAGE;

		$to = 'jeana@edcwc.com';
		$subject = 'Initiate a Project';

		wp_mail($to, $subject, $message);
		echo 'Thank you for your submission!  We will be in contact!';

	}
	exit();
}





?>

	In order for us to better assist
	you, please complete the fields below.

	<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
		<table border="0" cellspacing="0" cellpadding="0" width="64%">
			<tbody>
			<tr>
				<td width="38%"><strong>Name</strong></td>
				<td width="62%"><input id="fullname" name="fullname" type="text"/></td>
			</tr>
			<tr>
				<td><strong>Company or Project Name</strong></td>
				<td><input id="company_name" name="company_name" type="text"/></td>
			</tr>
			<tr>
				<td><strong>Email</strong></td>
				<td><input id="email" name="email" type="text"/></td>
			</tr>
			<tr>
				<td><strong>Phone</strong></td>
				<td><input id="phone" name="phone" type="text"/></td>
			</tr>
			<tr>
				<td valign="top"><strong>Type of Project</strong></td>
				<td><input id="expansion" name="expansion" type="checkbox"/>
					Expansion
					<br/>
					<input id="relocation" name="relocation" type="checkbox"/>
					Relocation
					<br/>
					<input id="consolidation" name="consolidation" type="checkbox"/>
					Consolidation
				</td>
			</tr>
			<tr>
				<td valign="top"><strong>Industry Type</strong></td>
				<td><input id="industry_type" name="industry_type" type="text"/>


					(ex: light manufacturing)
				</td>
			</tr>
			<tr>
				<td valign="top"><strong>Searching for a Building</strong></td>
				<td><input id="square_feet" name="square_feet" size="5" type="text"/>
					square feet
					<br/>
					<input id="ceiling_height" name="ceiling_height" size="5" type="text"/>
					ceiling height
					<br/>
					<input id="number_docks" name="number_docks" size="5" type="text"/>
					number docks
				</td>
			</tr>
			<tr>
				<td valign="top"><strong>Site</strong></td>
				<td><input id="number_acres" name="number_acres" size="5" type="text"/>
					number of acres
					<br/>
					<input id="prefer_industrial_park" name="prefer_industrial_park" size="5" type="text"/>
					prefer to be in an industrial park
				</td>
			</tr>
			<tr class="hide">
				<td>URL:</td>
				<td><input type="text" name="url"></td>
			</tr>
			<tr>
				<td></td>
				<td><input id="submit" name="submit" type="submit" value="Submit"/></td>
			</tr>
			</tbody>
		</table>
	</form>
	We will contact you soon in order to discuss your project in more detail.
	<br/>Thank you for your interest in Wayne County, Indiana!

</div><!-- #ct -->

<?php get_footer(); ?>
