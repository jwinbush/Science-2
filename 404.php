<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package keach
 * @version 1.0
 */

get_header();

// get_template_part('template-parts/featured-image');
?>
<main class="content error-page-wrapper container">
  <section class="error-page">
	  <div class="error-header">
		  <p>Whoops!</p>
          <h1><?php esc_html_e('404 Error', 'keach'); ?></h1>
        </div>
	 
      <div class="subheader">
          <p class="error-message" style="text-align: center;">
             <?php esc_html_e('We apologize, but we couldn\'t find what you were looking for.', 'keach') ?>
          </p>
		  	<a class="btn btn-yellow" style="justify-self: center; margin-top: 2rem;"
              href="/home">Go Home</a>
      </div>
  </section>
</main>

<?php
	get_template_part('template-parts/upcoming-events');
	get_footer();
?>