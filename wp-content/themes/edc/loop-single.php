<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">
	<h1><?php the_title(); ?></h1>
	<?php the_date('','<h6>','</h6>'); ?>
	<div class="meta"><?php edit_post_link(__('Edit This')); ?></div>

	<div class="storycontent">
		<?php the_content(__('(more...)')); ?>
	</div>


</div>


<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
