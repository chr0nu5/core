<?php

/* =============================================
 * Animation Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRAnimationInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'animation';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'animation-script' => inputs_url() . 'animation/animation.js',
            )
        );
    }

    /* ===
     * Generate
     * 
     * @role function used to generate
     *       the actual object html
     * 
     * @atts {array}
     * @content {string}
     * 
     * @return {string}
     * === */

    function create($name, $values = null, $default = null) {
        $html = '<select '
                . 'class="form-control" '
                . 'name="' . $name . '" '
                . '>';

        $html .= '<option value="" selected>None</option>
    <option value="callout.bounce">bounce</option>
    <option value="callout.shake">shake</option>
    <option value="callout.flash">flash</option>
    <option value="callout.pulse">pulse</option>
    <option value="callout.swing">swing</option>
    <option value="callout.tada">tada</option>
    <option value="transition.fadeIn">fadeIn</option>
    <option value="transition.fadeOut">fadeOut</option>
    <option value="transition.flipXIn">flipXIn</option>
    <option value="transition.flipXOut">flipXOut</option>
    <option value="transition.flipYIn">flipYIn</option>
    <option value="transition.flipYOut">flipYOut</option>
    <option value="transition.flipBounceXIn">flipBounceXIn</option>
    <option value="transition.flipBounceXOut">flipBounceXOut</option>
    <option value="transition.flipBounceYIn">flipBounceYIn</option>
    <option value="transition.flipBounceYOut">flipBounceYOut</option>
    <option value="transition.swoopIn">swoopIn</option>
    <option value="transition.swoopOut">swoopOut</option>
    <option value="transition.whirlIn">whirlIn</option>
    <option value="transition.whirlOut">whirlOut</option>
    <option value="transition.shrinkIn">shrinkIn</option>
    <option value="transition.shrinkOut">shrinkOut</option>
    <option value="transition.expandIn">expandIn</option>
    <option value="transition.expandOut">expandOut</option>
    <option value="transition.bounceIn">bounceIn</option>
    <option value="transition.bounceOut">bounceOut</option>
    <option value="transition.bounceUpIn">bounceUpIn</option>
    <option value="transition.bounceUpOut">bounceUpOut</option>
    <option value="transition.bounceDownIn">bounceDownIn</option>
    <option value="transition.bounceDownOut">bounceDownOut</option>
    <option value="transition.bounceLeftIn">bounceLeftIn</option>
    <option value="transition.bounceLeftOut">bounceLeftOut</option>
    <option value="transition.bounceRightIn">bounceRightIn</option>
    <option value="transition.bounceRightOut">bounceRightOut</option>
    <option value="transition.slideUpIn">slideUpIn</option>
    <option value="transition.slideUpOut">slideUpOut</option>
    <option value="transition.slideDownIn">slideDownIn</option>
    <option value="transition.slideDownOut">slideDownOut</option>
    <option value="transition.slideLeftIn">slideLeftIn</option>
    <option value="transition.slideLeftOut">slideLeftOut</option>
    <option value="transition.slideRightIn">slideRightIn</option>
    <option value="transition.slideRightOut">slideRightOut</option>
    <option value="transition.slideUpBigIn">slideUpBigIn</option>
    <option value="transition.slideUpBigOut">slideUpBigOut</option>
    <option value="transition.slideDownBigIn">slideDownBigIn</option>
    <option value="transition.slideDownBigOut">slideDownBigOut</option>
    <option value="transition.slideLeftBigIn">slideLeftBigIn</option>
    <option value="transition.slideLeftBigOut">slideLeftBigOut</option>
    <option value="transition.slideRightBigIn">slideRightBigIn</option>
    <option value="transition.slideRightBigOut">slideRightBigOut</option>
    <option value="transition.perspectiveUpIn">perspectiveUpIn</option>
    <option value="transition.perspectiveUpOut">perspectiveUpOut</option>
    <option value="transition.perspectiveDownIn">perspectiveDownIn</option>
    <option value="transition.perspectiveDownOut">perspectiveDownOut</option>
    <option value="transition.perspectiveLeftIn">perspectiveLeftIn</option>
    <option value="transition.perspectiveLeftOut">perspectiveLeftOut</option>
    <option value="transition.perspectiveRightIn">perspectiveRightIn</option>
    <option value="transition.perspectiveRightOut">perspectiveRightOut</option>';

        $html .= '</select>';
        return $html;
    }

}

/* =============================================
 * Add to WebRock 
 * 
 * @role adds the object config and shortcode to
 *       the WebRock framework
 * ============================================= */
if (defined('WEBROCK')) {
    $input = new WRAnimationInput();
    $webrock->add_input($input);
}
