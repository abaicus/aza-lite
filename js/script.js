/*=============================
 =========== JS CHECK  =========
 ===============================*/

jQuery('html').removeClass('no-js');
jQuery('html').addClass('js');

jQuery(document).ready(function ($) {
    centerMenu()
    /*=============================
     ======= PRELOADER SCRIPT ======
     ===============================*/
    setTimeout(function () {
        $('body').addClass('loaded');

    }, 1000);

    /*=============================
     ========= MAP OVERLAY =========
     ===============================*/

    $('.map_overlay').click(function(){
        $(this).hide();
    });

    var buttons = $('#pirate-forms-contact-submit, .wpcf7-form input.wpcf7-submit');
    if ( buttons !== undefined ) {
        buttons.addClass('btn btn-default');
    }

    /*=============================
     ========= Smooth scr =========
     ===============================*/

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

    /*=============================
     ========= Center Menu =========
     ===============================*/
    function centerMenu() {
        var primaryMenu = $('.navbar-nav');
        var navbarBrand = $('.navbar-brand');
        var container = $('.navbar>.container');

        if ( primaryMenu.width() + navbarBrand.width() >= container.width() ) {
            console.log("long menu");
            container.addClass('centered-menu');
        } else {
            container.removeClass('centered-menu');
        }
    }

    $(window).resize(function() {
        if(this.resizeTO) clearTimeout(this.resizeTO);
        this.resizeTO = setTimeout(function() {
            $(this).trigger('resizeEnd');
        }, 500);
    });
    $(window).bind('resizeEnd', function() {
        console.warn("Resize");
        centerMenu();
    });

});


