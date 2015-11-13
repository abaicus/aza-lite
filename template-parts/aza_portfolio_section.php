<!-- =========================
PORTFOLIO SECTION
============================== -->


<?php 


$portfolio_item = get_theme_mod ('aza_portfolio', json_encode(
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
            ) ) ) ;
         
         
         
$portfolio_item_decoded = json_decode($portfolio_item);



$title =  get_theme_mod('aza_portfolio_title', 'PORTFOLIO SECTION');

$subtitle = get_theme_mod('aza_portfolio_subtitle', "Showcase your own work. Be it photography, graphic design or any other form of visual art, 
you can showcase it in AZA Theme's portfolio grid.");

$button_text = get_theme_mod('aza_portfolio_button_text', 'Other Works')
?> 
           
             <div class="zig-zag-top" <?php echo ( get_theme_mod( 'aza_zigzag_portfolio_top' ) ) ? "" : "style='display:none!important;'" ?>></div>
             
           <section id="portfolio">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12 col-centered">
                        <?php
                        if(!empty($title)) {
                            echo '<h1>'.esc_html__($title).'</h1>';
                        }   ?></div>
                         <hr class="separator " <?php echo ( get_theme_mod( 'aza_separator_portfolio_top' ) ) ? ">" : "style='display:none!important;'>" ?>  
                        
                        <?php
                        if(!empty($subtitle)) {
                            echo '<p>'.esc_html__($subtitle).'</p>';
                        }

                        ?>
                    </div>
                    
                    </div>
             
           

            <div class="container">
                <div class="row portfolio-content">
                   
                   <?php
                   
if(!empty($portfolio_item)) { 
    $portfolio_item_decoded = json_decode($portfolio_item); 
    if(!empty($portfolio_item_decoded)) { 
        foreach($portfolio_item_decoded as $portfolio_item) { 

            
                echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-10 text-center porftolio-collumns">
                <a href = "'.esc_url ($portfolio_item -> link).'">
                <div class= "portfolio-item" style = "background-image: url('.esc_url( $portfolio_item -> image_url ).')">
                <div class= "portfolio-img-overlay">
                <h3>'.esc_html__( $portfolio_item -> title ) .'</h3>
                <p>'.esc_html__( $portfolio_item -> subtitle ).'</p>        
                </div> </div> </a> </div>';
        }}}
                    ?>
                    
                </div>
               </div>

                    


                <div class="container">
                    <div class="row text-center">
                       <hr class="separator" <?php echo ( get_theme_mod( 'aza_separator_portfolio_bottom' ) ) ? "" : "style='display:none!important;'" ?>
                    <?php
                        if(!empty($button_text))
                        {
                        echo '<div class="container text-center"';
                        echo '<div class="col-lg-12 col-centered">';
                        echo '<button type="button" class="btn features-btn">'.esc_html__($button_text).'</button></div></div>';
                        }
                    ?>  
                    
                </div>
                </div>
        </section>
        
         <div class="zig-zag-bottom" <?php echo ( get_theme_mod( 'aza_zigzag_portfolio_bottom' ) ) ? "" : "style='display:none!important;'" ?>></div>