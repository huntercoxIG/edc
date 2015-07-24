<?php
global $mobilePageType, $post, $parentUrl, $the_title;
$mobilePageType = 'page';

$blog_post_id = false;
if (!empty($_GET['mp'])) {  // we're viewing a blog post
    $parentUrl = get_permalink();
    $blog_post_id  = $_GET['mp'];
    $the_title = get_the_title($blog_post_id);
} else {
    if (0 == $post->post_parent) {
        $parentUrl = '/m';
    } else {
        $parentUrl = get_post_permalink($post->post_parent);
    }
}

get_header('mobile_page'); ?>
<div id="main" role="main">
<?php if ($blog_post_id === false): // Display the blog index listing ?>

        <?php $mobile_blog_url = get_permalink(); ?>
        <?php $blog_query = new WP_Query('posts_per_page=-1'); ?>
        <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
        <?php global $more;
        $more = 0; ?>
        <div class="post" id="post-<?php the_ID(); ?>">
            <h4 class="nomargin"><a href="<?php echo $mobile_blog_url . "?mp=" . get_the_ID(); ?>"
                                    rel="bookmark"><?php the_title(); ?></a></h4>
            <?php the_date('', '<h6 class="no-margin">', '</h6>'); ?>

            <div class="entry">
                <?php the_excerpt(); ?>
                <a href="<?php echo $mobile_blog_url . "?mp=" . get_the_ID(); ?>" class="more-link">Continue reading this
                    post...</a>
            </div>

            <div class="feedback">
                <?php wp_link_pages(); ?>
            </div>
        </div>

        <?php endwhile; ?>
<?php else: // Display the single blog page. ?>
    <?php $blog_query = new WP_Query('p='.$blog_post_id); ?>
    <?php if ($blog_query->have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
        <h4 class="nomargin"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
        <?php the_date('','<h6 class="no-margin">','</h6>'); ?>
        <div class="meta"><?php edit_post_link(__('Edit This')); ?></div>

        <div class="storycontent">
            <?php the_content(__('(more...)')); ?>
        </div>


    </div>


    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
<?php endif; ?>
</div><!-- #main -->
<?php get_footer('mobile_page'); ?>
