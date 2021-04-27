<?php

/**
 * Plugin Name:       Kaswara Replacement
 * Plugin URI:        https://angeloakcreative.com/
 * Description:       Replaces lightweight functionality from the Kaswara plugin.
 * Version:           1.0.0
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

    wp_enqueue_script(
        'kasrep_complex_hover_script', 
        plugins_url('js/kasrep_complex_hover.js', __FILE__), 
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
function kasrep_simple_hover( $atts = [], $content, $shortcode_tag ) {
    /* Define attributes array */
    $atts = shortcode_atts( array(
        'image_one_src' => '',
        'image_one_alt' => 'Hover image',
        'image_two_src' => '',
        'image_two_alt' => 'Hover image',
        'href' => '',
        'target_new_page' => '1'
    ), $atts, 'kasrep_simple_hover');

    $img_one_src = esc_url($atts["image_one_src"]);
    $img_one_alt = esc_attr($atts["image_one_alt"]);
    $img_two_src = esc_url($atts["image_two_src"]);
    $img_two_alt = esc_attr($atts["image_two_alt"]);
    $href = esc_url($atts["href"]);

    /* Define $content conditionally */
    if ($atts["target_new_page"] === '1') {
        $target = '_blank';
        $rel = 'noopener noreferrer';

        $content = "<a href='$href' target='$target' rel='$rel'>";
        $content .= "<img class='kasrep_simple_hover_image_before' src='$img_one_src' alt='$img_one_alt' />";
        $content .= "<img class='kasrep_simple_hover_image_after' src='$img_two_src' alt='$img_two_alt' />";
        $content .="</a>";
    } else {
        $content = "<a href='$href'>";
        $content .= "<img class='kasrep_simple_hover_image_before' src='$img_one_src' alt='$img_one_alt' />";
        $content .= "<img class='kasrep_simple_hover_image_after' src='$img_two_src' alt='$img_two_alt' />";
        $content .="</a>";
    }

    return $content;
}

