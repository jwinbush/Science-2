<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and is used to display a page when nothing more specific matches a query.
 *
 * @package keach
 * @version 1.0
 */

get_header();
?>

<main class="content">

  <?php
  if (have_posts()):

      if (is_home() && !is_front_page()): 
      ?>
      <header>
          <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
      </header>
      <?php
      endif;

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

      // Pagination
      the_posts_pagination(array(
          'mid_size'           => 2,
          'prev_text'          => __('&laquo;', 'keach'),
          'next_text'          => __('&raquo;', 'keach'),
          'screen_reader_text' => __('Posts navigation', 'keach'),
      ));

  else:

      // Display content-none template if no posts are found
      get_template_part('template-parts/content', 'none');

  endif;
  ?>

</main>

<?php
get_sidebar();
get_footer();
