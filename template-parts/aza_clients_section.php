<?php 

$heading = get_theme_mod('aza_clients_title', 'OUR CLIENTS');

$subheading = get_theme_mod('aza_clients_subheading', '');

$clients_content = get_theme_mod ('aza_clients_content',json_encode(
         array(
                array("image_url"     => aza_get_file('/images/adobe.png'), 
                      "link"          => esc_url("#")),
                array("image_url"     => aza_get_file('/images/pixelgraft.png'), 
                      "link"          => esc_url("#")),
                array("image_url"     => aza_get_file('/images/wordpress.png'), 
                      "link"          => esc_url("#")),
                array("image_url"     => aza_get_file('/images/squares.png'), 
                      "link"          => esc_url("#")),
)));

$clients_content_decoded = json_decode($clients_content);

$button_text = get_theme_mod('aza_clients_button_text', 'Become our client')


?>
       
<div class="zig-zag-top" <?php echo ( get_theme_mod( 'aza_zigzag_clients_top' ) ) ? "" : "style='display:none!important;'" ?>></div>
       

<section class="clients">
        <div class="container">
             <div class="row">
                <div class="col-lg-12 col-centered text-center clients-header">
                    <?php
                    if(!empty($heading)) {
                        echo '<h1>'.esc_html__($heading).'</h1>';    
                    }?>
                    <div class="separator" <?php echo ( get_theme_mod( 'aza_separator_clients_top' ) ) ? "" : "style='display:none!important;'" ?>></div>
                     <?php
                                if(!empty($subheading)) {
                                echo '<p>'.esc_html__($subheading).'</p>';    
                        }?>
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