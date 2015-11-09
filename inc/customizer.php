<?php
/**
 * AZA Theme Theme Customizer.
 *
 * @package AZA_Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aza_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    /********************************************************/
	/************** WP DEFAULT CONTROLS  ********************/
	/********************************************************/
	
	$wp_customize->remove_control('background_color');
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('colors');
    $wp_customize->get_section('header_image')->panel='panel_2';
//        ->panel='panel_2';
    
    
	/********************************************************/
	/********************* APPEARANCE  **********************/
	/********************************************************/

$wp_customize->add_panel( 'panel_2', array(
		'priority' => 30,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Appearance', 'aza' )
	) );


$wp_customize->add_section( 'aza_appearance_cover' , array(
		'title'       => esc_html__( 'Cover options', 'aza' ),
      	'priority'    => 30,
      	'description' => esc_html__('AZA theme general appearance options','aza'),
		'panel'		  => 'panel_2'
	));
	
/*-------------------------------
Logo
---------------------------------*/

    $wp_customize->add_setting( 'aza_logo', array(
		'default' => aza_get_file('/images/logo.png'),
		'sanitize_callback' => 'esc_url',
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aza_logo', array(              
	      	'label'    => esc_html__( 'Site Logo', 'aza' ),
	      	'section'  => 'aza_appearance_cover',
			'priority'    => 1,
	)));
    
