<?php 

$testimonial = get_theme_mod ('aza_testimonials', json_encode(
     array(
                array(
                    'image_url' =>  aza_get_file('/images/testimonials-pic1.png'),
                    'title' => 'John Fox' ,
                    'text' => 'Everything is organized on layers that can be changed individually. Fully responsive and massively beautiful.'),
                
                array(
                    'image_url' =>  aza_get_file('/images/testimonials-pic2.png'),
                    'title' => 'Parr Otte' ,
                    'text' => 'Everything is organized on layers that can be changed individually. Fully responsive and massively beautiful.'),
                
                array(
                    'image_url' =>  aza_get_file('/images/testimonials-pic3.png'),
                    'title' => 'Gee Raff' ,
                    'text' => 'Everything is organized on layers that can be changed individually. Fully responsive and massively beautiful.'),
     
     )
));
   

$testimonial_decoded = json_decode($testimonial); 

$var=0;
?>

    <section class="testimonials">
        <div class="testimonials-background">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Testimonials</h1>
                    </div>
                </div>
            </div>



            <div id="carousel" class="carousel slide" data-interval="10000" data-ride="carousel">
                <!-- Carousel indicators -->

                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <?php 
if(!empty($testimonial)){
    $testimonial_decoded = json_decode($testimonial);
    if(!empty($testimonial_decoded)) {
foreach($testimonial_decoded as $testimonial) {
    echo '<div class = "item'; 
    if($var == 0) {
        echo 'active-item">';
    } else {
        echo '">';
    }
    
    echo '
    <div class = "container"> 
    <div class = "row">
    <div class = "col-md-12 col-sm-12 col-xs-12 col-centered">
    <img class = "center-block testimonials-pic" src="'.esc_url($testimonial->image_url).'" alt="#"/>';
    echo '<p class = "center-block">'.esc_html($testimonial->text).'</p>
    <h4 class = signature>'.esc_html($testimonial->title).'</h4></div></div></div></div>';
 ?>
               
<!--
                <div class="active item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-centered">
                                <img class="center-block testimonials-pic" src="img/testimonials-pic3.png" alt="#">
                                <p class="center-block">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
                                <h4 class="signature">Parr Otte</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-centered">
                                <img class="center-block testimonials-pic" src="img/testimonials-pic2.png" alt="#">

                                <p class="center-block">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
                                <h4 class="signature">Gee Raff</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-centered">
                                <img class="center-block testimonials-pic" src="img/testimonials-pic.png" alt="#">
                                <p class="center-block">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
                                <h4 class="signature">John Fox</h4>
                            </div>
                        </div>
                    </div>
                </div>
-->
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-centered center-block">
                        <ol class="carousel-indicators center-block">
                           
                            <?php 
                             
     
        echo '<li data-target="#carousel" data-slide-to="'.$var.'"'; 
         if($var == 0) {
        echo 'class= " active" >';
    } else {
        echo '>';
    }
    
        echo '> </li>';
     $var++;
}}}
                        ?>
<!--
                            <li data-target="#carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel" data-slide-to="1"></li>
                            <li data-target="#carousel" data-slide-to="2"></li>
-->
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Carousel controls -->
            <a class="left carousel-control" href="#carousel" data-slide="prev">
                <span class="icon-arrow-carrot-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel" data-slide="next">
                <span class="icon-arrow-carrot-right"></span>
            </a>
        </div>


    </div>


</section>