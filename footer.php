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
$widget1 = 'home_footer_1';
$widget2 = 'home_footer_2';
$widget3 = 'home_footer_3';

 ?>
<div class="row footer-widgets">
  <div class="col-md-4">
    <?php dynamic_sidebar( 'home_footer_1' ); ?>
  </div>
  <div class="col-md-4">
    <?php dynamic_sidebar( 'home_footer_2' ); ?>
  </div>
  <div class="col-md-4">
    <?php dynamic_sidebar( 'home_footer_3' ); ?>
  </div>
</div>
    </footer>
    <!-- #colophon -->
    </div>
    <!-- #page -->
</div>
    <?php wp_footer(); ?>
</div>
        </body>

        </html>
