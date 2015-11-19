<!-- =========================
ABOUT SECTION 
============================== -->


<?php 

$heading = get_theme_mod('aza_about_title', 'ABOUT US');

$subheading = get_theme_mod('aza_about_subheading', 'Let clients know about your company in this section.');

$about_image = get_theme_mod('about_image', aza_get_file('/images/about-photo.png'));

$about_content = get_theme_mod ('aza_about_content',json_encode(
            array(
                 array("title"      => esc_html__('iOS Users','aza-lite'),
                       "text"       => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.','aza-lite'),
                       "percentage" => '27',
                       "color"      => '#3399df'),
                
                array("title"       => esc_html__('Android Users','aza-lite'),
                       "text"       => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.','aza-lite'),
                       "percentage" => '45',
                       "color"      => '#f0b57c'),
                
                array("title"       => esc_html__('Windows Mobile Users','aza-lite'),
                       "text"       => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.','aza-lite'),
                       "percentage" => '10',
                       "color"      => '#4bb992'),
                
                array("title"       => esc_html__('Desktop Users','aza-lite'),
                       "text"       => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.','aza-lite'),
                       "percentage" => '18',
                       "color"      => '#8a74b9'),
)));

$about_content_decoded = json_decode($about_content);

$button_text = get_theme_mod('aza_about_button_text', 'More info')


?>

    <div class="zig-zag-top" <?php echo ( get_theme_mod( 'aza_zigzag_about_top' ) ) ? "" : "style='display:none!important;'" ?>></div>

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-centered text-center">
                    <?php
                    if(!empty($heading)) {
                        echo '<h1>'.esc_html__($heading).'</h1>';    
                    }?>
                    
                         <div class="separator" <?php echo ( get_theme_mod( 'aza_separator_about_top' ) ) ? "" : "style='display:none!important;'" ?>></div>

                        <?php
                                if(!empty($subheading)) {
                                echo '<p>'.esc_html__($subheading).'</p>';    
                        }?>
                </div>
            </div>
            
            <div class="row about-content">
              <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 ">
               <ul class="knob-list">
               
                            <?php

                            $var = 1;

                           if(!empty($about_content)){
                           $about_content_decoded = json_decode($about_content);
                            if(!empty($about_content_decoded)) {
                        foreach($about_content_decoded as $about_content) {
                                        echo '<li>';
                                        echo '<input class= "percentages k'.$var.'" value = "'.$about_content->percentage.'" data-fgColor = "'.$about_content->color.'" data-bgColor = "#333333"/>';
                                        echo ' <div class="knob-descriptions">';
                                        echo '<h3>'.$about_content->title.'</h3>';
                                        echo '<p>'.$about_content->text.'</p>';
                                        echo '</div></li>';
                                            $var++;
                        }
                                       }}
                  ?> </div> </ul>

       
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 text-center" >

                <?php if(!empty($about_image)) {
                        echo '<img src = " '.esc_url($about_image).'" alt = "#"/>';
                    }?>
                </div>
                </div>
        </div>
              
                     <div class="container">
                     <div class="row">       
            <hr class="separator" <?php echo ( get_theme_mod( 'aza_separator_about_bottom' ) ) ? "" : "style='display:none!important;'" ?>>
        
             <?php
                        if(!empty($button_text))
                        {
                      
                        echo '<div class="col-lg-12 col-centered text-center">';
                        echo '<button type="button" class="btn features-btn">'.esc_html__($button_text).'</button></div>';
                        }
                    ?>  
                </div></div></div>
   
   </section>
<div class="zig-zag-bottom" <?php echo ( get_theme_mod( 'aza_zigzag_about_bottom' ) ) ? "" : "style='display:none!important;'" ?>></div>


       