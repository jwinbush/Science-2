<?php
/**
 * Template Name: Archive Page
 * Description: Custom Archive Page Template
 *
 * @package keach
 * @version 1.0
 */

get_header();
get_template_part('template-parts/featured-image');
?>

<main class="content">

  <?php if (have_posts()): ?>

  <header class="page-header">
    <?php
the_archive_title('<h1 class="page-title">', '</h1>');
the_archive_description('<div class="archive-description">', '</div>');
?>
  </header>

  < <?php
/* Start the Loop */
while (have_posts()):
    the_post();

    /*
     * Include the Post-Type-specific template for the content.
     * If you want to override this in a child theme, then include a file
     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
     */
    get_template_part('template-parts/content', get_post_type());

endwhile;

the_posts_pagination(array(
    'mid_size' => 2,
    'prev_text' => __('&laquo;', 'keach'),
    'next_text' => __('&raquo;', 'keach'),
    'screen_reader_text' => __('Posts navigation', 'keach'),
));

else:

    get_template_part('template-parts/content', 'none');

endif;?> <?php edit_post_link('Click Here To Edit This Page', '<span class="edit-link">', '</span>');?> </main>

    <?php
get_template_part('template-parts/banner');
get_footer();
?>