<!-- Fat Footer -->
<footer class="fat-footer">
  <div class="container">
    <div class="row">
      <!-- Logo & Description -->
      <div class="col-sm-12 col-md-6">
        <img src="/wp-content/themes/bst-master/img/edc-logo.png" alt="EDC Logo">
        <p class="description">The Economic Development Corporation (EDC) of Wayne County, Indiana, was organized in 1993 to replace earlier efforts by the Richmond Chamber of Commerce and City of Richmond. The organization is under contract for economic development services with the Wayne County Commissioners and most of the county’s towns, and has a volunteer Board of Directors.</p>
      </div>

      <!-- Helpful Links -->
      <div class="col-xs-6 col-md-3">
        <h4>Helpful Links</h4>

        <ul class="helpful-links">
          <?php $fields = CFS()->get('helpful_links');
            foreach ($fields as $field) :
              echo '<li>';
                echo '<a href="' . $field['link_url'] . '" alt="' . $field['link_name'] . '">';
                    echo $field['link_name'];
                  echo '</a>';
              echo '</li>';  

            endforeach; ?>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="col-xs-6 col-md-3">
        <h4>Contact Us</h4>
        <p>
          <strong>
            Economic Development <br> Corporation of <br> Wayne County, Indiana
          </strong>
        </p>
        <p>
          500 South A Street, Suite 2 <br>
          Richmond IN 47374 <br>
          <a href="#MAILTO:info@edcwc.com">info@edcwc.com</a> <br>
          (765) 983-4769
        </p>
      </div>
    </div>
  </div>
</footer>

<!-- Sub Footer -->
<footer class="container site-footer">
  <div class="row">
    <div class="col-lg-12 site-sub-footer">
      <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></p>
    </div>
  </div>
</footer>



<?php wp_footer(); ?>
</body>
</html>
