  <footer id="footer" class="container padding-top-basic padding-bottom-basic">
    <div class="grid-row">
      <div class="grid-item item-m-1">
        <h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
      </div>
      <div class="grid-item item-m-5">
        <?php
          $options = get_site_option('_igv_site_options');

          if (!empty($options['contact_tel'])) {
        ?>
        <div class="margin-bottom-tiny">
          <a href="tel:<?php echo $options['contact_tel']; ?>"><?php echo $options['contact_tel']; ?></a>
        </div>
        <?php
          }

          if (!empty($options['contact_email'])) {
        ?>
        <div>
          <a href="mailto:<?php echo $options['contact_email']; ?>"><?php echo $options['contact_email']; ?></a>
        </div>
        <?php
          }
        ?>
      </div>
      <div class="grid-item item-m-5">
        ***mailchimp***
      </div>
      <div class="grid-item item-m-1">
        <ul class="u-inline-list">
        <?php
          if (!empty($options['socialmedia_instagram'])) {
        ?>
          <li><a href="https://instagram.com/<?php echo $options['socialmedia_instagram']; ?>"><?php echo url_get_contents(get_template_directory_uri() . '/dist/img/icon_ig.svg'); ?></a></li>
        <?php
          }

          if (!empty($options['socialmedia_facebook_url'])) {
        ?>
          <li><a href="<?php echo $options['socialmedia_facebook_url']; ?>"><?php echo url_get_contents(get_template_directory_uri() . '/dist/img/icon_fb.svg'); ?></a></li>
        <?php
          }

          if (!empty($options['socialmedia_twitter'])) {
        ?>
          <li><a href="https://twitter.com/<?php echo $options['socialmedia_twitter']; ?>"><?php echo url_get_contents(get_template_directory_uri() . '/dist/img/icon_tw.svg'); ?></a></li>
        <?php
          }
        ?>
        </ul>
      </div>
    </div>
  </footer>

</section>

<?php
get_template_part('partials/scripts');
get_template_part('partials/schema-org');
?>

</body>
</html>
