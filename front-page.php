<?php

if ( 'posts' == get_option( 'show_on_front' ) ) {
	
		get_header(); 

		
	?>
    </div>
    <!-- /END COLOR OVER IMAGE -->
    </header>
    <!-- /END HOME / HEADER  -->

    <div itemprop id="content" class="content-warp" role="main">


        <?php
                get_template_part('/template-parts/aza_header_section');
                get_template_part('/template-parts/aza_features_section');
                get_template_part('/template-parts/aza_parallax_section');
                get_template_part('/template-parts/aza_testimonial_section');
                get_template_part('/template-parts/aza_ribbon_section');
                get_template_part('/template-parts/aza_portfolio_section');
                get_template_part('/template-parts/aza_pricing_section');
                get_template_part('/template-parts/aza_about_section');
                get_template_part('/template-parts/aza_clients_section');
                get_template_part('/template-parts/aza_team_section');

// $sections_array = apply_filters("repeater_pro_sections_filter",array('sections/repeater_logos_section','sections/repeater_our_services_section','sections/repeater_our_story_section','sections/repeater_our_team_section','sections/repeater_happy_customers_section','sections/repeater_ribbon_section','sections/repeater_latest_news_section','sections/repeater_contact_info_section','sections/repeater_map_section'));

//		if(!empty($sections_array)){
//			foreach($sections_array as $section){
//				get_template_part($section);
//			}
//		}
	?>


    </div>
    <!-- .content-wrap -->

    <?php 

	get_footer();
} else {

	include( get_page_template() );
}
?>