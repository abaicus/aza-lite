/*=============================
 =========== JS CHECK  =========
 ===============================*/

jQuery('html').removeClass('no-js');
jQuery('html').addClass('js');

jQuery(document).ready(function ($) {
    windowWidth = $(window).width();
    if (windowWidth >= 768) {
        centerMenu();
    }
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
        var titleTagline = $('.title-tagline-wrapper');
        var container = $('.navbar>.container');

        if ( ( primaryMenu.width() + navbarBrand.width() >= container.width() ) || ( primaryMenu.width() + titleTagline.width() >= container.width() ) ) {
            container.addClass('centered-menu');
        } else {
            container.removeClass('centered-menu');
        }
    }

    $(window).resize(function() {
        if (windowWidth >= 768) {
        if(this.resizeTO) clearTimeout(this.resizeTO);
        this.resizeTO = setTimeout(function() {
            $(this).trigger('resizeEnd');
        }, 100);
    }});
    $(window).bind('resizeEnd', function() {
        centerMenu();
    });

    var stickyNavbar = $('.sticky-navbar');
    if( stickyNavbar.length !== 0 ) {
        var atTop = true;
        $(window).scroll (function () {
            if ($(document).scrollTop() > 200) {
                if (atTop) {
                    atTop = false;
                    $( '.sticky-navbar' ).addClass( 'navbar-small' );
                }
            } else {
                if (!atTop) {
                    atTop= true;
                    $( '.sticky-navbar' ).removeClass( 'navbar-small' );
                }
            }
        });
    }
    /*================================================
     ========= Hide Responsive menu on click =========
     ================================================*/
    $(function () {
        $('.navbar-collapse ul li a:not(.dropdown-toggle)').bind('click', function () {
            $('.navbar-toggle:visible').click();
        });
    });

});




