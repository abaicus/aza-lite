<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aza-lite
 */

?>

    </div>
    <!-- #content -->



    <footer id="colophon" class="site-footer" role="contentinfo">

       <div class="container">
        <?php 

//Get Menu Name

$menu_location = 'footer-menu-1';
$menu_locations = get_nav_menu_locations();
$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
$menu_name = (isset($menu_object->name) ? $menu_object->name : '');

echo '<h4>';
echo $menu_name;
echo '</h4>';  ?>
<div class="row">
<div class="col-lg-12 text-center">

<?php
//Menu Call

        wp_nav_menu(array( 'theme_location' => 'footer-menu-1',
                                 'container_class' => 'footer-menu' )); 
?>
</div></div>
         

<?php
    /*          
       
//Get Menu Name

$menu_location = 'footer-menu-2';
$menu_locations = get_nav_menu_locations();
$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
$menu_name = (isset($menu_object->name) ? $menu_object->name : '');



echo '<h4>';
echo $menu_name;
echo '</h4>'; 
?>
<div class="row">
<div class="col-lg-12 text-center">

<?php

//Menu Call

       wp_nav_menu( array('theme_location' => 'footer-menu-2',
                            'container_class' => 'footer-menu' )); ?>
        </div></div></div>



            <div class="site-info">
                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'aza-lite' ) ); ?>">
                    <?php printf( esc_html__( 'Proudly powered by %s', 'aza-lite' ), 'WordPress' ); ?>
                </a>
                <span class="sep"> | </span>
                <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'aza-lite' ), 'aza-lite', '<a href="http://themeisle.com/" rel="designer">Andrei Baicus</a>' ); ?>
            </div>
            <!-- .site-info -->
            */ ?>
    </footer>
    <!-- #colophon -->
    </div>
    <!-- #page -->
</div>
    <?php wp_footer(); ?>
</div>
        </body>

        </html>