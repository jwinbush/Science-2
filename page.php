<?php
/**
 * Template for displaying all pages
 *
 * @package keach
 * @version 1.0
 */

get_header();
?>

<main class="content">
  <section class="page-wrapper">
    <div class="page">
      <div class="breadcrumb">
        <a href="">Projects</a>
        <svg width="16" height="16"><use href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/icons.svg#chevron'); ?>"></use></svg>
        <a href="">Commercial</a>
        <svg width="16" height="16"><use href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/icons.svg#chevron'); ?>"></use></svg>
        <a href="">Lighthouse Buick GMC</a>
      </div>
      <?php
      while (have_posts()):
        the_post();
        get_template_part('template-parts/content', 'page');

        // Load comments template if applicable
        if (comments_open() || get_comments_number()):
          comments_template();
        endif;
      endwhile;
      ?>

    </div>
  </section>
  <?php get_template_part('template-parts/carousel'); ?>
</main>

<?php get_footer(); ?>