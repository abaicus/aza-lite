<!-- =========================
COVER SECTION
============================== -->
   <?php

$aza_appstore = get_theme_mod('aza_appstore', aza_get_file('/images/appstore.png'));
$aza_playstore = get_theme_mod('aza_playstore', aza_get_file('/images/playstore.png'));
$aza_main_header = get_theme_mod('aza_header_title', 'AZA Theme');
$aza_secondary_header = get_theme_mod('aza_subheader_title', 'One-page - Responsive, Eyecandy, Clean');
$aza_appstore_link = get_theme_mod('aza_appstore_link', '#');
$aza_playstore_link = get_theme_mod('aza_playstore_link', '#');
$aza_overlay_opacity = get_theme_mod('aza_overlay_opacity', '0.5');
$aza_hero_background = get_theme_mod('aza_hero_background', 'rgba(0, 0, 0, 0.25)');
$aza_buttons_type = get_theme_mod ('aza_header_buttons_type','normal_buttons');
$aza_button_text_1 = get_theme_mod ('aza_button_text_1', 'Button 1');
$aza_button_text_2 = get_theme_mod ('aza_button_text_2', 'Button 2');
$aza_button_link_1 = get_theme_mod ('aza_button_link_1', '#');
$aza_button_link_2 = get_theme_mod ('aza_button_link_2', '#');
$aza_button_color_1 = get_theme_mod('aza_button_color_1', '#3399df');
$aza_button_color_2 = get_theme_mod('aza_button_color_2', '#fc535f');
$aza_button_text_color_1 = get_theme_mod('aza_button_text_color_1', '#ffffff');
$aza_button_text_color_2 = get_theme_mod('aza_button_text_color_2', '#ffffff');

    ?>


  <section id="cover">
        <div class="header-image" style="background: <?php echo $aza_hero_background?>;">
            <div class="container">
                <div class="row heading-row">
                    <div class="col-md-12 text-center cover-text">
                        <?php
if(!empty($aza_main_header)){
        echo "<h1>".$aza_main_header."</h1>";
    }

if(!empty($aza_secondary_header)){
        echo "<h2>".$aza_secondary_header."</h2>";
    }
                        ?>
                    </div>
                </div>

                <div class="row btn-row">
                   <div class="col-lg-12 text-center">
               <?php
                 switch ( $aza_buttons_type ) {
                      case 'store_buttons':
                                if(!empty($aza_appstore_link)) { ?>
                                     <a class="btn btn-stores" href="<?php echo $aza_appstore_link ?>">
                                     <img src=" <?php echo esc_url($aza_appstore) ?>" alt="#">
                                 </a>
                                     <?php }
                                 if(!empty($aza_playstore_link)) { ?>
                                         <a class="btn btn-stores" href="<?php echo $aza_playstore_link ?>">
                                     <img src=" <?php echo esc_url($aza_playstore) ?>" alt="#">
                                 </a>
                                         <?php }
                      break;

                      case 'normal_buttons':
                                if(!empty($aza_button_text_1)) { ?>
                                  <button type="button" onclick="window.location='<?php echo $aza_button_link_1; ?>'" class="btn btn-normal-header" style="background-color: <?php echo $aza_button_color_1; ?>; color: <?php echo $aza_button_text_color_1; ?>;">
                                       <?php echo $aza_button_text_1; ?>
                                   </button>
                               </a>
                                   <?php }
                                 if(!empty($aza_button_text_2)) { ?>
                                    <button type="button" onclick="window.location='<?php echo $aza_button_link_2; ?>'" class="btn btn-normal-header" style="background-color: <?php echo $aza_button_color_2; ?>; color: <?php echo $aza_button_text_color_2; ?>;">
                                         <?php echo $aza_button_text_2; ?>
                                     </button>
                                 </a>
                       <?php } ?>

                       <?php break;

                       case 'disabled_buttons': ?>

                       <?php break; ?>

                     <?php } ?>
                   </div>
               </div>
            </div>
        </div>
</section>
