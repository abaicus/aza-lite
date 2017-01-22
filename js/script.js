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

/*=============================
 ========= Smooth scr =========
 ===============================*/
jQuery(document).ready(function ($) {
    $( '.navbar a[href*="#"], a.btn[href*="#"]' ).click(function () {
        var menuitem = $(this).attr( 'class' );
        if (menuitem === 'dropdown-toggle' ) {
            return;
        }
        if (location.pathname.replace(/^\//, '' ) === this.pathname.replace(/^\//, '' ) && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $( '[name=' + this.hash.slice(1) + ']' );
            if (target.length) {
                $( 'html,body' ).animate({
                    scrollTop: target.offset().top
                }, 1200 );
                return false;
            }
        }
    });
});
