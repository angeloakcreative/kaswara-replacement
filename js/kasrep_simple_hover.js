// File version: 0.1.2

jQuery(document).ready(function($) {
    // Hide mouseover class on document load, and show first image on document load
    $('.kasrep_simple_hover_image_before').show();
    $('.kasrep_simple_hover_image_after').hide();

    // On hover of anchor tag of hover images, toggle show and hide on appropriate images
    $('.kasrep_simple_hover_image_before').parent().hover(function(e) {
        $('.kasrep_simple_hover_image_before').toggle();
        $('.kasrep_simple_hover_image_after').toggle();
    });

});