<?php
/**
 * The header for our theme
 *
 * @package keach
 * @version 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#fafafa">

  <!-- Favicon -->
  <!-- <link rel="icon"
    href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/site-logos/site-logo.svg'); ?>" /> -->

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'keach'); ?></a>
    <div class="site-header-wrapper">
      <header id="masthead" class="site-header">
        <div class="site-branding">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
            <div class="site-logo">
              <img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/site-logos/site-logo.png'); ?>"
                alt="<?php bloginfo('name'); ?> Logo" class="logo-img">
            </div>
          </a>
        </div>

        <nav id="site-navigation" class="main-navigation">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'primary-menu',
            'menu_id' => 'primary-menu',
          ));
          ?>
        </nav>

        <div class="hamburger-wrapper">
          <button class="hamburger menu-toggle" aria-label="Menu">
            <span class="hamburger-line"></span>
          </button>
        </div>

      </header>
    </div>

    <?php get_template_part('template-parts/drawer'); ?>