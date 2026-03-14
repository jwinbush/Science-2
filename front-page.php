<?php
get_header();
?>

<main role="main" class="main-content">
  <!-- ===================================== -->
  <!--             HERO SECTION             -->
  <!-- ===================================== -->

  <section class="hero" role="banner" aria-labelledby="hero-heading">
    <div class="hero-wrapper">
      <video class="hero-video" autoplay="" muted="" loop="" playsinline="" preload="auto">
        <source src="<?php echo esc_url(get_template_directory_uri() . '/assets/videos/science.mp4'); ?>"
          type="video/mp4">
      </video>
      <div class="hero-content">
        <h1 class="hero-title">
          NASA Science
        </h1>
        <div class="hero-text">
          <p>At Sun Ag, we bring generations of farming experience and local expertise to help your operation thrive
            today and for years to come.</p>
        </div>
        <a class="btn btn-black" href="https://sunag.csmdemo.com/about-us/">
          Discover More </a>
      </div>
    </div>
  </section>


  <!-- ===================================== -->
  <!--             ABOUT SECTION            -->
  <!-- ===================================== -->
  <section class="about">
    <div class="about-wrapper container">
      <div class="about-content">
        <div class="about-header">
          <h2 class="about-title">Our Mission</h2>
          <p class="small-header">Since 2001</p>
        </div>
        <p>KEACH was founded in 2001 by Jeff Keach. Since then we have been filling the need for a design firm where the
          principal architect is directly involved day to day giving personal attention to the client. Currently, there
          are two full time professional staff in addition to Mr. Keach; all licensed architects. We are large enough to
          meet your needs, yet small enough to provide exceptional personal service.</p>
        <a class="btn btn-red" href="/about-us">Learn More<span></span>
        </a>
      </div>
    </div>
  </section>

  <!-- ===================================== -->
  <!--             TOPICS SECTION            -->
  <!-- ===================================== -->
  <section class="topic">
    <div class="topic-wrapper container">
      <h2 class="title">Science Topics</h2>
      <div class="topic-cards">
        <div class="card">
          <img src="<?php bloginfo('template_directory'); ?>/assets/images/microscope.jpg');"
            alt="Portrait of Lee Gerritts.">
          <div class="card-info">
            <p class="name">LEE GERRIETTS</p>
            <p class="job-title">Architectural Designer</p>
          </div>
        </div>
        <div class="card"><img src="<?php bloginfo('template_directory'); ?>/assets/images/astronaut.jpg');"
            alt="Portrait of Wesley Stutter.">
          <div class="card-info">
            <p class="name">WESLEY STUTTER</p>
            <p class="job-title">Architectural Designer</p>
          </div>
        </div>
        <div class="card">
          <div class="learn-more">
            <p class="name">WHY KEACH</p>
            <a href="#">Learn More</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ====================================== -->
  <!--            NEWS SECTION                -->
  <!-- ====================================== -->
  <section class="news">
    <div class="news-wrapper container">
      <h2 class="title">Latest News</h2>
      <div class="news-cards">
        <a href="#" class="card-link">
          <div class="card"
            style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/images/astronaut.jpg'); background-size: cover; background-position: center;">
            <div class="news-content">
              <div class="news-category">
                <img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/newspaper.svg');"
                  alt="Portrait of Wesley Stutter.">
                <p>Article</p>
              </div>
              <div class="news-info">
                <p class="read-time">2 Min Read</p>
                <p class="post-title">WESLEY STUTTER</p>
              </div>
            </div>
          </div>
        </a>
        <a href="#" class="card-link">
          <div class="card"
            style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/images/microscope.jpg'); background-size: cover; background-position: center;">
            <div class="news-content">
              <div class="news-category">
                <img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/newspaper.svg');"
                  alt="Portrait of Wesley Stutter.">
                <p>Article</p>
              </div>
              <div class="news-info">
                <p class="read-time">2 Min Read</p>
                <p class="post-title">WESLEY STUTTER</p>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- ===================================== -->
  <!--             CONTACT SECTION            -->
  <!-- ===================================== -->
  <section class="contact">
    <div class="contact-wrapper container">
      <div class="contact-content">
        <h2 class="title">Bespoke Solutions<br><span>For Your Unique Project</span></h2>
        <div class="project-categories">
          <p>COMMERCIAL</p>
          <p>EDUCATION</p>
          <p>MUNICIPAL</p>
          <p>OFFICE-INDUSTRIAL</p>
          <p>RELIGIOUS</p>
        </div>
        <a class="btn btn-black" href="/about-us">Contact Us</a>
      </div>
    </div>
  </section>

  <?php get_template_part('template-parts/carousel'); ?>
</main>

<?php
get_footer(); ?>