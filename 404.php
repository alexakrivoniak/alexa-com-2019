<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Alexa_Krivoniak_Portfolio
 */
?>

<?php include("header.php"); ?>

<div class="not-found-section" style="background-image:url(<?php the_field('404_background',12); ?>);">
<section>
	<div class="container">
		<div class="row">

			<h3 class="subpage-hero-headline">404: Page Not Found</h3>
			<p class="subpage-hero-description">Whoops! The page you found doesn't exist.</p> 
		</div>
	</div>
</section>

<section class="general-content-section">
	<div class="container">
		<div class="row">
			<div class="general-content">
		      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="orange-btn btn">Back to Home!</a>
			</div>
		</div>
	</div>
</section>
</div>

<?php get_footer(); ?>

