<?php
global $mobilePageType, $post, $parentUrl;
if (is_archive()) {
	$mobilePageType = 'home';
} else {
	$children_query = new WP_Query(array(
			'post_type' => 'mobile_page',
			'post_parent' => get_the_ID(),
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'menu_order',
			'post__not_in' => EdcMenu::nav_excluded_page_ids(true)
		)
	);
	if ($children_query->have_posts()) {
		$mobilePageType = 'page-list';
	} else {
		$mobilePageType = 'page';
	}
	wp_reset_query();
}

if (0 == $post->post_parent) {
	$parentUrl = '/m';
} else {
	$parentUrl = get_post_permalink($post->post_parent);
}

get_header('mobile_page'); ?>

<div id="main" role="main">




<?php if('page' == $mobilePageType): //do the pages main content ?>
	<?php the_content(); ?>



<?php else: //do the page-list and home pages main content ?>
	<ul class="nav">
<?php


		$mobile_page_query = new WP_Query(array(
			'post_type' => 'mobile_page',
			'post_parent' => is_archive() ? 0 : get_the_ID(),
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'menu_order',
			'post__not_in' => EdcMenu::nav_excluded_page_ids(true)
		)
	);
	while ($mobile_page_query->have_posts()):
		$mobile_page_query->the_post();
		?>
		<li id="post-<?php the_ID(); ?>">
			<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		</li>
<?php endwhile; wp_reset_query();?>
	</ul>



<?php endif; //end of page-list and home pages main content?>







	
</div><!-- #main -->

<?php get_footer('mobile_page'); ?>
