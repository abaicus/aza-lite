<?php
/**
 * Template Name: Homepage Template
 *
 * The template for the homepage of the theme.
 *
 **/

get_header(); ?>

	</div>

	</header>

	<div id="content" class="content-warp" role="main">

		<?php

		do_action('aza_frontpage_header');

		$sections_order = get_theme_mod( 'sections_order' );
		if ( ! empty( $sections_order ) ) {
			$sections_order_decoded = json_decode( $sections_order, true );
			foreach ( $sections_order_decoded as $section_name => $priority ) {
				if ( function_exists( $section_name ) ) {
					call_user_func( $section_name );
				}
			}

		} else {

			aza_blog_section();

			if( function_exists( 'aza_pro_video_section' ) ) {
				aza_pro_video_section();
			}

			if( function_exists( 'aza_pro_services_section' ) ) {
				aza_pro_services_section();
			}

			aza_parallax_section();

			aza_ribbon_section();

			aza_social_section();

			aza_contact_section();

			aza_map_section();

		}

		?>

	</div><!-- .content-wrap -->

<?php	get_footer();