<!-- =========================
PARALLAX SECTION
============================== -->
   


    <?php 
$parallax_background = get_theme_mod('aza_parallax_background', aza_get_file('/images/parallax-background.png'));

$parallax_layer_1 = get_theme_mod('aza_parallax_layer_1', aza_get_file('/images/parallax-layer1.png')); 

$parallax_layer_2 = get_theme_mod('aza_parallax_layer_2', aza_get_file('/images/parallax-layer2.png')); 

$parallax_image = get_theme_mod('aza_parallax_image', aza_get_file('/images/parallax-image.png')); 
    
$parallax_text = get_theme_mod ('aza_parallax_text',json_encode(
            array(
                array(
                    'title' => esc_html__('Our Multi layered parallax is fully customizable and showcases anything you need with an eyecandy design.') ,
                    'text' =>  esc_html__('Everything is organized on layers that can be changed individually. Fully responsive and massively beautiful.')))));

$parallax_text_decoded = json_decode($parallax_text);

        
        ?>


<section id="parallax">
        <div>
            <div class="parallax-background" data-parallax='{"y" : -50}' style=" background-image: url(<?php echo esc_url($parallax_background) ?>)">
            </div>
            <div class="parallax-layer-1" data-parallax='{"y" : 25}' style=" background-image: url(<?php echo esc_url($parallax_layer_1) ?>)">
            </div>
            <div class="parallax-layer-2" data-parallax='{"y" : 100}' style=" background-image: url(<?php echo esc_url($parallax_layer_2) ?>)">
            </div>


            <div class="container parallax-content">
                <div class="row row-parallax">
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">

                        <img class="img-responsive parallax-img" src="
                            <?php echo esc_url($parallax_image) ?>" alt="#">
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 parallax-features">


                        <?php
     if(!empty($parallax_text)){
                           $parallax_text_decoded = json_decode($parallax_text);
                            if(!empty($parallax_text_decoded)) {
                                                            
                                    foreach($parallax_text_decoded as $parallax_text) {
                                echo '<h3>'.esc_html($parallax_text->title).'<h3>
                                <p>'.esc_html($parallax_text->text).'</p>'; }}} ?>              
                                                       </div>
                    </div>
                </div>


            </div>
        </section>