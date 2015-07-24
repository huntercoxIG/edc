<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	 <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<?php the_date('','<h6>','</h6>'); ?>
	<div class="meta"><?php edit_post_link(__('Edit This')); ?></div>

	<div class="entry">
		<?php the_excerpt(); ?>
	</div>

	<div class="feedback">
		<?php wp_link_pages(); ?>

	</div>

</div>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
