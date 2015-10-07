//Wrapper Dropdown-toggle

//jQuery(document).ready(function () {
//
//    jQuery(function () {
//        jQuery('button.navbar-toggle').click(function () {
//            if (jQuery('#wrapper').css('margin-top') === '0px') {
//                jQuery('#wrapper').animate({
//                    "margin-top": '310px'
//                }, 150);
//            } else {
//                jQuery('#wrapper').animate({
//                    "margin-top": '0px'
//                }, 150);
//            }
//        });
//    });
//});

//jQuery Knobs Percentages Animations

jQuery('.k1').data('start',
    jQuery('.k1').data('value'));

jQuery('.k2').data('start',
    jQuery('.k2').data('value'));

jQuery('.k3').data('start',
    jQuery('.k3').data('value'));

jQuery('.k4').data('start',
    jQuery('.k4').data('value'));



jQuery('.percentages').knob({
    'readOnly': true,
    'thickness': '.25',
    'height': '100',
    'width': '100',
    'dynamicDraw': true,
    'draw': function () {
        $(this.i).val(this.cv + '%');
    }
});

jQuery.when(
    jQuery('.percentages').animate({
        value: 100
    }, {
        duration: 1500,
        easing: 'swing',
        progress: function () {
            $(this).val(Math.round(this.value / 100 * $(this).data('start'))).trigger('change')
        }
    }));

//Anchors

jQuery('.nav a , #footer-end a').click(function () {
    jQuery('html, body').animate({
        scrollTop: jQuery(jQuery(this).attr('href')).offset().top
    }, 500);
    return false;
});

//Smooth-Scroll

jQuery(function () {
    jQuery.scrollSpeed(150, 1000);

});

//Loader


jQuery(document).ready(function () {

    setTimeout(function () {
        jQuery('#wrapper').removeClass('not_ready');
        jQuery('body').addClass('loaded');
        
    }, 1000);
});