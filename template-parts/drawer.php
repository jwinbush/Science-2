<?php $theme_uri = $args['theme_uri'] ?? get_template_directory_uri(); ?>
<div class="drawer">
  <div class="drawer-wrapper">
    <!-- Navigation -->
    <nav id="site-navigation" class="main-navigation">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'primary-menu',
        'menu_id' => 'primary-menu',
      ));
      ?>
    </nav>
    <div class="drawer-details">
      <div class="drawer-socials">
      <a href="https://www.facebook.com" target="_blank">
          <svg width="16" height="16">
            <use
              href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/icons.svg#facebook'); ?>">
            </use>
          </svg>
        </a>
      </div>
      <div class="drawer-credits">
        <p>99 Commerce Dr. | Morton, IL 61550 | 309.263.4545</p>
        <p>&copy; <?php echo date("Y"); ?> KEACH Architectural Design, INC - All Rights Reserved.</p>
      </div>
    </div>
  </div>
</div>