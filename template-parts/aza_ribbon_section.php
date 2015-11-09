    <?php 
$text =  get_theme_mod('aza_ribbon_text', 'START USING THIS BEAUTIFUL THEME TODAY');

$button_text = get_theme_mod('aza_ribbon_button_text', "LEARN MORE");
?> 
           
           <section id="ribbon">
            <div class="container">
                <div class="row ribbon-row">
                   <?php 
                    if((empty($button_text))||(empty($text)))     
                    {
                        echo '<div class="col-lg-12 text-center">';
                        if(!empty($button_text)) {
                            echo '<button type="button" class="btn features-btn center-block">'.esc_html($button_text).'</button>';
                        } else if(!empty($text)) {
                            echo '<h2>'.esc_html($text).'</h2>';
                        } echo '</div>';
                    } else {
                        echo '<div class="col-lg-7 col-md-12 col-xs-12 col-sm-12 text-center">
                        <h2>'.esc_html($text).'</h2></div>';
                        echo '<div class="col-lg-5 col-md-12 col-xs-12 col-sm-12">
                        <button type="button" class="btn features-btn center-block">'.esc_html($button_text).'</button></div>';
                    }

                    ?>

            
                </div>
            </div>
        </section>