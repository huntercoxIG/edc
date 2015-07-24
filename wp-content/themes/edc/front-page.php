<?php

  get_header();
  function custom_excerpt_length( $length ) {
    return 20;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

?>
    <?php get_template_part('featured-image'); ?>

      <div id="sbl">

        <div class="mobile-only callouts">
          <div class="homepage-column">
            <a href="/site-selection/available-buildings-sites"><img src="/wp-content/themes/edc/images/available-properties.jpg" alt="Available buildings and sites" /></a>
            <h2><a href="/site-selection/available-buildings-sites">Properties</a></h2>
          </div>

          <div class="homepage-column">
            <a href="/media-communications/open-lines/"><img src="/wp-content/themes/edc/images/featured-story/better-communication.png" alt="Open Lines" /></a>
            <h2><a href="/media-communications/open-lines/">Open Lines</a></h2>
          </div>
<!--
          <div class="homepage-column">
            <a href="/media-communication/presidents-desk"><img src="/wp-content/themes/edc/images/edc_fromthedesk.jpg" alt="President's Desk" /></a>
            <h2><a href="/media-communication/presidents-desk">President's Desk</a></h2>
          </div>
 -->
          <div class="homepage-column">
            <a href="http://manufacturingmatters.info/" target="_blank"><img src="/wp-content/themes/edc/images/workforcethumb.jpg" alt="Strategic Plan" /></a>
            <h2><a href="http://manufacturingmatters.info/" target="_blank">Manufacturing <br> Matters</a></h2>
          </div>
          <br clear="all">
      </div>

        <div class="sbl-section recent-news mobile-jump">
          <h2>Recent News</h2>
          <ul>

          <?php
            $posts = new WP_Query(array(
                'type' => 'post',
                'category_name' => 'news-releases',
                'posts_per_page' => 2
              )
            );
            while ($posts->have_posts()) :
              $posts->the_post();
          ?>

          <li>
            <h3><a href="<?php echo the_permalink(); ?>" class="post-title"><?php echo the_title(); ?></a></h3>
            <div class="excerpt"><?php the_excerpt(); ?></div>
            <p class="meta">posted by <span class="author"><?php the_author_meta('first_name'); echo ' '; the_author_meta('last_name');?></span> on <span class="date"><?php the_date(); ?></span></p>
          </li>
          <?php
            endwhile;
            wp_reset_postdata();
          ?>
            <li><a href="/media-communication/news-releases">more news releases&hellip;</a></li>
          </ul>
        </div>
        <div class="sbl-section announcement">
          <h2>Helpful links</h2>
          <ul>
            <li>
              <a href="/about-the-edc/meeting-dates-locations"><img src="/wp-content/themes/edc/images/sbl-calendar.png">Board Meeting Schedule</a>
            </li>
            <li>
              <a href="/about-the-edc/meeting-dates-locations/#minutes"><img src="/wp-content/themes/edc/images/sbl-notes.png">Board Meeting Minutes</a>
            </li>
            <li>
              <a href="http://www.pal-item.com/ads/sections/max_biz/index.html"><img src="/wp-content/themes/edc/images/max-biz.png">P-I Maximum Business</a>
            </li>
            <!-- <li>
              <a href="http://www.pal-item.com/ads/sections/max_biz/index.html"><img src="/wp-content/themes/edc/images/ivy-tech.png">Ivy Tech</a>
            </li> -->
            <li>
              <a href="http://abrightside.org"><img src="/wp-content/themes/edc/images/sbl-brightside.png">BrightSide</a>
            </li>
            <li>
              <a href="http://www.manufacturingmatters.info/"><img src="/wp-content/themes/edc/images/sbl-gear.png">Manufacturing Matters</a>
            </li>
          </ul>
        </div>
      </div> <!-- end #sbl -->

      <div id="ct">

        <div id="slideshow">
          <div class="slide-container">
            <img src="/wp-content/themes/edc/images/slideshow/greenway5.jpg" alt="Newly developed, shovel ready sites available in Wayne County, Indiana." />
          </div>

          <!-- Begin Slides -->
          <ol class="slides">
            <?php
            // The Query
                $temp = $wp_query;
                $wp_query = new WP_Query();
                $wp_query->query('showposts=-1&post_type=slide');

                // The Loop
                while (have_posts()) : the_post();
                    echo "<li>";
                    echo "<a href='";
                    echo $cfs->get('slide_image');
                    echo "' title='";
                    echo $cfs->get('description');
                    echo "'>";
                    the_title();
                    echo "</a>";
                    echo "</li>";

                endwhile;
                ?>
                <?php
                $wp_query = null;
                $wp_query = $temp; // Reset
            ?>

          </ol>
          <!-- End Slides -->
        </div>


        <div class="homepage-column mobile-hide">
          <a href="/site-selection/available-buildings-sites"><img src="/wp-content/themes/edc/images/available-properties.jpg" alt="Available buildings and sites" /></a>
          <h2><a href="/site-selection/available-buildings-sites">Available Properties</a></h2>
          <p>To view or find out more about any of the properties available in Wayne County, visit our <a href="/site-selection/available-buildings-sites">Buildings &amp; Sites page</a>.</p>
        </div>

        <div class="homepage-column mobile-hide">
          <a href="/media-communications/open-lines/"><img src="/wp-content/themes/edc/images/featured-story/better-communication.png" alt="Open Lines" /></a>
          <h2><a href="/media-communications/open-lines/">Open Lines</a></h2>
          <p>Welcome to the EDC of Wayne County’s new homepage. <a href="/media-communications/open-lines/">Find out more</a> about our efforts to open the lines of communication.</p>
        </div>
<!--
        <div class="homepage-column mobile-hide">
          <a href="/media-communications/ask-the-edc"><img src="/wp-content/themes/edc/images/ask-edc.jpg" alt="Ask us a question" /></a>
          <h2><a href="/media-communications/ask-the-edc">Ask the EDC</a></h2>
          <p>Submit a question to the EDC. We will post the answers <a href="/media-communications/ask-the-edc">here</a>.</p>
        </div>

 -->    <div class="homepage-column mobile-hide">
          <a href="http://manufacturingmatters.info/" target="_blank"><img src="/wp-content/themes/edc/images/workforcethumb.jpg" alt="Workforce in Training" /></a>
          <h2><a href="http://manufacturingmatters.info/" target="_blank">Manufacturing Matters</a></h2>
				<p>Check out our manufacturing training program, <a href="http://manufacturingmatters.info/" target="_blank">Manufacturing Matters</a>, or our <a href="http://edcwc.com/site-selection/data/education/#highered"> higher education institutions</a> that are collectively training our region’s workforce.</p>
        </div>
      </div>

<?php get_footer(); ?>
