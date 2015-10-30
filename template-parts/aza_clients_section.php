
       
<div class="zig-zag-top" <?php echo ( get_theme_mod( 'aza_zigzag_about_top' ) ) ? "" : "style='display:none!important;'" ?>></div>
       

<section class="clients">
        <div class="container">
             <div class="row">
                <div class="col-lg-12 col-centered text-center clients-header">
                    <h1>Clients</h1>
                </div>
            </div>
                <div class="row">

                <div class="client-list text-center">



                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <img class="img-responsive" src="img/adobe.png" alt=""> </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <img class="img-responsive" src="img/squares.png" alt=""> </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <img class="img-responsive" src="img/wordpress.png" alt=""> </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <img src="img/pixelgraft.png" alt=""> </div>

                </div>
            </div>
        </div>
        
         
            <hr class="separator" <?php echo ( get_theme_mod( 'aza_separator_clients_bottom' ) ) ? "" : "style='display:none!important;'" ?>>
        
             <?php
                        if(!empty($button_text))
                        {
                        echo '<div class="col-lg-12 col-centered text-center">';
                        echo '<button type="button" class="btn features-btn">'.esc_html__($button_text).'</button></div>';
                        }
                    ?>  
                </div>

    </section>
    
   
<div class="zig-zag-bottom" <?php echo ( get_theme_mod( 'aza_zigzag_about_bottom' ) ) ? "" : "style='display:none!important;'" ?>></div>