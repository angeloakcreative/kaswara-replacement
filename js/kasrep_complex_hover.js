// File version: 0.1.2

jQuery(document).ready(function($) {
    // Hide overlay and top title on Document load
    $('.kasrep_complex_hover_overlay').hide();
    $('.kasrep_complex_hover_title_top').hide();

    // Handle hover event
    $('.kasrep_complex_hover_container').hover(function(e) {
        $(this).toggleClass('kasrep_complex_hover_container_shadow');
        $('.kasrep_complex_hover_overlay').toggle();
        $('.kasrep_complex_hover_title_top').toggle();
    });
});