/*-------------------------------
Site header title
---------------------------------*/
    
    $wp_customize->add_setting( 'aza_header_title', array(
		'default' => esc_html__('AZA Theme','aza'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
    
	$wp_customize->add_control( 'aza_header_title', array(
		'label'    => esc_html__( 'Main title', 'aza' ),
		'section'  => 'aza_appearance_cover',
		'priority'    => 2,
	));
    
/*-------------------------------
Site header subtitle
---------------------------------*/
    
    $wp_customize->add_setting( 'aza_subheader_title', array(
		'default' => esc_html__('One-page - Responsive, Eyecandy, Clean','aza'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
	$wp_customize->add_control( 'aza_subheader_title', array(
		'label'    => esc_html__( 'Secondary title', 'aza' ),
		'section'  => 'aza_appearance_cover',
		'priority'    => 3,
	));
    
/*-------------------------------
Header store buttons
---------------------------------*/    
    
    $wp_customize->add_setting( 'aza_appstore_link', array(
		'default' => esc_url('#'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
	$wp_customize->add_control( 'aza_appstore_link', array(
		'label'    => esc_html__('Apple Appstore link', 'aza' ),
		'section'  => 'aza_appearance_cover',
		'priority'    => 4,
	));
    
    $wp_customize->add_setting( 'aza_playstore_link', array(
		'default' => esc_url('#'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
	$wp_customize->add_control( 'aza_playstore_link', array(
		'label'    => esc_html__( 'Google Playstore link', 'aza' ),
		'section'  => 'aza_appearance_cover',
		'priority'    => 5,
	));


/*---------------------------------------
FEATURES SECTION
---------------------------------------*/
    
    $wp_customize->add_section( 'aza_appearance_features' , array(
		'title'       => esc_html__( 'Features Section', 'aza' ),
      	'priority'    => 31,
      	'description' => esc_html__('AZA theme Features section appearance options','aza'),
		'panel'		  => 'panel_2'
	));
    
/*-------------------------------
Features heading
---------------------------------*/

     $wp_customize->add_setting( 'aza_features_heading', array(
		'default' => esc_html__('KEY FEATURES','aza'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
	$wp_customize->add_control( 'aza_features_heading', array(
		'label'    => esc_html__( 'Section heading', 'aza' ),
		'section'  => 'aza_appearance_features',
		'priority'    => 1,
	));
    
/*-------------------------------
Features phone screen
---------------------------------*/
    
    $wp_customize->add_setting( 'aza_phone_screen', array(
		'default' => aza_get_file('/images/screen.png'),
		'sanitize_callback' => 'esc_url',
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aza_phone_screen', array(
	      	'label'    => esc_html__( 'Phone screen image', 'aza' ),
	      	'section'  => 'aza_appearance_features',
			'priority'    => 2,
	)));

/*-------------------------------
Features Button
---------------------------------*/

    $wp_customize->add_setting( 'aza_features_button_text', array(
		'default' => esc_html__('LEARN MORE','aza'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
	
    $wp_customize->add_control( 'aza_features_button_text', array(
		'label'    => esc_html__( 'Button Text', 'aza' ),
		'section'  => 'aza_appearance_features',
		'priority'    => 3,
	));
    
    $wp_customize->add_setting( 'aza_features_button_link', array(
		'default' => esc_url('#'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
    
	$wp_customize->add_control( 'aza_features_button_link', array(
		'label'    => esc_html__('Button Link', 'aza' ),
		'section'  => 'aza_appearance_features',
		'priority'    => 4,
	));
    
/*-------------------------------
features repeater
---------------------------------*/
    
    $wp_customize -> add_setting('aza_features_icons_left', array(
        'sanitize_callback' => 'aza_sanitize_repeater',
        'default' => json_encode(
            array(
                 array('icon_value' => 'icon-arrows-squares' , 'title' => 'Fully Responsive' , 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.' , 'subtitle' => 'fully-responsive', 'color' => '#3399df'  ),
                array('icon_value' => 'icon-computer-imac' , 'title' => 'Clean Design' , 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.' , 'subtitle' => 'clean-design', 'color' => '#f0b57c' ),
            )    
        )
    ));
    
    $wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_features_icons_left' , array(
        'label' => esc_html__('Left side','aza'),
        'section' => 'aza_appearance_features',
        'priority' => 5,
        'parallax_image_control'    => false,
        'parallax_icon_control'     => true,
        'parallax_title_control'    => true,
        'parallax_text_control'     => true,
        'parallax_link_control'     => false,
        'parallax_color_control'    => true,
    ) ) );
    
    
     $wp_customize -> add_setting('aza_features_icons_right', array(
        'sanitize_callback' => 'aza_sanitize_repeater',
        'default' => json_encode(
            array(
                 array('icon_value' => 'icon-ecommerce-diamond' , 'title' => 'Beautiful Showcase' , 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.' , 'subtitle' => 'perfect-showcase', 'color' => '#4bb992'  ),
                array('icon_value' => 'icon-settings-streamline-2' , 'title' => 'Fully Customizable' , 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.' , 'subtitle' => 'fully-customizable', 'color' => '#8a74b9' ),
            )    
        )
    ));
    
    $wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_features_icons_right' , array(
        'label' => esc_html__('Right side','aza'),
        'section' => 'aza_appearance_features',
        'priority' => 5,
        'parallax_image_control'    => false,
        'parallax_icon_control'     => true,
        'parallax_title_control'    => true,
        'parallax_text_control'     => true,
        'parallax_link_control'     => false,
        'parallax_color_control'    => true,
    ) ) );
    
    

/*-------------------------------
Features zig-zag
---------------------------------*/
    
    $wp_customize->add_setting( 'aza_zigzag_features_top', array(
        'default' => 0,
    ));

    $wp_customize->add_control( 'aza_zigzag_features_top', array(
        'label' => 'Jagged top edge',
        'type' => 'checkbox',
        'section' => 'aza_appearance_features',
    ));
    
    $wp_customize->add_setting( 'aza_zigzag_features_bottom', array(
        'default' => 0,
        ));

    $wp_customize->add_control( 'aza_zigzag_features_bottom', array(
        'label' => 'Jagged bottom edge',
        'type' => 'checkbox',
        'section' => 'aza_appearance_features',
    ));
    

    
/*---------------------------------------
PARALLAX SECTION
---------------------------------------*/
    

            /*---------------------------------------
            Parallax layers
            ---------------------------------------*/


     $wp_customize->add_section( 'aza_appearance_parallax' , array(
		'title'       => esc_html__( 'Parallax Section', 'aza' ),
      	'priority'    => 32,
      	'description' => esc_html__('AZA theme Parallax section appearance options','aza'),
		'panel'		  => 'panel_2'
	));
    
    $wp_customize->add_setting( 'aza_parallax_background', array(
		'default' => aza_get_file('/images/parallax-background.png'),
		'sanitize_callback' => 'esc_url',
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aza_parallax_background', array(
	      	'label'    => esc_html__( 'Parallax Background Image', 'aza' ),
	      	'section'  => 'aza_appearance_parallax',
	)));
    
     $wp_customize->add_setting( 'aza_parallax_layer_1', array(
		'default' => aza_get_file('/images/parallax-layer1.png'),
		'sanitize_callback' => 'esc_url',
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aza_parallax_layer_1', array(
	      	'label'    => esc_html__( 'Parallax First Layer Image', 'aza' ),
	      	'section'  => 'aza_appearance_parallax',
			'priority'    => 3,
	)));
    
    $wp_customize->add_setting( 'aza_parallax_layer_2', array(
		'default' => aza_get_file('/images/parallax-layer2.png'),
		'sanitize_callback' => 'esc_url',
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aza_parallax_layer_2', array(
	      	'label'    => esc_html__( 'Parallax Second Layer Image', 'aza' ),
	      	'section'  => 'aza_appearance_parallax',
			'priority'    => 4,
	)));
    
    
            /*---------------------------------------
            Parallax contents
            ---------------------------------------*/
    
    
    $wp_customize->add_setting( 'aza_parallax_image', array(
		'default' => aza_get_file('/images/parallax-image.png'),
		'sanitize_callback' => 'esc_url',
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aza_parallax_image', array(
	      	'label'    => esc_html__( 'Left side of the Parallax Image', 'aza' ),
	      	'section'  => 'aza_appearance_parallax',
			'priority'    => 1,
	)));
    
    $wp_customize -> add_setting('aza_parallax_text', array(
        'sanitize_callback' => 'aza_sanitize_repeater',
        'default' => json_encode(
            array(
                 array('title' => 'Our Multi layered parallax is fully customizable and showcases anything you need with an eyecandy design.' , 'text' => 'Everything is organized on layers that can be changed individually. Fully responsive and massively beautiful.')))));
    
    $wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_parallax_text' , array(
        'label' => esc_html__('Edit the parallax section text','aza'),
        'section' => 'aza_appearance_parallax',
        'priority' => 5,
        'parallax_title_control'    => true,
        'parallax_text_control'     => true,
    ) ) );
    
/*-------------------------------
TESTIMONIAL SECTION
---------------------------------*/

    
     $wp_customize->add_section( 'aza_appearance_testimonials' , array(
		'title'       => esc_html__( 'Testimonials Section', 'aza' ),
      	'description' => esc_html__('AZA theme Testimonials section appearance options','aza'),
		'panel'		  => 'panel_2'
	));
    
    
            /*---------------------------------------
            Testimonial Title
            ---------------------------------------*/
    
           $wp_customize->add_setting( 'aza_testimonials_header', array(
		'default' => esc_html__('TESTIMONIALS','aza'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
	$wp_customize->add_control( 'aza_testimonials_header', array(
		'label'    => esc_html__( 'Testimonial Heading', 'aza' ),
		'section'  => 'aza_appearance_testimonials',
		'priority'    => 1,
	));
    
            
            /*---------------------------------------
            Testimonials Repeater
            ---------------------------------------*/
        
   $wp_customize -> add_setting('aza_testimonials', array(
        'sanitize_callback' => 'aza_sanitize_repeater',
        'default' => json_encode(
            array(
                 array("image_url"  => aza_get_file('/images/testimonials-pic1.png'), 
                       "title"      => esc_html__("John Fox"),
                       "text"       => esc_html__("Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.")),
                array("image_url"  => aza_get_file('/images/testimonials-pic2.png'), 
                       "title"      => esc_html__("Parr Otte"),
                       "text"       => esc_html__("Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.")),
                array("image_url"  => aza_get_file('/images/testimonials-pic3.png'), 
                       "title"      => esc_html__("Gee Raff"),
                       "text"       => esc_html__("Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.")),
            ))));
    
    $wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_testimonials' , array(
        'label' => esc_html__('Edit the testimonial section','aza'),
        'section' => 'aza_appearance_testimonials',
        'priority' => 5,
        'parallax_image_control'    => true,
        'parallax_title_control'    => true,
        'parallax_text_control'     => true,
    ) ) );
    

        /*---------------------------------------
        Testimonials Jagged Edges
        ---------------------------------------*/

    $wp_customize->add_setting( 'aza_zigzag_testimonial_top', array(
        'default' => 0,
    ));

    $wp_customize->add_control( 'aza_zigzag_testimonial_top', array(
        'label' => 'Jagged top edge',
        'type' => 'checkbox',
        'section' => 'aza_appearance_testimonials',
    ));
    
    $wp_customize->add_setting( 'aza_zigzag_testimonial_bottom', array(
        'default' => 0,
        ));

    $wp_customize->add_control( 'aza_zigzag_testimonial_bottom', array(
        'label' => 'Jagged bottom edge',
        'type' => 'checkbox',
        'section' => 'aza_appearance_testimonials',
    ));
    
/*-------------------------------
RIBBON SECTION
---------------------------------*/
    
    $wp_customize->add_section( 'aza_appearance_ribbon' , array(
		'title'       => esc_html__( 'Ribbon Section', 'aza' ),
      	'description' => esc_html__('AZA theme Ribbon appearance options','aza'),
		'panel'		  => 'panel_2'
	));
    
     $wp_customize->add_setting( 'aza_ribbon_text', array(
		'default' => esc_html__('START USING THIS BEAUTIFUL THEME TODAY','aza'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
    
	$wp_customize->add_control( 'aza_ribbon_text', array(
		'label'    => esc_html__( 'Ribbon Text', 'aza' ),
		'section'  => 'aza_appearance_ribbon',
		'priority'    => 1,
	));
    
    $wp_customize->add_setting( 'aza_ribbon_button_text', array(
		'default' => esc_html__('LEARN MORE','aza'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
	
    $wp_customize->add_control( 'aza_ribbon_button_text', array(
		'label'    => esc_html__( 'Button Text', 'aza' ),
		'section'  => 'aza_appearance_ribbon',
		'priority'    => 2,
	));
    

/*-------------------------------
PORTFOLIO SECTION
---------------------------------*/
    
    
    $wp_customize->add_section( 'aza_appearance_portfolio' , array(
		'title'       => esc_html__( 'Portfolio Section', 'aza' ),
      	'description' => esc_html__('AZA theme Portfolio section appearance options','aza'),
		'panel'		  => 'panel_2'
	));
    
            /*---------------------------------------
            Portfolio headings
            ---------------------------------------*/
    
     $wp_customize->add_setting( 'aza_portfolio_title', array(
		'default' => esc_html__('PORTFOLIO SECTION','aza'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
    
	$wp_customize->add_control( 'aza_portfolio_title', array(
		'label'    => esc_html__( 'Title', 'aza' ),
		'section'  => 'aza_appearance_portfolio',
		'priority'    => 1,
	));
 $wp_customize->add_setting( 'aza_portfolio_subtitle', array(
		'default' => esc_html__("Showcase your own work. Be it photography, graphic design or any other form of visual art, 
you can showcase it in AZA Theme's portfolio grid.",'aza'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
	$wp_customize->add_control( 'aza_portfolio_subtitle', array(
		'label'    => esc_html__( 'Subtitle', 'aza' ),
		'section'  => 'aza_appearance_portfolio',
		'priority'    => 2,
	));
    
    
    
    
    $wp_customize -> add_setting('aza_portfolio', array(
        'sanitize_callback' => 'aza_sanitize_repeater',
        'default' => json_encode(
            array(
                 array("image_url"  => aza_get_file('/images/portfolio_1.png'), 
                       "title"      => esc_html__("City Life"),
                       "subtitle"   => esc_html__("Street Photography")),
                
                array("image_url"   => aza_get_file('/images/portfolio_2.png'), 
                       "title"      => esc_html__("Buildings"),
                      "subtitle"    => esc_html__("Architectural Study")),
                
                array("image_url"   => aza_get_file('/images/portfolio_3.png'), 
                       "title"      => esc_html__("Landscape"),
                      "subtitle"    => esc_html__("Nature Study")), 
                
                array("image_url"   => aza_get_file('/images/portfolio_4.png'), 
                       "title"      => esc_html__("Countryside"),
                       "subtitle"   => esc_html__("Rural")), 
                
                array("image_url"   => aza_get_file('/images/portfolio_5.png'), 
                       "title"      => esc_html__("Moments"),
                       "subtitle"   => esc_html__("Personal Collections")), 
                
                array("image_url"   => aza_get_file('/images/portfolio_6.png'), 
                       "title"      => esc_html__("Seaside"),
                       "subtitle"   => esc_html__("Vacation Photography")),
            ) ) ) );
    
$wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_portfolio' , array(
        'label' => esc_html__('Edit the Portfolio section','aza'),
        'section' => 'aza_appearance_portfolio',
        'priority' => 3,
        'parallax_image_control'    => true,
        'parallax_title_control'    => true,
        'parallax_subtitle_control' => true,
        'parallax_link_control'     => true,
    ) ) );
    
    
            /*---------------------------------------
            Portfolio Separators
            ---------------------------------------*/
    
    $wp_customize->add_setting( 'aza_separator_portfolio_top', array(
        'default' => 0,
    ));

    $wp_customize->add_control( 'aza_separator_portfolio_top', array(
        'label' => 'Separator top',
        'type' => 'checkbox',
        'section' => 'aza_appearance_portfolio',
    ));
    
    $wp_customize->add_setting( 'aza_separator_portfolio_bottom', array(
        'default' => 0,
        ));

    $wp_customize->add_control( 'aza_separator_portfolio_bottom', array(
        'label' => 'Separator bottom',
        'type' => 'checkbox',
        'section' => 'aza_appearance_portfolio',
    ));
    
            /*---------------------------------------
            Portfolio Button
            ---------------------------------------*/
    
    $wp_customize->add_setting( 'aza_portfolio_button_text', array(
		'default' => esc_html__('Other Works'),'aza',
		'sanitize_callback' => 'aza_sanitize_text',
	));
	
    $wp_customize->add_control( 'aza_portfolio_button_text', array(
		'label'    => esc_html__( 'Button Text', 'aza' ),
		'section'  => 'aza_appearance_portfolio',
		'priority'    => 4,
	));
    
            /*---------------------------------------
            Portfolio Jagged Edges
            ---------------------------------------*/
    
     
    $wp_customize->add_setting( 'aza_zigzag_portfolio_top', array(
        'default' => 0,
    ));

    $wp_customize->add_control( 'aza_zigzag_portfolio_top', array(
        'label' => 'Jagged top edge',
        'type' => 'checkbox',
        'section' => 'aza_appearance_portfolio',
    ));
    
    $wp_customize->add_setting( 'aza_zigzag_portfolio_bottom', array(
        'default' => 0,
        ));

    $wp_customize->add_control( 'aza_zigzag_portfolio_bottom', array(
        'label' => 'Jagged bottom edge',
        'type' => 'checkbox',
        'section' => 'aza_appearance_portfolio',
    ));
    
/*-------------------------------
ABOUT SECTION
---------------------------------*/
    
    $wp_customize->add_section( 'aza_appearance_about' , array(
		'title'       => esc_html__( 'About us section', 'aza' ),
      	'description' => esc_html__('AZA theme About section appearance options','aza'),
		'panel'		  => 'panel_2'
	));
    
    /*---------------------------------------
    About headings
    ---------------------------------------*/
    
    $wp_customize->add_setting( 'aza_about_title', array(
		'default' => esc_html__('ABOUT US','aza'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
    
	$wp_customize->add_control( 'aza_about_title', array(
		'label'    => esc_html__( 'Title', 'aza' ),
		'section'  => 'aza_appearance_about',
		'priority'    => 1,
	));
    
    $wp_customize->add_setting( 'aza_about_subtitle', array(
		'default' => esc_html__("Let clients know about your company in this section.",'aza'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
    
	$wp_customize->add_control( 'aza_about_subtitle', array(
		'label'    => esc_html__( 'Subtitle', 'aza' ),
		'section'  => 'aza_appearance_about',
		'priority'    => 2,
	));

    /*-------------------------------
    About Content
    ---------------------------------*/
    
      $wp_customize -> add_setting('aza_about_content', array(
        'sanitize_callback' => 'aza_sanitize_repeater',
        'default' => json_encode(
            array(
                 array("title"        => esc_html__("iOS Users"),
                       "text"         => esc_html__("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere."),
                       "percentage"   => esc_html__("27"),
                       "color"        => esc_html__("#3399df")),
                
                array("title"         => esc_html__("Android Users"),
                       "text"         => esc_html__("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere."),
                       "percentage"   => esc_html__("45"),
                       "color"        => esc_html__("#f0b57c")),
                
                array("title"         => esc_html__("Windows Mobile Users"),
                       "text"         => esc_html__("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere."),
                       "percentage"   => esc_html__("10"),
                       "color"        => esc_html__("#4bb992")),
                
                array("title"         => esc_html__("Desktop Users"),
                       "text"         => esc_html__("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere."),
                       "percentage"   => esc_html__("18"),
                       "color"        => esc_html__("#8a74b9")),
                
               
            ) ) ) );
    
            $wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_about_content' , array(
                    'label' => esc_html__('Edit the About Us section content','aza'),
                    'section' => 'aza_appearance_about',
                    'priority' => 3,
                    'parallax_title_control'    => true,
                    'parallax_percentage_control' => true,
                    'parallax_text_control'     => true,
                    'parallax_color_control'     => true,
                
                ) ) );

    
    
    
    /*-------------------------------
    About Picture
    ---------------------------------*/

    $wp_customize->add_setting( 'about_image', array(
		'default' => aza_get_file('/images/about-photo.png'),
		'sanitize_callback' => 'esc_url',
    ));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_image', array(              
	      	'label'    => esc_html__( 'Section Photo', 'aza' ),
	      	'section'  => 'aza_appearance_about',
//			'priority'    => 1,
	)));
    
    
    /*---------------------------------------
    About Separators
    ---------------------------------------*/
    
    $wp_customize->add_setting( 'aza_separator_about_top', array(
        'default' => 0,
    ));

    $wp_customize->add_control( 'aza_separator_about_top', array(
        'label' => 'Separator top',
        'type' => 'checkbox',
        'section' => 'aza_appearance_about',
    ));
    
    $wp_customize->add_setting( 'aza_separator_about_bottom', array(
        'default' => 0,
        ));

    $wp_customize->add_control( 'aza_separator_about_bottom', array(
        'label' => 'Separator bottom',
        'type' => 'checkbox',
        'section' => 'aza_appearance_about',
    ));
    
    
    /*-------------------------------
    About Button
    ---------------------------------*/
    
        $wp_customize->add_setting( 'aza_about_button_text', array(
		'default' => esc_html__('More info'),'aza',
		'sanitize_callback' => 'aza_sanitize_text',
	));
	
    $wp_customize->add_control( 'aza_about_button_text', array(
		'label'    => esc_html__( 'Button Text', 'aza' ),
		'section'  => 'aza_appearance_about',
		'priority'    => 4,
	));
    
    
    /*---------------------------------------
    About Jagged Edges
    ---------------------------------------*/
    
     
    $wp_customize->add_setting( 'aza_zigzag_about_top', array(
        'default' => 0,
    ));

    $wp_customize->add_control( 'aza_zigzag_about_top', array(
        'label' => 'Jagged top edge',
        'type' => 'checkbox',
        'section' => 'aza_appearance_about',
    ));
    
    $wp_customize->add_setting( 'aza_zigzag_about_bottom', array(
        'default' => 0,
        ));

    $wp_customize->add_control( 'aza_zigzag_about_bottom', array(
        'label' => 'Jagged bottom edge',
        'type' => 'checkbox',
        'section' => 'aza_appearance_about',
    ));
    
    
/*-------------------------------
SHORTCODES SECTION 
---------------------------------*/

    $wp_customize->add_panel( 'panel_3', array(
		'priority' => 32,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Shortcodes', 'aza' )
	) );

    $wp_customize->add_section( 'aza_shortcodes' , array(
		'title'       => esc_html__( 'Shortcodes', 'aza' ),
      	'description' => esc_html__('AZA theme shortcode options','aza'),
		'panel'		  => 'panel_3'
	));
    
  $wp_customize -> add_setting('aza_shortcodes_settings', array(
        //'sanitize_callback' => 'aza_sanitize_repeater',
        'default' => json_encode(
            array(
             array("title"      => esc_html__("Pricing Table"),
                   "subtitle"   => esc_html__(""), 
                   "link"       => esc_url(""),
                ) ) ) ) );
    
$wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_shortcodes_settings' , array(
        'label' => esc_html__('Edit the shortcode options','aza'),
        'section' => 'aza_shortcodes',
        'priority' => 1,
        'parallax_title_control'    => true,
        'parallax_subtitle_control'    => true,
        'parallax_shortcode_control' => true
    ) ) );
    
/*-------------------------------
CLIENTS SECTION
---------------------------------*/
    
    $wp_customize->add_section( 'aza_appearance_clients' , array(
		'title'       => esc_html__( 'Clients Section', 'aza' ),
      	'description' => esc_html__('AZA theme Clients section appearance options','aza'),
		'panel'		  => 'panel_2'
	));
    
    /*---------------------------------------
    Clients headings
    ---------------------------------------*/
    
    $wp_customize->add_setting( 'aza_clients_title', array(
		'default' => esc_html__('OUR CLIENTS','aza'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
    
	$wp_customize->add_control( 'aza_clients_title', array(
		'label'    => esc_html__( 'Title', 'aza' ),
		'section'  => 'aza_appearance_clients',
		'priority'    => 1,
	));
    
    $wp_customize->add_setting( 'aza_clients_subtitle', array(
		'default' => esc_html__("Our awesome clients",'aza'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
    
	$wp_customize->add_control( 'aza_clients_subtitle', array(
		'label'    => esc_html__( 'Subtitle', 'aza' ),
		'section'  => 'aza_appearance_clients',
		'priority'    => 2,
	));

    /*-------------------------------
    Clients content
    ---------------------------------*/

      $wp_customize -> add_setting('aza_clients_content', array(
        'sanitize_callback' => 'aza_sanitize_repeater',
        'default' => json_encode(
            array(
                array("image_url"     => aza_get_file('/images/adobe.png'), 
                      "link"          => esc_url("#")),
                array("image_url"     => aza_get_file('/images/pixelgraft.png'), 
                      "link"          => esc_url("#")),
                array("image_url"     => aza_get_file('/images/wordpress.png'), 
                      "link"          => esc_url("#")),
                array("image_url"     => aza_get_file('/images/squares.png'), 
                      "link"          => esc_url("#")),
            ) ) ) );
    
            $wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_clients_content' , array(
                    'label' => esc_html__('Edit the Clients icons','aza'),
                    'section' => 'aza_appearance_clients',
                    'priority' => 3,
                    'parallax_link_control'    => true,
                    'parallax_image_control'     => true,
                ) ) );
    
     /*---------------------------------------
    Clients Separators
    ---------------------------------------*/
    
    $wp_customize->add_setting( 'aza_separator_clients_top', array(
        'default' => 0,
    ));

    $wp_customize->add_control( 'aza_separator_clients_top', array(
        'label' => 'Separator top',
        'type' => 'checkbox',
        'section' => 'aza_appearance_clients',
    ));
    
    $wp_customize->add_setting( 'aza_separator_clients_bottom', array(
        'default' => 0,
        ));

    $wp_customize->add_control( 'aza_separator_clients_bottom', array(
        'label' => 'Separator bottom',
        'type' => 'checkbox',
        'section' => 'aza_appearance_clients',
    ));
    
    
    /*-------------------------------
    Clients Button
    ---------------------------------*/
    
        $wp_customize->add_setting( 'aza_clients_button_text', array(
		'default' => esc_html__('Become a client'),'aza',
		'sanitize_callback' => 'aza_sanitize_text',
	));
	
    $wp_customize->add_control( 'aza_clients_button_text', array(
		'label'    => esc_html__( 'Button Text', 'aza' ),
		'section'  => 'aza_appearance_clients',
		'priority'    => 4,
	));
    
    

    
}

add_action( 'customize_register', 'aza_customize_register' );


require_once ('class/parallax-one-general-control.php');

function repeater_customizer_script() {
wp_enqueue_script( 'repeater_customizer_script', get_file('/js/repeater_customizer.js'), array("jquery","jquery-ui-draggable"),'1.0.0', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'repeater_customizer_script' );

function aza_sanitize_repeater($input){
	$input_decoded = json_decode($input,true);
	$allowed_html = array(
								'br' => array(),
								'em' => array(),
								'strong' => array(),
								'a' => array(
									'href' => array(),
									'class' => array(),
									'id' => array(),
									'target' => array()
								),
								'button' => array(
									'class' => array(),
									'id' => array()
								)
							);
	foreach ($input_decoded as $boxk => $box ){
		foreach ($box as $key => $value){
			if ($key == 'text'){
				$input_decoded[$boxk][$key] = wp_kses($value, $allowed_html);
				
			} else {
				$input_decoded[$boxk][$key] = wp_kses_post( force_balance_tags( $value ) );
			}
			
		}
	}
	
	return json_encode($input_decoded);
}


function aza_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */


function aza_customize_preview_js() {
	wp_enqueue_script( 'aza_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'aza_customize_preview_js' );