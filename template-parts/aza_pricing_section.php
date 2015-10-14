
    
<?php
    $aza_shortcodes_settings = get_theme_mod('aza_shortcodes_settings');

    $aza_shortcodes_settings_decoded = json_decode($aza_shortcodes_settings);
    
    if(!empty($aza_shortcodes_settings_decoded)){
        foreach($aza_shortcodes_settings_decoded as $scd_section){
           ?>
            <section class="pricing">
                <div class="row">
                    <?php if(!empty($scd_section->title)){?>
                    <div class="col-lg-12 col-centered text-center">
                        <h1><?php echo $scd_section->title; ?></h1>
                    </div>
                    <?php } ?>
                    <?php if(!empty( $scd_section->subtitle )){ ?>
                        <div class="col-lg-12 col-centered text-center">
                            <p><?php echo $scd_section->subtitle; ?></p>
                        </div>
                    <?php } ?>    
                </div>    
                
                
                <?php
                    $scd = htmlspecialchars_decode ($scd_section->shortcode , ENT_QUOTES);
                    echo do_shortcode ( $scd ); ?>
            </section>
            <?php
            
        }
    }
?>