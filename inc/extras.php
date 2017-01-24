<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package aza-lite
 */

/**
 * Add class for sticky navbar if sticky navbar is on.
 *
 * @param $classes
 *
 * @return array
 */
function aza_body_classes( $classes ) {
	$aza_sticky_navbar = get_theme_mod('aza_sticky_navbar', false);

	if( (bool) $aza_sticky_navbar === true ) {
		return array_merge( $classes, array( 'sticky-navigation' ) );
	}
};

add_filter( 'body_class', 'aza_body_classes' );
