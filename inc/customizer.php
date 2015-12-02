<?php
/**
 * AZA Theme Theme Customizer.
 *
 * @package aza-lite
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

	$wp_customize->remove_section('colors');
	$wp_customize->remove_panel('site_identity');
    
    /********************************************************/
	/************** GENERAL OPTIONS  ************************/
	/********************************************************/
	
	$wp_customize->add_section( 'aza_lite_general_section' , array(
		'title'       => esc_html__( 'General Options', 'aza_lite' ),
      	'priority'    => 1,
      	'description' => esc_html__('Aza Lite theme general options','aza_lite'),
	));
    
    /*-------------------------------
    Logo
    ---------------------------------*/

    $wp_customize->add_setting( 'aza_logo', array(
		'default' => aza_get_file('/images/logo.png'),
		'sanitize_callback' => 'esc_url',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aza_logo', array(
	      	'label'    => esc_html__( 'Site Logo', 'aza-lite' ),
	      	'section'  => 'aza_lite_general_section',
			'priority'    => 1,
            'description' => __('Change the website logo.'),
	)));
	
	$blogname = $wp_customize->get_control('blogname');
	$blogdescription = $wp_customize->get_control('blogdescription');
	$blogicon = $wp_customize->get_control('site_icon');
	$show_on_front = $wp_customize->get_control('show_on_front');
	$page_on_front = $wp_customize->get_control('page_on_front');
	$page_for_posts = $wp_customize->get_control('page_for_posts');
    $site_background = $wp_customize->get_control('background_image');
        
    if(!empty($site_background)){
		$site_background->section='aza_lite_general_section';
		$site_background->priority= 2;
		$site_background->description= __('Change your website background image. This will show up throughout the <b>front page</b> of your website.');
    }
	if(!empty($blogname)){
		$blogname->section = 'aza_lite_general_section';
		$blogname->priority = 3;
	}
	if(!empty($blogdescription)){
		$blogdescription->section = 'aza_lite_general_section';
		$blogdescription->priority = 4;
	}
	if(!empty($blogicon)){
		$blogicon->section = 'aza_lite_general_section';
		$blogicon->priority = 5;
	}
	if(!empty($show_on_front)){
		$show_on_front->section='aza_lite_general_section';
		$show_on_front->priority= 6;
        $show_on_front->description= __('To have a fully functional version of AZA Theme, you should  set your homepage to <b>a static page</b> and create two pages for <b>Home</b> and <b>Blog</b>.');
	}
	if(!empty($page_on_front)){
		$page_on_front->section='aza_lite_general_section';
		$page_on_front->priority= 7;
	}
	if(!empty($page_for_posts)){
		$page_for_posts->section='aza_lite_general_section';
		$page_for_posts->priority= 8;
	}	
	
	$wp_customize->remove_section('static_front_page');
	$wp_customize->remove_section('title_tagline');
	$wp_customize->remove_control('background_repeat');
	$wp_customize->remove_control('background_position_x');
	$wp_customize->remove_control('background_attachment'); 
    
	/********************************************************/
	/********************* PRELOADER ************************/
	/********************************************************/
    
    $wp_customize->add_panel( 'aza_preloader_panel', array(
		'priority' => 32,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Edit the preloader appearance', 'aza-lite' ),
	));
    $wp_customize->add_section( 'aza_preloader_section' , array(
		'title'       => __( 'Preloader', 'aza-lite' ),
      	'priority'    => 25,
      	'description' => __('Preloader options','aza-lite'),

	));
    
