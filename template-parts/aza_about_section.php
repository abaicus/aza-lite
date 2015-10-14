<?php 

$heading = get_theme_mod('aza_about_title', 'ABOUT US');
$subheading = get_theme_mod('aza_about_subheading', 'Let clients know about your company in this section.');
$about_image = get_theme_mod('about_image', aza_get_file('/images/about-photo.png'));

?>

    <div class="zig-zag-top" <?php echo ( get_theme_mod( 'aza_zigzag_about_top' ) ) ? "" : "style='display:none!important;'" ?>></div>

    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-centered text-center">
                    <?php
                    if(!empty($heading)) {
                        echo '<h1>'.esc_html__($heading).'</h1>';    
                    }?>
                    
                         <div class="separator" <?php echo ( get_theme_mod( 'aza_separator_about_top' ) ) ? "" : "style='display:none!important;'" ?>></div>

                        <?php
                                if(!empty($subheading)) {
                                echo '<p>'.esc_html__($subheading).'</p>';    
                        }?>
                </div>
            </div>

            <div class="row about-content">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 ">
                    <ul class="knob-list">


                        <li>

                            <input class="percentages k1" data-start="0" data-value="27" data-fgColor="#f0b57c" data-bgColor="#333333">

                            <div class="knob-descriptions">
                                <h3>iOS Users</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.</p>
                            </div>
                        </li>
                        <li>
                            <input class="percentages k2" data-start="0" data-value="45" data-fgColor="#4bb992" data-bgColor="#333333">

                            <div class="knob-descriptions">
                                <h3>Android Users</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.</p>
                            </div>
                        </li>
                        <li>
                            <input class="percentages k3" data-start="0" data-value="10" data-fgColor="#349ae0" data-bgColor="#333333">

                            <div class="knob-descriptions">
                                <h3>Windows Mobile Users</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.</p>
                            </div>
                        </li>
                        <li>
                            <input class="percentages k4" data-start="0" data-value="18" data-fgColor="#887caf" data-bgColor="#333333">

                            <div class="knob-descriptions">
                                <h3>Desktop Users</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.</p>
                            </div>
                        </li>
                    </ul>
                </div>
           
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 ">

                <?php if(!empty($about_image)) {
                        echo '<img src = " '.esc_url($about_image).'" alt = "#"/>';
                    }?>
                </div>
            </div>

            <div class="separator" <?php echo ( get_theme_mod( 'aza_separator_about_bottom' ) ) ? "" : "style='display:none!important;'" ?>></div>

            <div class="row">
                <div class="col-lg-12 col-centered text-center clients-header">
                    <h1>Clients</h1>
                </div>
            </div>

        </div>
    </section>

    <section id="clients">
        <div class="container">
            <div class="row">

                <div class="client-list">



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

    </section>
    
       <div class="zig-zag-bottom" <?php echo ( get_theme_mod( 'aza_zigzag_about_bottom' ) ) ? "" : "style='display:none!important;'" ?>></div>
