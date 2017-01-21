<!-- =========================
INTERGEO MAPS 
============================== -->

<?php
    $frontpage_map_shortcode = get_theme_mod('frontpage_map_shortcode');
    $frontpage_contact_shortcode = get_theme_mod('frontpage_contact_shortcode');
//var_dump($frontpage_map_shortcode);
//die();
// if( !empty($frontpage_map_shortcode) ){

?>
        <div id="container-fluid"> 
        <div class="map_overlay"></div>
            <div id="cd-google-map">
                <?php echo do_shortcode($frontpage_map_shortcode);?>
            </div>
        </div>
    </div>

        <!-- .container-fluid -->
</section>
<?php   
//     }
?>
