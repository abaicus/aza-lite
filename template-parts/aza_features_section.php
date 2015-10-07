<?php

$features_heading = get_theme_mod('aza_features_heading', "KEY FEATURES");
$phone_screen = get_theme_mod('aza_phone_screen', aza_get_file('/images/screen.png'));
$button_text = get_theme_mod('aza_features_button_text', "LEARN MORE");
$button_link = get_theme_mod('aza_features_button_link',"#");

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
                            <ul id="left-column">
                                <li>
                                    <div id="fully-responsive" class="circle text-center">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    <h3 class="features-name text-center">Fully Responsive</h3>
                                    <p class="features-description text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.</p>
                                </li>
                                <li>
                                    <div class="features-separator"></div>
                                </li>
                                <li>
                                    <div id="clean-design" class="circle text-center">
                                        <i class="fa fa-cube"></i>
                                    </div>
                                    <h3 class="features-name text-center">Clean Design</h3>
                                    <p class="features-description text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.</p>
                                </li>
                            </ul>
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