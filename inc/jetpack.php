<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package AZA_Theme
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function aza_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'aza_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function aza_jetpack_setup
add_action( 'after_setup_theme', 'aza_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function aza_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function aza_infinite_scroll_render
