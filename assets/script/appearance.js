(function($) {

    /* From here, we will handle the live preview for the header color only. Not the all pages */
    wp.customize('header_color', function(value){
        value.bind(function(newVal){
            $('header').css('background-color', newVal);
        })
    });
    
})(jQuery);