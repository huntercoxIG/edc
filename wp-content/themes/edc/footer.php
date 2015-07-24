<?php
  function section_nav($section) {
    global $wpdb;

    $excluded = $wpdb->get_col("
      SELECT ID
      FROM $wpdb->posts as p
      INNER JOIN $wpdb->postmeta as pm
        on pm.post_id = p.ID
      WHERE
        pm.meta_key = 'edc_hide_from_menu'
        AND pm.meta_value = 1
    ");
    return wp_page_menu(
      array(
        'child_of' => $section,
        'depth' => 1,
        'sort_column' => 'menu_order',
        'exclude' => implode(",", $excluded)
      )
    );
  }
?>
    </div><!-- #bd -->

    <div id="ft"<?php if (strpos(get_page_template(), 'wide.php') || strpos(get_page_template(), 'page-available-buildings-sites.php')) {echo ' style="background-image: none;"';} ?>>

      <div class="footer-nav">
        <div class="footer-column address">
          
          <h3>Contact Us</h3>
          <address>
              Economic Development Corporation of Wayne County, Indiana<br>
              500 South A Street, Suite 2<br>
              Richmond, IN 47374
          </address>
          <p>
              Phone: (765) 983-4769<br>
              Fax: (765) 966-8956<br>
              International: 011-1-765-983-4769
          </p>
          <p><a href="mailto:info@edcwc.com">info@edcwc.com</a></p>
          

        </div>

        <div class="footer-column">
          <h3 class="mobile-hide"><a href="/transportation">Transportation</a></h3>
          <?php section_nav(18); ?>

          <h3><a href="/site-selection">Doing Business Here</a></h3>
          <?php section_nav(7); ?>

        </div>

        <div class="footer-column">
          <h3><a href="/business-clusters">Business Clusters</a></h3>
          <?php section_nav(107); ?>

          <h3><a href="/living-in-wayne-county">Living in Wayne County</a></h3>
          <?php section_nav(128); ?>
          
        </div>

        <div class="footer-column">
          <h3><a href="/sites-building/">Sites &amp; Building</a></h3>
          <?php section_nav(3905); ?>

          <h3><a href="/local-links">Communication &amp; Media</a></h3>
          <?php section_nav(144); ?>

          <h3><a href="/about-the-edc">About the EDC</a></h3>
          <?php section_nav(170); ?>
        </div>
      </div>
      <div id="credits">
        Copyright &copy; <?php echo date('Y'); ?> Economic Development Corporation of Wayne County, Indiana | Site by [ <a href="http://irong8.com" title="IronGate Creative"><img src="/wp-content/themes/edc/images/igc.png" style="position:relative;top:4px;"></a> ]
      </div>
    </div><!-- #ft -->
  </div><!-- end #pg -->
<?php wp_footer(); ?>
<?php if(is_front_page()) : ?>
  <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
<?php endif; ?>
  <script src="<?php echo get_template_directory_uri(); ?>/js/site.js" type="text/javascript"></script>
  <script>
    var _gaq=[["_setAccount","UA-34297337-1"],["_trackPageview"]];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script>
</body>
</html>
