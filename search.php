<?php
/**
 * The template for displaying search results pages
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
    <h1 class="page-title">
      <?php
/* translators: %s: search query. */
printf(esc_html__('Search Results for: %s', 'keach'), '<span>' . get_search_query() . '</span>');
?>
    </h1>
  </header>

  <?php
/* Start the Loop */
while (have_posts()):
    the_post();

    /**
     * Run the loop for the search to output the results.
     * If you want to overload this in a child theme then include a file
     * called content-search.php and that will be used instead.
     */
    get_template_part('template-parts/content', 'search');

endwhile;

the_posts_pagination(array(
    'mid_size' => 2,
    'prev_text' => __('&laquo;', 'keach'),
    'next_text' => __('&raquo;', 'keach'),
    'screen_reader_text' => __('Posts navigation', 'keach'),
));

else:

    get_template_part('template-parts/content', 'none');

endif;
?>

</main>

<?php
get_template_part('template-parts/banner');
get_footer();
?>