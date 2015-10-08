<?php

$features_heading = get_theme_mod('aza_features_heading', "KEY FEATURES");

$phone_screen = get_theme_mod('aza_phone_screen', aza_get_file('/images/screen.png'));

$button_text = get_theme_mod('aza_features_button_text', "LEARN MORE");

$button_link = get_theme_mod('aza_features_button_link',"#");

$features_icons_left = get_theme_mod ('aza_features_icons_left',json_encode(
            array(
                array('icon_value' => 'icon-social-facebook' , 'title' => 'Fully Responsive' , 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.' , 'subtitle' => 'fully-responsive'),
                array('icon_value' => 'icon-social-twitter' , 'title' => 'Fully Responsive' , 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.' , 'subtitle' => 'clean-design'),
)));

$features_icons_left_decoded = json_decode($features_icons_left);
?>


    <div class="zig-zag-top" <?php echo ( get_theme_mod( 'aza_zigzag_features_top' ) ) ? "" : "style='display:none!important;'" ?>></div>

    <section class="features">
        <div class="features-background">
            <div class="container">

                <?php if(!empty($features_heading)) { 
            echo '<div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">'.$features_heading.'</h1>
                </div>
            </div>'; 
            }?>

                    <div class="row features-content">
                        <div class="col-md-4">

                            <?php

                           if(!empty($features_icons_left)){
                           $features_icons_left_decoded = json_decode($features_icons_left);
                            if(!empty($features_icons_left_decoded)) {
                                echo '<ul id="left_column">';
                                
                                    foreach($features_icons_left_decoded as $features_icons_left) {
                                        echo '<li><div id="'.esc_html($features_icons_left->subtitle). '" class="circle text-center"><span class = " '.esc_html($features_icons_left->icon_value).'"></span></div>
                                        <h3 class="features-name text-center">'.$features_icons_left->title.'</h3>
                                        <p class="features-description text-center">'.$features_icons_left->text.'</li>';
                                    }
                                
                            echo '</ul>';}
                           
                           } ?>
                        </div>

                        <div class="col-md-4 text-center">
                            <div class="device">
                                <div class="sensor"></div>
                                <div class="devicetop">

                                    <div class="front-camera"></div>
                                    <div class="iphone-speaker"></div>
                                </div>

                                <div class="screen iphone-screen" style=" background-image: url(<?php echo esc_url($phone_screen) ?>)">
                                </div>
                                <div class="button">
                                </div>
                            </div>

                            <?php if(!empty($button_link)){ ?>
                                <button type="button" onclick="window.location='<?php echo $button_link; ?>'" class="btn features-btn">
                                    <?php echo $button_text; ?>
                                </button>
                                <?php } ?>
                        </div>

                        <div class="col-md-4">
                            <ul id="right-column">
                                <li>
                                    <div id="perfect-showcase" class="circle text-center">
                                        <i class="fa fa-mobile"></i>
                                    </div>
                                    <h3 class="features-name text-center">Perfect Showcase</h3>
                                    <p class="features-description text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.</p>

                                </li>
                                <li>
                                    <div class="features-separator"></div>
                                </li>
                                <li>
                                    <div id="fully-customizable" class="circle text-center">
                                        <i class="fa fa-th-large"></i>
                                    </div>
                                    <h3 class="features-name text-center">Fully Customizable</h3>
                                    <p class="features-description text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>
        </div>


        <div class="zig-zag-bottom" <?php echo ( get_theme_mod( 'aza_zigzag_features_bottom' ) ) ? "" : "style='display:none!important;'" ?>></div>
    </section>