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
$aza_hero_background = get_theme_mod('aza_hero_background', 'rgba(0, 0, 0, 0.5)');
$aza_buttons_type = get_theme_mod ('aza_header_buttons_type','normal_buttons');
    ?>


  <section id="cover">
        <div class="header-image" style="background: <?php echo $aza_hero_background?>;">
            <div class="container">
                <div class="row">
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
                   <div class="col-lg-12 text-center">'
               <?php
                 switch ( $aza_buttons_type ) {
                      case 'store_buttons':
                                if(!empty($aza_appstore_link)) { ?>
                                     <a class="btn btn-primary btn-stores" href="<?php echo $aza_appstore_link ?>">
                                     <img src=" <?php echo esc_url($aza_appstore) ?>" alt="#">
                                 </a>
                                     <?php }
                                 if(!empty($aza_playstore_link)) { ?>
                                         <a class="btn btn-primary btn-stores" href="<?php echo $aza_playstore_link ?>">
                                     <img src=" <?php echo esc_url($aza_playstore) ?>" alt="#">
                                 </a>
                                         <?php }
                      break;

                      case 'normal_buttons': ?>

                       <?php break;

                       case 'disabled_buttons': ?>

                       <?php break; ?>

                     <?php } ?>
                   </div>
               </div>
            </div>
        </div>
</section>
