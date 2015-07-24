<?php

  get_header();
  function custom_excerpt_length( $length ) {
    return 20;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



?>


<script src="http://edcwc.com/wp-content/themes/edc/js/plugins.js"></script>

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
            <a href="/wp-content/uploads/Wayne-County-Executive-Handout_FINAL-1-20-14.pdf" target="_blank"><img src="/wp-content/themes/edc/images/strategic-plan.jpg" alt="Strategic Plan" /></a>
            <h2><a href="/wp-content/uploads/Wayne-County-Executive-Handout_FINAL-1-20-14.pdf" target="_blank">Plan Summary</a></h2>
            <h3><a href="https://docs.google.com/forms/d/17LlbQNXpQK-IBubTU57_W-OXOKqugl-dqx6G-FywWxk/viewform" target="_blank">Feedback survey</a></h3>
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
            <img src="/wp-content/themes/edc/images/slideshow/greenway5.jpg" alt="New, shovel ready sites available in Phase II of the Midwest Industrial Park located in Richmond, Indiana." />
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
            <!--
            <li>
              <a href="/wp-content/themes/edc/images/slideshow/greenfield-road.jpg"
                title="Newly developed, shovel ready sites available in Wayne County, Indiana.">Newly developed, shovel ready sites available in Wayne County, Indiana.</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/greefield-sod.jpg"
                title="">Greenfield sod laying</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/gill-mcbride.jpg"
                title='"Doing business in Wayne County is good because we are centrally located to many large cities that surround us within a 200 mile radius." Gill McBride - Richmond Casting'>Gill McBride of Richmond Casting</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/rbc.jpg"
                title="">Richmond Baking</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/greenway3.jpg"
                title="">Ground breaking</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/tbevs-sewing.jpg"
                title="">Tiedemann-Bevs Industries</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/tbevs.jpg"
                title='"Positive experiences with an excellent workforce, terrific location and local support made us very comfortable moving our headquarters to Wayne County." Pete Galletly - Tiedemann-Bevs Industries'>Tiedemann-Bevs Industries</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/wayne-dairy.jpg"
                title="">Wayne Dairy</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/rct.jpg"
                title="">Richmond Civic Theatre</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/edc_fromthedesk.jpg" title="From the desk of President - Valerie Shaffer">From the desk of President Valerie Shaffer</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/model-t.jpg"
                title="">Model-T</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/cit.jpg"
                title="">CIT</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/baseball-field.jpg"
                title="">Baseball field</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/cr-england.jpg"
                title="">C.R. England</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/steel-worker.jpg"
                title="">Steel worker</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/fly-in.jpg"
                title="">Hagerstown fly-in</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/berry-plastics.jpg"
                title="">Berry Plastics</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/carshow.jpg"
                title="">Model-T carshow</a>
            </li>

            <li>
              <a href="/wp-content/themes/edc/images/slideshow/greenway5.jpg"
                title="New, shovel ready sites available in Phase II of the Midwest Industrial Park located in Richmond, Indiana.">New, shovel ready sites available in Phase II of the Midwest Industrial Park located in Richmond, Indiana.</a>
            </li>
          -->
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
          <a href="/site-selection/strategic-plan" target="_blank"><img src="/wp-content/themes/edc/images/strategic-plan.jpg" alt="Strategic Plan" /></a>
          <h2><a href="/site-selection/strategic-plan" target="_blank">Strategic Plan</a></h2>
          <p>View the <a href="/wp-content/uploads/Wayne-County-Executive-Handout_FINAL-1-20-14.pdf" target="_blank">executive summary</a> of <a href="/site-selection/strategic-plan" target="_blank">our full strategic plan</a>, directions and goals for economic development and prosperity in Wayne County.</p>
          <p>Please <a href="https://docs.google.com/forms/d/17LlbQNXpQK-IBubTU57_W-OXOKqugl-dqx6G-FywWxk/viewform" target="_blank">provide feedback to the strategic plan here</a>.</p>
        </div>
      </div>

<?php get_footer(); ?>