/*
Preloader Colors
*/    
    $wp_customize->add_setting( 'aza_preloader_color', array(
        'default' => '#fc535f',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'option',
        'capability' => 'edit_theme_options',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control ( $wp_customize, 'preloader_color', 
        array(
            'label'      => __( 'Color', 'aza_lite' ),
            'section'    => 'aza_preloader_section',
            'settings'   => 'aza_preloader_color',
            'description' => __('Change the color of the preloader object.', 'aza_lite'),

        )));

    $wp_customize->add_setting( 'aza_preloader_background_color', array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'option',
        'capability' => 'edit_theme_options',


    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control ( $wp_customize, 'preloader_background-color', 
        array(
            'label'      => __( 'Background Color', 'aza_lite' ),
            'section'    => 'aza_preloader_section',
            'settings'   => 'aza_preloader_background_color',
            'description' => __('Change the background color of the preloader.', 'aza_lite'),

        )));

/*
Preloader Toggle
*/
    
    $wp_customize->add_setting( 'aza_preloader_toggle', array(
        'default' => 1,
        'sanitize_callback' => 'aza_sanitize_text',
        
    ));

    $wp_customize->add_control( 'aza_preloader_toggle', array(
        'label' => 'Enable Preloader',
        'type' => 'checkbox',
        'section' => 'aza_preloader_section',
        'settings' => 'aza_preloader_toggle',
        'description' => __('Toggle the website preloader ON or OFF.', 'aza_lite'),
        'priority' => 0,
    ));
    
/*
Preloader Types
*/
    $wp_customize->add_setting( 'aza_preloader_type', array(
        'default' => '1',
    ));
 
    $wp_customize->add_control( 'aza_preloader_type', array(
        'type' => 'radio',
        'label' => 'Preloader type',
        'section' => 'aza_preloader_section',
        'choices' => array(
            '1' => 'Rotating plane',
            '2' => 'Bouncing circles',
            '3' => 'Folding square',
            '4' => 'Bouncing lines',
        ),
        'description' => __('Change the preloader animation.')
    ));
    
    /********************************************************/
	/********************* APPEARANCE  **********************/
	/********************************************************/

$wp_customize->add_panel( 'appearance_panel', array(
		'priority'          => 30,
		'capability'        => 'edit_theme_options',
		'theme_supports'    => '',
		'title'             => __( 'Sections', 'aza-lite' ),
        'description'       => __( 'Customize the appearance of the front page sections.', 'aza-lite'),
	));


$wp_customize->add_section( 'aza_appearance_cover' , array(
		'title'       => esc_html__( 'Cover options', 'aza-lite' ),
      	'priority'    => 30,
      	'description' => esc_html__('AZA theme general appearance options','aza-lite'),
		'panel'		  => 'appearance_panel'
	));




/*-------------------------------
Site header title
---------------------------------*/

    $wp_customize->add_setting( 'aza_header_title', array(
		'default' => esc_html__('AZA Theme','aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_header_title', array(
		'label'    => esc_html__( 'Main title', 'aza-lite' ),
		'section'  => 'aza_appearance_cover',
		'priority'    => 2,
	));

/*-------------------------------
Site header subtitle
---------------------------------*/

    $wp_customize->add_setting( 'aza_subheader_title', array(
		'default' => esc_html__('One-page - Responsive, Eyecandy, Clean','aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
	$wp_customize->add_control( 'aza_subheader_title', array(
		'label'    => esc_html__( 'Secondary title', 'aza-lite' ),
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
		'label'    => esc_html__('Apple Appstore link', 'aza-lite' ),
		'section'  => 'aza_appearance_cover',
		'priority'    => 4,
	));

    $wp_customize->add_setting( 'aza_playstore_link', array(
		'default' => esc_url('#'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
	$wp_customize->add_control( 'aza_playstore_link', array(
		'label'    => esc_html__( 'Google Playstore link', 'aza-lite' ),
		'section'  => 'aza_appearance_cover',
		'priority'    => 5,
	));

    $wp_customize->add_setting( 'aza_header_store_buttons', array(
        'default' => 0,
        'sanitize_callback' => 'aza_sanitize_text',
    ));

    $wp_customize->add_control( 'aza_header_store_buttons', array(
        'label' => 'Hide store buttons',
        'type' => 'checkbox',
        'section' => 'aza_appearance_cover',
    ));


    /*-------------------------------
    Header image overlay opacity
    ---------------------------------*/

    $wp_customize->add_setting( 'aza_overlay_opacity', array(
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'default' => '0.5',
      'sanitize_callback' => 'aza_sanitize_text',
    ) );

    $wp_customize->add_control( 'aza_overlay_opacity', array(
      'type' => 'range',
      'section' => 'aza_appearance_cover',
      'label' => __( 'Range', 'aza-lite' ),
      'description' => __( 'Cover photo overlay opacity', 'aza-lite'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 1,
        'step' =>0.1,
      ),
    ) );


/*---------------------------------------
FEATURES SECTION
---------------------------------------*/

    $wp_customize->add_section( 'aza_appearance_features' , array(
		'title'       => esc_html__( 'Features Section', 'aza-lite' ),
      	'priority'    => 31,
      	'description' => esc_html__('AZA theme Features section appearance options','aza-lite'),
		'panel'		  => 'appearance_panel'
	));

/*-------------------------------
Features heading
---------------------------------*/

     $wp_customize->add_setting( 'aza_features_heading', array(
		'default' => esc_html__('KEY FEATURES','aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
	$wp_customize->add_control( 'aza_features_heading', array(
		'label'    => esc_html__( 'Section heading', 'aza-lite' ),
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
	      	'label'    => esc_html__( 'Phone screen image', 'aza-lite' ),
	      	'section'  => 'aza_appearance_features',
			'priority'    => 2,
	)));

/*-------------------------------
Features Button
---------------------------------*/

    $wp_customize->add_setting( 'aza_features_button_text', array(
		'default' => esc_html__('LEARN MORE','aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

    $wp_customize->add_control( 'aza_features_button_text', array(
		'label'    => esc_html__( 'Button Text', 'aza-lite' ),
		'section'  => 'aza_appearance_features',
		'priority'    => 3,
	));

    $wp_customize->add_setting( 'aza_features_button_link', array(
		'default' => esc_url('#'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_features_button_link', array(
		'label'    => esc_html__('Button Link', 'aza-lite' ),
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
        ),
        'sanitize_callback' => 'aza_sanitize_text',
    ));

    $wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_features_icons_left' , array(
        'label' => esc_html__('Left side','aza-lite'),
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
        ),
         'sanitize_callback' => 'aza_sanitize_text',
    ));

    $wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_features_icons_right' , array(
        'label' => esc_html__('Right side','aza-lite'),
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
        'sanitize_callback' => 'aza_sanitize_text',
    ));

    $wp_customize->add_control( 'aza_zigzag_features_top', array(
        'label' => 'Jagged top edge',
        'type' => 'checkbox',
        'section' => 'aza_appearance_features',
    ));

    $wp_customize->add_setting( 'aza_zigzag_features_bottom', array(
        'default' => 0,
        'sanitize_callback' => 'aza_sanitize_text',
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
		'title'       => esc_html__( 'Parallax Section', 'aza-lite' ),
      	'priority'    => 32,
      	'description' => esc_html__('AZA theme Parallax section appearance options','aza-lite'),
		'panel'		  => 'appearance_panel'
	));    

     $wp_customize->add_setting( 'aza_parallax_layer_1', array(
		'default' => aza_get_file('/images/parallax-layer1.png'),
		'sanitize_callback' => 'esc_url',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aza_parallax_layer_1', array(
	      	'label'    => esc_html__( 'Parallax First Layer Image', 'aza-lite' ),
	      	'section'  => 'aza_appearance_parallax',
			'priority'    => 3,
	)));

    $wp_customize->add_setting( 'aza_parallax_layer_2', array(
		'default' => aza_get_file('/images/parallax-layer2.png'),
		'sanitize_callback' => 'esc_url',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aza_parallax_layer_2', array(
	      	'label'    => esc_html__( 'Parallax Second Layer Image', 'aza-lite' ),
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
	      	'label'    => esc_html__( 'Left side of the Parallax Image', 'aza-lite' ),
	      	'section'  => 'aza_appearance_parallax',
			'priority' => 1,
	)));

    $wp_customize -> add_setting('aza_parallax_text', array(
        'sanitize_callback' => 'aza_sanitize_repeater',
        'default' => json_encode(
            array(
                 array('title' => 'Multi layered parallax.' ,
                       'text'  => 'fully customizable and showcases anything you need with an eyecandy design. Everything is organized on layers that can be changed individually. Fully responsive and massively beautiful.')))));

    $wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_parallax_text' , array(
        'label'                     => esc_html__('Edit the parallax section text','aza-lite'),
        'section'                   => 'aza_appearance_parallax',
        'priority'                  => 5,
        'parallax_title_control'    => true,
        'parallax_text_control'     => true,
    ) ) );

/*-------------------------------
TESTIMONIAL SECTION
---------------------------------*/


     $wp_customize->add_section( 'aza_appearance_testimonials' , array(
		'title'       => esc_html__( 'Testimonials Section', 'aza-lite' ),
      	'description' => esc_html__('AZA theme Testimonials section appearance options','aza-lite'),
		'panel'		  => 'appearance_panel'
	));


            /*---------------------------------------
            Testimonial Title
            ---------------------------------------*/

           $wp_customize->add_setting( 'aza_testimonials_header', array(
		'default' => esc_html__('TESTIMONIALS','aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
	$wp_customize->add_control( 'aza_testimonials_header', array(
		'label'    => esc_html__( 'Testimonial Heading', 'aza-lite' ),
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
                       "title"      => esc_html__('John Fox', 'aza-lite'),
                       "text"       => esc_html__('Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.', 'aza-lite')),
                array("image_url"  => aza_get_file('/images/testimonials-pic2.png'),
                       "title"      => esc_html__('Parr Otte', 'aza-lite'),
                       "text"       => esc_html__('Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.', 'aza-lite' )),
                array("image_url"  => aza_get_file('/images/testimonials-pic3.png'),
                       "title"      => esc_html__('Gee Raff', 'aza-lite'),
                       "text"       => esc_html__('Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.', 'aza-lite')),
            ))));

    $wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_testimonials' , array(
        'label' => esc_html__('Edit the testimonial section','aza-lite'),
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
        'sanitize_callback' => 'aza_sanitize_text',
    ));

    $wp_customize->add_control( 'aza_zigzag_testimonial_top', array(
        'label' => 'Jagged top edge',
        'type' => 'checkbox',
        'section' => 'aza_appearance_testimonials',
    ));

    $wp_customize->add_setting( 'aza_zigzag_testimonial_bottom', array(
        'default' => 0,
        'sanitize_callback' => 'aza_sanitize_text',
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
		'title'       => esc_html__( 'Ribbon Section', 'aza-lite' ),
      	'description' => esc_html__('AZA theme Ribbon appearance options','aza-lite'),
		'panel'		  => 'appearance_panel'
	));

     $wp_customize->add_setting( 'aza_ribbon_text', array(
		'default' => esc_html__('START USING THIS BEAUTIFUL THEME TODAY','aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_ribbon_text', array(
		'label'    => esc_html__( 'Ribbon Text', 'aza-lite' ),
		'section'  => 'aza_appearance_ribbon',
		'priority'    => 1,
	));

    $wp_customize->add_setting( 'aza_ribbon_button_text', array(
		'default' => esc_html__('LEARN MORE','aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

    $wp_customize->add_control( 'aza_ribbon_button_text', array(
		'label'    => esc_html__( 'Button Text', 'aza-lite' ),
		'section'  => 'aza_appearance_ribbon',
		'priority'    => 2,
	));


/*-------------------------------
PORTFOLIO SECTION
---------------------------------*/


    $wp_customize->add_section( 'aza_appearance_portfolio' , array(
		'title'       => esc_html__( 'Portfolio Section', 'aza-lite' ),
      	'description' => esc_html__('AZA theme Portfolio section appearance options','aza-lite'),
		'panel'		  => 'appearance_panel'
	));

            /*---------------------------------------
            Portfolio headings
            ---------------------------------------*/

     $wp_customize->add_setting( 'aza_portfolio_title', array(
		'default' => esc_html__('PORTFOLIO SECTION','aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_portfolio_title', array(
		'label'    => esc_html__( 'Title', 'aza-lite' ),
		'section'  => 'aza_appearance_portfolio',
		'priority'    => 1,
	));
 $wp_customize->add_setting( 'aza_portfolio_subtitle', array(
		'default' => esc_html__("Showcase your own work. Be it photography, graphic design or any other form of visual art,
you can showcase it in AZA Theme's portfolio grid.",'aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));
	$wp_customize->add_control( 'aza_portfolio_subtitle', array(
		'label'    => esc_html__( 'Subtitle', 'aza-lite' ),
		'section'  => 'aza_appearance_portfolio',
		'priority'    => 2,
	));

    /*---------------------------------------
    Portfolio Content
    ---------------------------------------*/

$wp_customize->add_setting( 'portfolio_show_link_to_single', array(
		'default' => 1,
        'sanitize_callback' => 'aza_sanitize_text',
	));
	$wp_customize->add_control( 'portfolio_show_link_to_single',
		array(
			'type' => 'checkbox',
			'label' => __('Show link to single?','aza-lite'),
			'description' => __('If you check this box, a link to single page will be available when hover on a portfolio item','aza-lite'),
			'section' => 'aza_appearance_portfolio',
			'priority'    => 10,
		)
	);
$wp_customize->add_setting( 'number_of_portfolio_posts', array(
		'default' => 3,
        'sanitize_callback' => 'esc_attr',
	));
	$wp_customize->add_control( 'number_of_portfolio_posts',
		array(
			'type' => 'number',
			'label' => __('Number of posts','aza-lite'),
			'section' => 'aza_appearance_portfolio',

			'priority'    => 40,
		)
	);



            /*---------------------------------------
            Portfolio Separators
            ---------------------------------------*/

    $wp_customize->add_setting( 'aza_separator_portfolio_top', array(
        'default' => 0,
        'sanitize_callback' => 'aza_sanitize_text',
    ));

    $wp_customize->add_control( 'aza_separator_portfolio_top', array(
        'label' => 'Separator top',
        'type' => 'checkbox',
        'section' => 'aza_appearance_portfolio',
    ));

    $wp_customize->add_setting( 'aza_separator_portfolio_bottom', array(
        'default' => 0,
        'sanitize_callback' => 'aza_sanitize_text',
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
		'default' => esc_html__('Other Works', 'aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

    $wp_customize->add_control( 'aza_portfolio_button_text', array(
		'label'    => esc_html__( 'Button Text', 'aza-lite' ),
		'section'  => 'aza_appearance_portfolio',
		'priority'    => 4,
	));

            /*---------------------------------------
            Portfolio Jagged Edges
            ---------------------------------------*/


    $wp_customize->add_setting( 'aza_zigzag_portfolio_top', array(
        'default' => 0,
        'sanitize_callback' => 'aza_sanitize_text',
    ));

    $wp_customize->add_control( 'aza_zigzag_portfolio_top', array(
        'label' => 'Jagged top edge',
        'type' => 'checkbox',
        'section' => 'aza_appearance_portfolio',
    ));

    $wp_customize->add_setting( 'aza_zigzag_portfolio_bottom', array(
        'default' => 0,
        'sanitize_callback' => 'aza_sanitize_text',
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
		'title'       => esc_html__( 'About us section', 'aza-lite' ),
      	'description' => esc_html__('AZA theme About section appearance options','aza-lite'),
		'panel'		  => 'appearance_panel'
	));

    /*---------------------------------------
    About headings
    ---------------------------------------*/

    $wp_customize->add_setting( 'aza_about_title', array(
		'default' => esc_html__('ABOUT US','aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_about_title', array(
		'label'    => esc_html__( 'Title', 'aza-lite' ),
		'section'  => 'aza_appearance_about',
		'priority'    => 1,
	));

    $wp_customize->add_setting( 'aza_about_subtitle', array(
		'default' => esc_html__("Let clients know about your company in this section.",'aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_about_subtitle', array(
		'label'    => esc_html__( 'Subtitle', 'aza-lite' ),
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
                 array("title"        => esc_html__('iOS Users', 'aza-lite'),
                       "text"         => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.', 'aza-lite'),
                       "percentage"   => '27',
                       "color"        => '#3399df'),

                array("title"         => esc_html__('Android Users', 'aza-lite'),
                       "text"         => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.', 'aza-lite'),
                       "percentage"   => '45',
                       "color"        => '#f0b57c'),

                array("title"         => esc_html__('Windows Mobile Users', 'aza-lite'),
                       "text"         => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.', 'aza-lite'),
                       "percentage"   => '10',
                       "color"        => '#4bb992'),

                array("title"         => esc_html__('Desktop Users', 'aza-lite'),
                       "text"         => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.', 'aza-lite'),
                       "percentage"   => '18',
                       "color"        => '#8a74b9'),


            ) ) ) );

            $wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_about_content' , array(
                    'label' => esc_html__('Edit the About Us section content','aza-lite'),
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
	      	'label'    => esc_html__( 'Section Photo', 'aza-lite' ),
	      	'section'  => 'aza_appearance_about',
	)));


    /*---------------------------------------
    About Separators
    ---------------------------------------*/

    $wp_customize->add_setting( 'aza_separator_about_top', array(
        'default' => 0,
        'sanitize_callback' => 'aza_sanitize_text',
    ));

    $wp_customize->add_control( 'aza_separator_about_top', array(
        'label' => 'Separator top',
        'type' => 'checkbox',
        'section' => 'aza_appearance_about',
    ));

    $wp_customize->add_setting( 'aza_separator_about_bottom', array(
        'default' => 0,
        'sanitize_callback' => 'aza_sanitize_text',
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
		'default' => esc_html__('More info', 'aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

    $wp_customize->add_control( 'aza_about_button_text', array(
		'label'    => esc_html__( 'Button Text', 'aza-lite'),
		'section'  => 'aza_appearance_about',
		'priority'    => 4,
	));


    /*---------------------------------------
    About Jagged Edges
    ---------------------------------------*/


    $wp_customize->add_setting( 'aza_zigzag_about_top', array(
        'default' => 0,
        'sanitize_callback' => 'aza_sanitize_text',
    ));

    $wp_customize->add_control( 'aza_zigzag_about_top', array(
        'label' => 'Jagged top edge',
        'type' => 'checkbox',
        'section' => 'aza_appearance_about',
    ));

    $wp_customize->add_setting( 'aza_zigzag_about_bottom', array(
        'default' => 0,
        'sanitize_callback' => 'aza_sanitize_text',
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
		'title' => esc_html__( 'Shortcodes', 'aza-lite' )
	) );

    $wp_customize->add_section( 'aza_shortcodes' , array(
		'title'       => esc_html__( 'Shortcodes', 'aza-lite' ),
      	'description' => esc_html__('AZA theme shortcode options','aza-lite'),
		'panel'		  => 'panel_3'
	));

  $wp_customize -> add_setting('aza_shortcodes_settings', array(
        'sanitize_callback' => 'aza_sanitize_repeater',
        'default' => json_encode(
            array(
             array("title"      => esc_html__('Pricing Table', 'aza-lite'),
                   "subtitle"   => '',
                   "link"       => esc_url(''),
                ) ) ) ) );

$wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_shortcodes_settings' , array(
        'label' => esc_html__('Edit the shortcode options','aza-lite'),
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
		'title'       => esc_html__( 'Clients Section', 'aza-lite' ),
      	'description' => esc_html__('AZA theme Clients section appearance options','aza-lite'),
		'panel'		  => 'appearance_panel'
	));

    /*---------------------------------------
    Clients headings
    ---------------------------------------*/

    $wp_customize->add_setting( 'aza_clients_title', array(
		'default' => esc_html__('OUR CLIENTS','aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_clients_title', array(
		'label'    => esc_html__( 'Title', 'aza-lite' ),
		'section'  => 'aza_appearance_clients',
		'priority'    => 1,
	));

    $wp_customize->add_setting( 'aza_clients_subtitle', array(
		'default' => esc_html__("Our awesome clients",'aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_clients_subtitle', array(
		'label'    => esc_html__( 'Subtitle', 'aza-lite' ),
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
                    'label' => esc_html__('Edit the Clients icons','aza-lite'),
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
        'sanitize_callback' => 'aza_sanitize_text',
    ));

    $wp_customize->add_control( 'aza_separator_clients_top', array(
        'label' => 'Separator top',
        'type' => 'checkbox',
        'section' => 'aza_appearance_clients',
    ));

    $wp_customize->add_setting( 'aza_separator_clients_bottom', array(
        'default' => 0,
        'sanitize_callback' => 'aza_sanitize_text',
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
		'default' => esc_html__('Become a client', 'aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

    $wp_customize->add_control( 'aza_clients_button_text', array(
		'label'    => esc_html__( 'Button Text', 'aza-lite' ),
		'section'  => 'aza_appearance_clients',
		'priority'    => 4,
	));


/*-------------------------------
TEAM SECTION
---------------------------------*/

    $wp_customize->add_section( 'aza_appearance_team' , array(
		'title'       => esc_html__( 'Team Section', 'aza-lite' ),
      	'description' => esc_html__('AZA theme Team section appearance options','aza-lite'),
		'panel'		  => 'appearance_panel'
	));

    /*---------------------------------------
    Team headings
    ---------------------------------------*/

    $wp_customize->add_setting( 'aza_team_title', array(
		'default' => esc_html__('OUR TEAM','aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_team_title', array(
		'label'    => esc_html__( 'Title', 'aza-lite' ),
		'section'  => 'aza_appearance_team',
		'priority'    => 1,
	));

    $wp_customize->add_setting( 'aza_team_subtitle', array(
		'default' => esc_html__("Present your team members and their role in the company",'aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_team_subtitle', array(
		'label'    => esc_html__( 'Subtitle', 'aza-lite' ),
		'section'  => 'aza_appearance_team',
		'priority'    => 2,
	));

    /*-------------------------------
    Team content
    ---------------------------------*/

      $wp_customize -> add_setting('aza_team_content', array(
        'sanitize_callback' => 'aza_sanitize_repeater',
        'default' => json_encode(
            array(
                  array("image_url"     => aza_get_file('/images/team1.png'),
                      "title"         => esc_html__('Jane Doe','aza-lite'),
                      "subtitle"      => esc_html__('Project Supervisor','aza-lite'),
                      "color"         => '#f0b57c',
                      "text"          => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.','aza-lite')),
                array("image_url"     => aza_get_file('/images/team2.png'),
                      "title"         => esc_html__('Ola Nordmann','aza-lite'),
                      "subtitle"      => esc_html__('Web Designer','aza-lite'),
                      "color"         => '#4bb992',
                      "text"          => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.','aza-lite')),

                array("image_url"     => aza_get_file('/images/team3.png'),
                      "title"         => esc_html__('Average Joe','aza-lite'),
                      "subtitle"      => esc_html__('Front End Developer','aza-lite'),
                      "color"         => '#349ae0',
                      "text"          => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.','aza-lite')),
                array("image_url"     => aza_get_file('/images/team4.png'),
                      "title"         => esc_html__('Joe Bloggs','aza-lite'),
                      "subtitle"      => esc_html__('UX Designer','aza-lite'),
                      "color"         => '#887caf',
                      "text"          => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.', 'aza-lite')),
            ) ) ) );

            $wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_team_content' , array(
                    'label' => esc_html__('Edit the Team members','aza-lite'),
                    'section' => 'aza_appearance_team',
                    'priority' => 3,
                    'parallax_title_control'        => true,
                    'parallax_subtitle_control'     => true,
                    'parallax_text_control'         => true,
                    'parallax_image_control'        => true,
                    'parallax_color_control'        => true,
                ) ) );

     /*---------------------------------------
    Team Separators
    ---------------------------------------*/

    $wp_customize->add_setting( 'aza_separator_team_top', array(
        'default' => 1,
        'sanitize_callback' => 'aza_sanitize_text',
    ));

    $wp_customize->add_control( 'aza_separator_team_top', array(
        'label' => 'Separator top',
        'type' => 'checkbox',
        'section' => 'aza_appearance_team',
    ));

    $wp_customize->add_setting( 'aza_separator_team_bottom', array(
        'default' => 0,
        'sanitize_callback' => 'aza_sanitize_text',
        ));

    $wp_customize->add_control( 'aza_separator_team_bottom', array(
        'label' => 'Separator bottom',
        'type' => 'checkbox',
        'section' => 'aza_appearance_team',
    ));


    /*-------------------------------
    Team Button
    ---------------------------------*/

        $wp_customize->add_setting( 'aza_team_button_text', array(
		'default' => esc_html__('Work with us', 'aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

    $wp_customize->add_control( 'aza_team_button_text', array(
		'label'    => esc_html__( 'Button Text', 'aza-lite' ),
		'section'  => 'aza_appearance_team',
		'priority'    => 4,
	));


/*-------------------------------
BLOG SECTION
---------------------------------*/

    $wp_customize->add_section( 'aza_appearance_blog' , array(
		'title'       => esc_html__( 'Blog Section', 'aza-lite' ),
      	'description' => esc_html__('AZA theme Blog section appearance options','aza-lite'),
		'panel'		  => 'appearance_panel'
	));

    /*---------------------------------------
    Blog headings
    ---------------------------------------*/

    $wp_customize->add_setting( 'aza_blog_title', array(
		'default' => esc_html__('LATEST NEWS','aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_blog_title', array(
		'label'    => esc_html__( 'Title', 'aza-lite' ),
		'section'  => 'aza_appearance_blog',
		'priority'    => 1,
	));

    $wp_customize->add_setting( 'aza_blog_subtitle', array(
		'default' => esc_html__("Keep your users in touch with your latest blog posts and updates.",'aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_blog_subtitle', array(
		'label'    => esc_html__( 'Subtitle', 'aza-lite' ),
		'section'  => 'aza_appearance_blog',
		'priority'    => 2,
	));
    /*---------------------------------------
    Blog Separators
    ---------------------------------------*/

    $wp_customize->add_setting( 'aza_separator_blog_top', array(
        'default' => 1,
        'sanitize_callback' => 'aza_sanitize_text',
    ));

    $wp_customize->add_control( 'aza_separator_blog_top', array(
        'label' => 'Separator top',
        'type' => 'checkbox',
        'section' => 'aza_appearance_blog',
    ));

    $wp_customize->add_setting( 'aza_separator_blog_bottom', array(
        'default' => 0,
        'sanitize_callback' => 'aza_sanitize_text',
        ));

    $wp_customize->add_control( 'aza_separator_blog_bottom', array(
        'label' => 'Separator bottom',
        'type' => 'checkbox',
        'section' => 'aza_appearance_blog',
    ));

/*-------------------------------
CONTACT SECTION
---------------------------------*/

    /*---------------------------------------
    Contact headings
    ---------------------------------------*/

    $wp_customize->add_setting( 'aza_contact_title', array(
		'default' => esc_html__('Contact','aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_contact_title', array(
		'label'    => esc_html__( 'Title', 'aza-lite' ),
		'section'  => 'aza_appearance_contact',
		'priority'    => 1,
	));

    $wp_customize->add_setting( 'aza_contact_subtitle', array(
		'default' => esc_html__("Message us",'aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_contact_subtitle', array(
		'label'    => esc_html__( 'Subtitle', 'aza-lite' ),
		'section'  => 'aza_appearance_contact',
		'priority'    => 2,
	));

    /*-------------------------------
    Contact shortcode
    ---------------------------------*/

    $wp_customize->add_section( 'aza_appearance_contact' , array(
                'title'       => esc_html__( 'Contact Section', 'aza-lite' ),
                'description' => esc_html__('AZA theme contact section shortcode','aza-lite'),
                'panel'		  => 'appearance_panel'
            ));
        $wp_customize->add_setting( 'frontpage_contact_shortcode', array(
                'sanitize_callback' => 'aza_sanitize_text',
        ));
        $wp_customize->add_control( 'frontpage_contact_shortcode', array(
                'label'    => esc_html__( 'Pirate Forms Shortcode', 'aza-lite' ),
                'section'  => 'aza_appearance_contact',
                'priority'    => 1,
        ));


    /*---------------------------------------
    Contact separators
    ---------------------------------------*/

    $wp_customize->add_setting( 'aza_separator_contact_top', array(
        'default' => 1,
        'sanitize_callback' => 'aza_sanitize_text',
    ));

    $wp_customize->add_control( 'aza_separator_contact_top', array(
        'label' => 'Top Separator',
        'type' => 'checkbox',
        'section' => 'aza_appearance_contact',
    ));

    /*-------------------------------
    Contact background opacity
    ---------------------------------*/

    $wp_customize->add_setting( 'aza_overlay_opacity_contact', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '0.5',
        'sanitize_callback' => 'aza_sanitize_text',
    ) );

    $wp_customize->add_control( 'aza_overlay_opacity_contact', array(
      'type' => 'range',
      'section' => 'aza_appearance_contact',
      'label' => __( 'Range' , 'aza-lite'),
      'description' => __( 'Contact section overlay opacity', 'aza-lite'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 1,
        'step' =>0.1,
      ),
    ) );

/*-------------------------------
INTERGEO MAPS SECTION
---------------------------------*/

        $wp_customize->add_section( 'aza_appearance_map' , array(
                'title'       => esc_html__( 'Maps Section', 'aza-lite' ),
                'description' => esc_html__('AZA theme maps section shortcode','aza-lite'),
                'panel'		  => 'appearance_panel'
            ));
        $wp_customize->add_setting( 'frontpage_map_shortcode', array(
                'sanitize_callback' => 'aza_sanitize_text',
        ));
        $wp_customize->add_control( 'frontpage_map_shortcode', array(
                'label'    => esc_html__( 'Intergeo Map Shortcode', 'aza-lite' ),
                'section'  => 'aza_appearance_map',
                'priority'    => 1,
        ));


/*-------------------------------
SOCIAL RIBBON
---------------------------------*/
    $wp_customize->add_section( 'aza_appearance_social_ribbon' , array(
                'title'       => esc_html__( 'Social Ribbon', 'aza-lite' ),
                'description' => esc_html__('AZA theme social ribbon appearance options.','aza-lite'),
                'panel'		  => 'appearance_panel'
            ));


    /*-------------------------------
    Social ribbon heading 1
    ---------------------------------*/


    $wp_customize->add_setting( 'aza_social_heading_1', array(
		'default' => esc_html__('STAY CONNECTED','aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_social_heading_1', array(
		'label'    => esc_html__( 'Heading 1', 'aza-lite' ),
		'section'  => 'aza_appearance_social_ribbon',
		'priority'    => 1,
	));


    /*---------------------------------------
    Social ribbon separator
    ---------------------------------------*/

    $wp_customize->add_setting( 'aza_separator_social_ribbon', array(
        'default' => 1,
        'sanitize_callback' => 'aza_sanitize_text',
    ));

    $wp_customize->add_control( 'aza_separator_social_ribbon', array(
        'label' => 'Separator',
        'type' => 'checkbox',
        'section' => 'aza_appearance_social_ribbon',
    ));

    /*---------------------------------------
    Social ribbon icons
    ---------------------------------------*/

      $wp_customize -> add_setting('aza_social_ribbon_icons', array(
        'sanitize_callback' => 'aza_sanitize_repeater',
        'default' => json_encode(
            array(
                array('icon_value'  => 'icon-social-facebook' ,
                      'link'        => '#' ,
                      'color'       => '#4597d1'),
                array('icon_value'  => 'icon-social-twitter' ,
                      'link'        => '#' ,
                    'color'         => '#45d1c2'),
                array('icon_value'  => 'icon-social-googleplus' ,
                      'link'        => '#' ,
                      'color'       => '#fc535f'),
            )
        )
    ));

    $wp_customize -> add_control (new General_Repeater ( $wp_customize , 'aza_social_ribbon_icons' , array(
        'label' => esc_html__('Social Icons','aza-lite'),
        'section' => 'aza_appearance_social_ribbon',
        'priority' => 2,
        'parallax_icon_control'     => true,
        'parallax_link_control'     => true,
        'parallax_color_control'    => true,
    ) ) );

    /*-------------------------------
    Social ribbon heading 2
    ---------------------------------*/

     $wp_customize->add_setting( 'aza_social_heading_2', array(
		'default' => esc_html__('GET STARTED USING OUR THEME TODAY','aza-lite'),
		'sanitize_callback' => 'aza_sanitize_text',
	));

	$wp_customize->add_control( 'aza_social_heading_2', array(
		'label'    => esc_html__( 'Heading 2', 'aza-lite' ),
		'section'  => 'aza_appearance_social_ribbon',
		'priority'    => 3,
	));

    /*-------------------------------
    Social ribbon store buttons
    ---------------------------------*/
    $wp_customize->add_setting( 'aza_social_ribbon_store_buttons', array(
        'default' => 0,
        'sanitize_callback' => 'aza_sanitize_text',
    ));

    $wp_customize->add_control( 'aza_social_ribbon_store_buttons', array(
        'label' => 'Hide store buttons',
        'type' => 'checkbox',
        'section' => 'aza_appearance_social_ribbon',
    ));
}

add_action( 'customize_register', 'aza_customize_register' );


 require_once ('class/repeater-general-control.php');

function repeater_customizer_script() {
wp_enqueue_script( 'repeater_customizer_script', get_file('/js/repeater_customizer.js'), array("jquery","jquery-ui-draggable"),'1.0.0', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'repeater_customizer_script' );


function aza_custom_background_settings() {
	add_theme_support(
		'custom-background',
		array(
			'default-image' => aza_get_file('/images/background.png'),
			'default-repeat'     => 'no-repeat',
			'default-position-x' => 'center',
			'default-attachment' => 'fixed',

		)
	);
}
add_action( 'after_setup_theme', 'aza_custom_background_settings' );



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