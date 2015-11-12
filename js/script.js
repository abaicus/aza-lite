/*=============================
========= MAP OVERLAY =========
===============================*/

//jQuery(document).ready(function(){
   jQuery('.map_overlay').click(function(){
       jQuery(this).hide();
   });
    

//});

//
//jQuery(document).ready(function(){
//    jQuery('html').click(function(event) {
//        jQuery('.map_overlay').show();
//    });
//    
//    jQuery('#container-fluid').click(function(event){
//        event.stopPropagation();
//    });
//    
//    jQuery('.map_overlay').on('click',function(event){
//        jQuery(this).hide();
//    })
//});

/*=============================
========= KNOBS VALUES ========
===============================*/

jQuery('.percentages').knob({
    'readOnly': true,
    'thickness': '.25',
    'height': '100',
    'width': '100',
    'dynamicDraw': true,
    'draw': function () {
        jQuery(this.i).val(this.cv + '%');
    },
    
});


//Loader


jQuery(document).ready(function () {

    setTimeout(function () {
        jQuery('#wrapper').removeClass('not_ready');
        jQuery('body').addClass('loaded');
        
    }, 1000);
});