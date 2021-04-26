<?php

/**
 * Plugin Name:       Kaswara Replacement
 * Plugin URI:        https://angeloakcreative.com/
 * Description:       Replaces lightweight functionality from the Kaswara plugin.
 * Version:           0.1.0
 * Author:            Angel Oak Creative, LLC
 * Author URI:        https://angeloakcreative.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       kaswara-replacement
 */


add_shortcode('kasrep_simple_hover', 'kasrep_simple_hover');
function kasrep_simple_hover( $atts, $content, $shortcode_tag ) {
    /* Define attributes array */
    $atts = shortcode_atts( array(
        image_one_src => '',
        image_two_src => '',
    ), $atts, 'kasrep_simple_hover');

}