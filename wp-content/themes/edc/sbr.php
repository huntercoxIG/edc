
<?php
// displays an extra info box if there is content added
$info_box_title = CFS()->get('info_box_title');
$info_box_content = CFS()->get('info_box_content');

if ($info_box_title != "") {
?>
<div class="sbr-card">
	<h2><?php echo $info_box_title ?></h2>
	<?php echo $info_box_content ?>
</div>
<?php
};

// checks if "hide contact info box" is checked on a per-page basis
$hide_contact_box = CFS()->get('hide_contact_info_box');
if ($hide_contact_box != 1) {
?>

<?php
global $post, $pagename;
$displayPhoto = true; //disabled top level check - Jeremy 5/13/13
$sectionSlug = EdcMenu::getSectionSlug();
if ($sectionSlug == $post->post_name) {	$displayPhoto = true;}
?>

<div class="sbr-card">

	<?php if (in_array($sectionSlug, array('site-selection', 'expand-and-relocate', 'business-clusters')) or in_category( 'presidents-desk')): ?>
		<?php if ($displayPhoto): ?>
			<img src="/wp-content/themes/edc/images/valerie-shaffer_card.jpg" alt="Valerie Shaffer">
		<?php endif; ?>
		<h2>For more info contact</h2>
		<div class="contact_name">Valerie Shaffer</div>
		<div class="contact_title">President</div>
		<div class="contact_phone">Phone: (765) 983-4769</div>
		<div class="contact_fax">Fax: (765) 966-8956</div>
		<div class="contact_email">E-mail: <a href="mailto:valerie@edcwc.com">valerie@edcwc.com</a></div>
	<?php endif; ?>



	<?php if (in_array($sectionSlug, array('media-communications')) AND !in_category( 'presidents-desk')): ?>
		<?php if ($displayPhoto): ?>
			<img src="/wp-content/uploads/migrated/renee_doty.jpg" alt="Renee Doty">
		<?php endif; ?>
		<h2>For more info contact</h2>
		<div class="contact_name">Renee Doty</div>
		<div class="contact_title">Manager of Community Affairs</div>
		<div class="contact_phone">Phone: (765) 983-4769</div>
		<div class="contact_fax">Fax: (765) 966-8956</div>
		<div class="contact_email">E-mail: <a href="mailto:rdoty@edcwc.com">rdoty@edcwc.com</a></div>
	<?php endif; ?>


	<?php if (in_array($sectionSlug, array('local-links', 'about-the-edc', 'living-in-wayne-county'))): ?>
		<?php if ($displayPhoto): ?>
			<img src="/wp-content/themes/edc/images/alaina-geres_card.jpg" alt="Alaina Geres">
		<?php endif; ?>
		<h2>For more info contact</h2>
		<div class="contact_name">Alaina Geres</div>
		<div class="contact_title">Development Coordinator</div>
		<div class="contact_phone">Phone: (765) 983-4769</div>
		<div class="contact_fax">Fax: (765) 966-8956</div>
		<div class="contact_email">E-mail: <a href="mailto:alaina@edcwc.com">alaina@edcwc.com</a></div>
	<?php endif; ?>

</div>

<?php }; ?>




<?php if ($pagename == 'lets-not-use-this-for-now'): ?>
<br><div class="sbr-card">
	<h2>Submit your question</h2>
	<?php echo do_shortcode('[contact-form-7 id="1834" title="Ask the EDC"]'); ?>
</div>
<?php endif; ?>
