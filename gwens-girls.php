<?php
/**
 * Template Name: Gwen's Girls
 */
?>

<?php include("header.php"); ?>

<section class="gg-intro">
  <div class="container">
    <div class="row">
      <h2>Web Programming: Course I</h2>
      <p class="gg-date"><?php echo date('l F jS Y'); ?></p>
    </div>
  </div>
</section>

<div id="content-anchor"></div>
<section class="gg-subheader-phantom">
  <div class="container container--narrow">
    <div class="row">
      <div class="gg-link-list-nav">
        <?php echo the_field('link_list_nav'); ?>
      </div>
    </div>
  </div>
</section>
<section class="gg-subheader">
  <div class="container container--narrow">
    <div class="row">
      <div class="gg-link-list-nav">
        <?php echo the_field('link_list_nav'); ?>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container container--narrow">
    <div class="row">
      <div class="gg-content">
        <?php the_content(); ?>

        <div id="important-links">
          <?php echo the_field('important_links_sidebar'); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="gg-footer">
  <div class="container">
    <div class="row">
      <h6><a href="http://www.gwensgirls.org/" target="_blank">Gwen's Girls, Pittsburgh, PA</a></h6>
      <h6 class="gg-copyright">&copy; <?php echo date('Y'); ?> Alexa Krivoniak</h6>
    </div>
  </div>
</section>

<?php include("footer.php"); ?>
