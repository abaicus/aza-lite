/*=============================
=========== JS CHECK  =========
===============================*/

        jQuery('html').removeClass('no-js');
        jQuery('html').addClass('js');

/*=============================
======= PRELOADER SCRIPT ======
===============================*/


jQuery(document).ready(function () {

    setTimeout(function () {
        jQuery('body').addClass('loaded');

    }, 1000);
});


/*=============================
========= MAP OVERLAY =========
===============================*/

   jQuery('.map_overlay').click(function(){
       jQuery(this).hide();
   });

jQuery(document).ready(function () {

    var buttons = jQuery('#pirate-forms-contact-submit, .wpcf7-form input.wpcf7-submit');
    if ( buttons !== undefined ) {
        buttons.addClass('btn btn-default');
    }
});
