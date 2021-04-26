<?php

/**
 * Plugin Name:       Kaswara Replacement
 * Plugin URI:        https://angeloakcreative.com/
 * Description:       Replaces lightweight functionality from the Kaswara plugin.
 * Version:           0.1.5
 * Author:            Angel Oak Creative, LLC
 * Author URI:        https://angeloakcreative.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       kaswara-replacement
 */

function kasrep_enqueue() {
    /* Register JavaScript files to create hovers */
    wp_enqueue_script(
        'kasrep_simple_hover_script', 
        plugins_url('js/kasrep_simple_hover.js', __FILE__), 
        array('jquery'),
        '0.1.3',
        'false'
    );

    /* Register CSS file */
    wp_enqueue_style(
        'kasrep_stylesheet',
        plugins_url('css/kasrep_style.css', __FILE__)
    );

}
add_action('wp_enqueue_scripts', 'kasrep_enqueue');


add_shortcode('kasrep_simple_hover', 'kasrep_simple_hover');
function kasrep_simple_hover( $atts, $content, $shortcode_tag ) {
    /* Define attributes array */
    $atts = shortcode_atts( array(
        'image_one_src' => '',
        'image_two_src' => '',
        'href' => '',
        'target_new_page' => '1',
    ), $atts, 'kasrep_simple_hover');

    $img_one_src = esc_url($atts["image_one_src"]);
    $img_two_src = esc_url($atts["image_two_src"]);
    $href = esc_url($atts["href"]);

    /* Define $content conditionally */
    if ($atts["target_new_page"] === '1') {
        $target = '_blank';
        $rel = 'noopener noreferrer';

        $content = "<a href=$href target=$target rel=$rel>";
        $content .= "<img class='kasrep_simple_hover_image_before' src=$img_one_src />";
        $content .= "<img class='kasrep_simple_hover_image_after' src=$img_two_src />";
        $content .="</a>";
    } else {
        $content = "<a href=$href>";
        $content .= "<img class='kasrep_simple_hover_image_before' src=$img_one_src />";
        $content .= "<img class='kasrep_simple_hover_image_after' src=$img_two_src />";
        $content .="</a>";
    }

    return $content;
}

add_shortcode('kasrep_complex_hover', 'kasrep_complex_hover');
function kasrep_complex_hover( $atts, $content, $shortcode_tag ) {
    /* Define attributes array */
    $atts = shortcode_atts( array(
        'image_src' => '',
        'title' => '',
        'opacity' => '',
        'hex' => '',
        'href' => '',
        'target_new_page' => '1',
    ), $atts, 'kasrep_complex_hover');

    $img_src = esc_url($atts["image_src"]);
    $hex = $atts["hex"];
    $opacity = $atts["opacity"];
    $href = esc_url($atts["href"]);

    return $content;
}