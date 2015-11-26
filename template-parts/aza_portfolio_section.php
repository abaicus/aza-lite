<!-- =========================
PORTFOLIO SECTION
============================== -->


<?php

$title =  get_theme_mod('aza_portfolio_title', 'PORTFOLIO SECTION');
$subtitle = get_theme_mod('aza_portfolio_subtitle', "Showcase your own work. Be it photography, graphic design or any other form of visual art,
you can showcase it in AZA Theme's portfolio grid.");

$show_link_to_single = get_theme_mod('portfolio_show_link_to_single',1);


$number_of_portfolio_posts = get_theme_mod('number_of_portfolio_posts',3);

$args = array( 'post_type' => 'portfolio', 'posts_per_page' => $number_of_portfolio_posts );
$loop = new WP_Query( $args );



$button_text = get_theme_mod('aza_portfolio_button_text', 'Other Works')
<<<<<<< HEAD
?> 
           
             <?php echo ( get_theme_mod( 'aza_zigzag_portfolio_top' ) ) ? "<div class='zig-zag-top'></div>" : "" ?>
             
=======
?>

             <?php echo ( get_theme_mod( 'aza_zigzag_portfolio_top' ) ) ? "<div class='zig-zag-top' ></div>" : "" ?>

>>>>>>> blog
<section id="portfolio">
    <div class="container">
        <div class="row text-center">
           <div class="col-lg-12 col-centered">
            <?php
                        if(!empty($title)) {
                            echo '<h1>'.$title.'</h1></div>';
<<<<<<< HEAD
                        }   ?> 
                <?php echo ( get_theme_mod( 'aza_separator_portfolio_top' ) ) ? "<hr class='separator'/>" : "" ?>
=======
                        }   ?>
                <?php echo ( get_theme_mod( 'aza_separator_portfolio_top' ) ) ? "<hr class='separator'>" : "" ?>
>>>>>>> blog

                    <?php
                        if(!empty($subtitle)) {
                            echo '<p>'.$subtitle.'</p>';
                        }

                        ?>
        </div> </div>





       <div class="container">
        <div class="row portfolio-content">
           <?php
            while ( $loop->have_posts() ) {
                $loop->the_post() ;
                $post_id = get_the_ID();
                $term_list = wp_get_post_terms($post_id, 'portfolio_cat', array("fields" => "all"));
                $post_title = get_the_title();
                $post_link = get_the_permalink();
                $thumb = get_the_post_thumbnail();
                    ?>

             <div class="col-lg-4 col-md-6 col-sm-7 col-xs-10 text-center portfolio-collumns">

             <?php echo ( $show_link_to_single ) ? '<a href = "'.esc_url($post_link).'">' : '' ?>
             <?php if (has_post_thumbnail() ): ?>
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'single-post-thumbnail' ); ?>
                <div class= "portfolio-item" style="background-image: url(<?php echo $image[0]; ?>);">
             <?php endif; ?>
                <div class= "portfolio-img-overlay">
                <h3><?php echo $post_title ?></h3>
                </div> </div>

                      <?php echo ( $show_link_to_single ) ? '</a>' : '' ?>


                  </div>
           <?php
            }
            ?>
    </div></div>

                <div class="container">
                    <div class="row text-center">
                        <?php echo ( get_theme_mod( 'aza_separator_portfolio_bottom' ) ) ? "<hr class='separator'/>" : "" ?>
                    <?php
                        if(!empty($button_text))
                        {
                        echo '<div class="container text-center"';
                        echo '<div class="col-lg-12 col-centered">';
                        echo '<button type="button" class="btn features-btn">'.$button_text.'</button></div></div>';
                        }
                    ?>

                </div>
                </div>
        </section>
         <?php echo ( get_theme_mod( 'aza_zigzag_portfolio_bottom' ) ) ? "<div class='zig-zag-bottom'></div>" : "" ?>
