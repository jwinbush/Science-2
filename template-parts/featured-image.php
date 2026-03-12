<div class="featured">

  <?php if (has_post_thumbnail()) {
    the_post_thumbnail('featured');
} else {
    ?>

  <img src="<?php bloginfo('template_directory');?>/images/feat-img.webp"
    class="attachment-featured size-featured wp-post-image" width="2100" height="380" fetchpriority="high"
    decoding="async" />

  <?php
}?>

  <div class="featured-title">
    <h1><?php the_title();?></h1>
  </div>

</div>