<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since Twenty Twenty-Two 1.0
 *
 * @return void
 */
function support() {

	// Add support for block styles.
	add_theme_support( 'wp-block-styles' );

	// Enqueue editor styles.
	add_editor_style( '/dist/css/main.min.css' );

	// Register menus.
	register_nav_menus( array(
		'primary_menu' => __( 'Primary Menu' ),
	) );

}
add_action( 'after_setup_theme', 'support' );

/**
 * Enable customizer - for site icon.
 */
add_action( 'customize_register', '__return_true' );

/**
 * Enqueue styles.
 *
 * @since Twenty Twenty-Two 1.0
 *
 * @return void
 */
function styles() {
	// Register theme stylesheet.
	$theme_version = wp_get_theme()->get( 'Version' );

	$version_string = is_string( $theme_version ) ? $theme_version : false;
	wp_register_style(
		'style',
		get_template_directory_uri() . '/dist/css/main.min.css',
		array(),
		$version_string
	);

	// Enqueue theme stylesheet.
	wp_enqueue_style( 'style' );

	// Enqueue javascript.
	wp_enqueue_script( 'main', get_theme_file_uri( 'dist/js/main.min.js' ), [], $version_string, true );

}
add_action( 'wp_enqueue_scripts', 'styles' );
