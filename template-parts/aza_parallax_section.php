    <section class="parallax">
            <?php 
$parallax_background = get_theme_mod('aza_parallax_background', aza_get_file('/images/parallax-background.png'));

$parallax_layer_1 = get_theme_mod('aza_parallax_layer_1', aza_get_file('/images/parallax-layer1.png')); 

$parallax_layer_2 = get_theme_mod('aza_parallax_layer_2', aza_get_file('/images/parallax-layer2.png')); 

$parallax_image = get_theme_mod('aza_parallax_image', aza_get_file('/images/parallax-image.png')); 
    
        
        ?>
        
    
<!---    
  check if images not empty.
  checkbox- disable parallax.                        
-->
               
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
                        <div class="col-lg-6 col-md-6 col-xs-12-col-sm-12 parallax-features">

                            <ul>
                                <li>
                                    <h3>Multi layered parallax</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.</p>
                                </li>
                                <li>
                                    <h3>Fully customizable</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.</p>
                                </li>
                                <li>
                                    <h3>Eyecandy design</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </section>