add_shortcode('kasrep_complex_hover', 'kasrep_complex_hover');
function kasrep_complex_hover( $atts, $content, $shortcode_tag ) {
    /* Define attributes array */
    $atts = shortcode_atts( array(
        'image_src' => '',
        'title_top' => '',
        'title_top_color' => '#ffffff',
        'title_bottom' => '',
        'title_bottom_color' => '#c4ab81',
        'title_bottom_subtext' => 'none',
        'title_bottom_subtext_color' => '#777777',
        'hover-opacity' => '0.50',
        'hover-color' => '#000000',
        'bottom_bar_color' => '#ffffff',
        'href' => 'none',
        'target_new_page' => '1',
        'alt' => 'Hover image',
    ), $atts, 'kasrep_complex_hover');

    $img_src = esc_url($atts["image_src"]);
    $title_top = esc_attr($atts["title_top"]);
    $title_top_color = esc_attr($atts["title_top_color"]);
    $title_bottom = esc_attr($atts["title_bottom"]);
    $title_bottom_color = esc_attr($atts["title_bottom_color"]);
    $title_bottom_subtext = '';
    $title_bottom_subtext_color = '';
    $title_bottom_subtext = esc_attr($atts["title_bottom_subtext"]);
    $title_bottom_subtext_color = esc_attr($atts["title_bottom_subtext_color"]);
    $hover_color = esc_attr($atts["hover-color"]);
    $opacity = esc_attr($atts["hover-opacity"]);
    $bottom_bar_color = esc_attr($atts["bottom_bar_color"]);
    $alt = esc_attr($atts["alt"]);
    $href = '';
        if ($atts["href"] === 'none') {
            $href = FALSE;
        } else {
            $href = esc_url($atts["href"]);
        }

    /* Define $content conditionally */
    if ($atts["target_new_page"] === '1' && $title_bottom_subtext !== 'none') {
        $target = '_blank';
        $rel = 'noopener noreferrer';

        $content = "<div class='kasrep_complex_hover_container'>";
        $content .= "<a href='$href' target='$target' rel='$rel'>";
        $content .= "<div class='kasrep_complex_hover_section_top'>";
            $content .= "<img class='kasrep_complex_hover_image' src='$img_src' alt='$alt' />";
            $content .= "<div class='kasrep_complex_hover_overlay' style='background: $hover_color; opacity: $opacity;'></div>";
            $content .= "<div class='kasrep_complex_hover_title_top' style='color: $title_top_color'>$title_top</div>";
        $content .= "</div>";
        $content .= "<div class='kasrep_complex_hover_section_bottom' style='background: $bottom_bar_color;'>";
            $content .= "<div class='kasrep_complex_hover_title_bottom' style='color: $title_bottom_color;'>$title_bottom</div>";
            $content .= "<div class='kasrep_complex_hover_title_bottom_subtext' style='color: $title_bottom_subtext_color;'>$title_bottom_subtext</div>";
        $content .= "</div>";
        $content .= "</a>";
        $content .= "</div>";
    } elseif ($atts["target_new_page"] === '1' && $title_bottom_subtext === 'none') {
        $target = '_blank';
        $rel = 'noopener noreferrer';

        $content = "<div class='kasrep_complex_hover_container'>";
        $content .= "<a href='$href' target='$target' rel='$rel'>";
        $content .= "<div class='kasrep_complex_hover_section_top'>";
            $content .= "<img class='kasrep_complex_hover_image' src='$img_src' alt='$alt' />";
            $content .= "<div class='kasrep_complex_hover_overlay' style='background: $hover_color; opacity: $opacity;'></div>";
            $content .= "<div class='kasrep_complex_hover_title_top' style='color: $title_top_color'>$title_top</div>";
        $content .= "</div>";
        $content .= "<div class='kasrep_complex_hover_section_bottom' style='background: $bottom_bar_color;'>";
            $content .= "<div class='kasrep_complex_hover_title_bottom' style='color: $title_bottom_color;'>$title_bottom</div>";
        $content .= "</div>";
        $content .= "</a>";
        $content .= "</div>";
    } else {
        $content = "<div class='kasrep_complex_hover_container'>";
        $content .= "<a href='$href'>";
        $content .= "<div class='kasrep_complex_hover_section_top'>";
            $content .= "<img class='kasrep_complex_hover_image' src='$img_src' alt='$alt' />";
            $content .= "<div class='kasrep_complex_hover_overlay' style='background: $hover_color; opacity: $opacity;'></div>";
            $content .= "<div class='kasrep_complex_hover_title_top' style='color: $title_top_color;'>$title_top</div>";
        $content .= "</div>";
        $content .= "<div class='kasrep_complex_hover_section_bottom' style='background: $bottom_bar_color;'>";
            $content .= "<div class='kasrep_complex_hover_title_bottom' style='color: $title_bottom_color;'>$title_bottom</div>";
        $content .= "</div>";
        $content .= "</a>";
        $content .= "</div>";
    }

    if (!$href && $title_bottom_subtext === 'none') {
        $content = "<div class='kasrep_complex_hover_container'>";
        $content .= "<div class='kasrep_complex_hover_section_top'>";
            $content .= "<img class='kasrep_complex_hover_image' src='$img_src' alt='$alt' />";
            $content .= "<div class='kasrep_complex_hover_overlay' style='background: $hover_color; opacity: $opacity;'></div>";
            $content .= "<div class='kasrep_complex_hover_title_top' style='color: $title_top_color'>$title_top</div>";
        $content .= "</div>";
        $content .= "<div class='kasrep_complex_hover_section_bottom' style='background: $bottom_bar_color;'>";
            $content .= "<div class='kasrep_complex_hover_title_bottom' style='color: $title_bottom_color;'>$title_bottom</div>";
        $content .= "</div>";
        $content .= "</div>";
    } elseif (!$href && $title_bottom_subtext !== 'none') {
        $content = "<div class='kasrep_complex_hover_container'>";
        $content .= "<div class='kasrep_complex_hover_section_top'>";
            $content .= "<img class='kasrep_complex_hover_image' src='$img_src' alt='$alt' />";
            $content .= "<div class='kasrep_complex_hover_overlay' style='background: $hover_color; opacity: $opacity;'></div>";
            $content .= "<div class='kasrep_complex_hover_title_top' style='color: $title_top_color'>$title_top</div>";
        $content .= "</div>";
        $content .= "<div class='kasrep_complex_hover_section_bottom' style='background: $bottom_bar_color;'>";
            $content .= "<div class='kasrep_complex_hover_title_bottom' style='color: $title_bottom_color;'>$title_bottom</div>";
            $content .= "<div class='kasrep_complex_hover_title_bottom_subtext' style='color: $title_bottom_subtext_color;'>$title_bottom_subtext</div>";
        $content .= "</div>";
        $content .= "</div>";
    }
    
    return $content;
}