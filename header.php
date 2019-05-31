<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Alexa_Krivoniak_Portfolio
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="row">
			<div class="col-m-12">
					<div class="site-branding">
						<a class="brand header-logo-link" href="<?= esc_url(home_url('/')); ?>">
							<div class="brand-border">
				          		<img src="<?php the_field('portfolio_logo', 12); ?>" data-1x="<?php the_field('portfolio_logo', 12); ?>" data-2x="<?php  the_field('portfolio_logo_retina', 12); ?>" class="header-logo" alt="Alexa Krivoniak Logo">
				        	</div>
				        </a>

					</div><!-- .site-branding -->
				</div>
				<div class="col-m-12">
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
						<ul class="main-nav-list">
							<li><a href="#work-section" class="main-nav-link">Work</a></li>
							<li><a href="#about-section" class="main-nav-link">About</a></li>
							<li><a href="#contact-section" class="main-nav-link">Contact</a></li>
							<!--<li><a href="/blog" class="main-nav-link">Blog</a></li> -->
						</ul>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<header class="gg-header">
	<div class="gg-header" style="background-image:url(<?php the_field('404_background',12); ?>);">
	  <section>
	    <div class="container">
	      <div class="row">
	      	<a class="brand header-logo-link" href="<?= esc_url(home_url('/')); ?>">
				<div class="brand-border">
	          		<img src="<?php the_field('portfolio_logo', 12); ?>" data-1x="<?php the_field('portfolio_logo', 12); ?>" data-2x="<?php  the_field('portfolio_logo_retina', 12); ?>" class="header-logo" alt="Alexa Krivoniak Logo">
	        	</div>
	        </a>
	        <h1>Gwen's Girls</h1>
	      </div>
	    </div>
	  </section>
	</div>
	</header>

	<div id="content" class="site-content">
