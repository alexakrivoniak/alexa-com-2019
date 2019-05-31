<?php
/**
 * Alexa Krivoniak Portfolio Theme Customizer.
 *
 * @package Alexa_Krivoniak_Portfolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function alexa_krivoniak_portfolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'alexa_krivoniak_portfolio_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function alexa_krivoniak_portfolio_customize_preview_js() {
	wp_enqueue_script( 'alexa_krivoniak_portfolio_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'alexa_krivoniak_portfolio_customize_preview_js' );
