<?php
/**
 * The template for displaying all single posts
 *
 * @package keach
 * @version 1.0
 */

get_header();
get_template_part('template-parts/featured-image');
?>

<main class="content">

  <?php
while (have_posts()):
    the_post();

    get_template_part('template-parts/content', get_post_type());

    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()):
        comments_template();
    endif;

endwhile; // End of the loop.
?>

  <?php edit_post_link('Click Here To Edit This Page', '<span class="post-edit-link">', '</span>');?>
</main>

<?php
get_template_part('template-parts/banner');
get_footer();
?>