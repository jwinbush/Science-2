<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package keach
 * @version 1.0
 */

?>
<?php get_template_part('template-parts/back-to-top'); ?>

<footer id="colophon" class="site-footer-wrapper">
  <div class="site-footer">
    <div class="footer-branding">
      <div class="site-logo">
        <a href="<?php echo esc_url(home_url('/home')); ?>" class="logo-link">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/site-logos/site-logo.png'); ?>"
            alt="<?php bloginfo('name'); ?> Logo" class="logo-img">
        </a>
      </div>
    </div>
    <div class="footer-socials">
      <a href="https://www.facebook.com" target="_blank">
        <svg width="16" height="16">
          <use href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/icons.svg#facebook'); ?>">
          </use>
        </svg>
      </a>
    </div>
    <div class="footer-credits">
      <p>99 Commerce Dr. | Morton, IL 61550 | 309.263.4545</p>
      <p>&copy; <?php echo date("Y"); ?> KEACH Architectural Design, INC - All Rights Reserved.</p>
    </div>
  </div>
</footer>


<?php wp_footer(); ?>

</body>

</html>