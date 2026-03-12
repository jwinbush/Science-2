<!-- Search Button -->
<svg width="32" height="32" class="search__btn">
  <use
    href="<?php bloginfo('template_directory'); ?>/images/icons.svg#search" />
</svg>

<!-- Search Submit Button -->
<input id="searchbtn" type="submit" value="Search" class="search__btn-submit" />

<!-- Search Form -->
<div class="search">
  <?php get_search_form(); ?>
</div>

<!-- Metaslider -->
<div id="slider">
  <?php echo do_shortcode('metaslider id="1"]') ?>
</div>