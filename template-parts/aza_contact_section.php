<!-- =========================
PIRATE FORMS
============================== -->
<?php
$frontpage_contact_shortcode = get_theme_mod('frontpage_contact_shortcode');
$background_color = get_theme_mod('aza_contact_background','rgba(0, 0, 0, 0.75)');
$heading = get_theme_mod('aza_contact_title', 'Contact');
$subheading = get_theme_mod('aza_contact_subtitle', 'Message us');
?>



<section id="contact" style="background: <?php echo $background_color ?> ">


<div class="container">
                <div class="row">
                    <div class="col-lg-12 col-centered text-center">
                        <?php
                    if(!empty($heading)) {
                        echo '<h1>'.$heading.'</h1>';
                    }?>
                     <?php echo ( get_theme_mod( 'aza_separator_contact_top' ) ) ? "<hr class='separator'/>" : "" ?>
                     <?php
                                if(!empty($subheading)) {
                                echo '<p class = "team-p">'.$subheading.'</p>';
                        }?>
                    </div>
                </div>
<?php
 if( !empty($frontpage_contact_shortcode) ){
?>
                <?php echo do_shortcode($frontpage_contact_shortcode);?>

        <!-- .container-fluid -->
<?php
     }
?>
</section>
