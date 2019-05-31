<?php
/**
 * Template Name: Home
 */
?>

<?php include("header.php"); ?>

<section class="hero-banner-section">
  <div class="hero-banner-background-image" style="background-image:url(<?php the_field('hero_banner_background_image'); ?>);"></div>
  <div class="hero-banner-background-fade" style="background-image:url('<?php bloginfo('template_directory'); ?>/assets/imgs/home-bg-image-fade.png');"></div>
  <div class="fluid-container">
    <div class="row">
      <?php if(get_field('hero_banner_site_header')): ?><h1><?php the_field('hero_banner_site_header'); ?></h1><?php endif; ?>
      <div class="col-s-6 home-banner-column">
        <div class="hero-banner-area" id="hero-banner-waypoint">
          <div class="hero-banner-content-area">
            <?php if(get_field('home_banner_subtitle')): ?><h2><?php the_field('home_banner_subtitle'); ?></h2><?php endif; ?>
            <div class="hero-banner-content"><?php the_field('hero_banner_content'); ?></div>

            <ul class="hero-banner-nav">
              <li><a href="#work-section" class="hero-banner-nav-link">Work</a></li>
              <li><a href="#about-section" class="hero-banner-nav-link">About</a></li>
              <li><a href="#contact-section" class="hero-banner-nav-link">Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="portfolio-work-section" id="work-section">
  <div class="container">
    <div class="row">
      <div class="col-m-12">
        <h3>Work</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-m-12">
        <?php
        $counter = 0;
        $args = array (
          'post_type' => array( 'portfolio_item' ),
          'order' => 'title',
          'posts_per_page' => -1
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts()): while ( $query->have_posts()): $query->the_post(); $counter++;

            $role = get_field('portfolio_item_role', $post->ID);
            $bannerImg = get_field('portfolio_item_banner_image', $post->ID);
            $featureImg = get_field('portfolio_item_feature_image', $post->ID);
            $portfolioContent = get_field('portfolio_item_content', $post->ID);
            $portfolioBtnURL = get_field('portfolio_item_button_url', $post->ID);
            $portfolioBottomContent = get_field('portfolio_item_bottom_content', $post->ID);

            if( $counter % 2 == 0 ): ?>
              <!-- Even -->
              <div class="row portfolio-item-row">
                <div class="portfolio-item-wrap even">
                <div class="portfolio-item-banner-img" style="background-image:url(<?php echo $bannerImg; ?>);"></div>
                <div class="portfolio-feature-img even" style="background-image:url(<?php echo $featureImg; ?>);"></div>

                <div class="col-m-6 portfolio-item-column">
                  <div class="portfolio-item-title-area">
                    <h4><?php the_title(); ?></h4>
                    <p class="portfolio-item-role"><?php echo $role; ?></p>
                  </div>
                </div> <!-- end of portoflio item column -->

                  <div class="col-m-6 portfolio-main-content">
                    <div class="portfolio-content">
                      <?php echo $portfolioContent; ?>
                    </div>
                    <div class="portfolio-btn-area">
                      <a href="<?php echo $portfolioBtnURL; ?>" class="portfolio-btn btn" target="_blank">View Site</a>
                    </div>
                    <?php if($portfolioBottomContent): ?>
                      <p class="portfolio-item-bottom">
                        <?php echo $portfolioBottomContent; ?>
                      </p>
                    <?php endif; ?>
                  </div> <!-- end of portfolio main content -->
                  </div> <!-- end of portfolio wrap even -->
                </div> <!-- end of portoflio item row -->
            <?php else:  ?>
              <!-- Odd -->
              <div class="row portfolio-item-row">
                <div class="portfolio-item-wrap odd">
                <div class="portfolio-item-banner-img" style="background-image:url(<?php echo $bannerImg; ?>);"></div>
                <div class="portfolio-feature-img odd" style="background-image:url(<?php echo $featureImg; ?>);"></div>

                <div class="col-m-6 portfolio-item-column">
                  <div class="portfolio-item-title-area">
                    <h4><?php the_title(); ?></h4>
                    <p class="portfolio-item-role"><?php echo $role; ?></p>
                  </div>
                </div> <!-- end of portoflio item column -->

                  <div class="col-m-6 portfolio-main-content">
                    <div class="portfolio-content">
                      <?php echo $portfolioContent; ?>
                    </div>
                    <div class="portfolio-btn-area">
                      <a href="<?php echo $portfolioBtnURL; ?>" class="portfolio-btn btn">View Site</a>
                    </div>
                    <?php if($portfolioBottomContent): ?>
                      <p class="portfolio-item-bottom">
                        <?php echo $portfolioBottomContent; ?>
                      </p>
                    <?php endif; ?>
                  </div> <!-- end of portfolio main content -->
                  </div> <!-- end of portfolio wrap even -->
                </div> <!-- end of portoflio item odd -->
            <?php endif; ?>

          <?php endwhile;
        endif;

        wp_reset_postdata();
        ?>
      </div>
    </div>
  </div>
</section>

<section class="about-section" id="about-section">
  <div class="about-background-image" style="background-image:url('<?php //the_field('about_background_image'); ?>');"></div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-m-6">
        <div class="about-title-area">
          <h3>About</h3>
          <!--<div class="about-contact-cta">
            <p><?php //the_field('about_contact_cta'); ?></p>
          </div> -->
          <div class="about-headshot-area">
            <div class="about-headshot-border">
              <div class="about-headshot" style="background-image:url('<?php echo the_field('about_headshot'); ?>');"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-m-6">
        <div class="about-content-area" id="about-content-bottom">
          <div class="about-content">
            <?php the_field('about_content'); ?>
          </div>
          <div class="about-content-resume">
            <a href="<?php the_field('about_resume'); ?>" target="_blank">Download Resume</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="contact-section" id="contact-section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-m-6">
        <div class="contact-title-area">
          <h3>Contact</h3>
          <div class="contact-social-area">
            <ul class="social-list">
              <li class="linkedin"><a href="<?php the_field('contact_linkedin'); ?>" target="_blank"></a></li>
              <li class="facebook"><a href="<?php the_field('contact_facebook'); ?>" target="_blank"></a></li>
              <li class="instagram"><a href="<?php the_field('contact_instagram'); ?>" target="_blank"></a></li>
              <li class="codepen"><a href="<?php the_field('contact_codepen'); ?>" target="_blank"></a></li>
              <li class="email"><a href="mailto:<?php the_field('contact_email'); ?>" target="_blank"></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-m-6">
        <div class="contact-content-area" id="contact-content-bottom">
          <div class="contact-content">
            <?php the_field('contact_content'); ?>
          </div>
          <div class="contact-form-area labels-under-form">
            <?php echo do_shortcode( '[ninja_form id=1]' ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include("footer.php"); ?>
