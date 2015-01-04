<?php

/* =============================================
 * Text Input 
 * 
 * @type WebRock Input
 * ============================================= */

class WRImageInput implements WebRockInput {
    /* ===
     * Type
     * 
     * @role main object identifier
     * === */

    public $type = 'image';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'scripts' => array(
                'image-script-plugin' => inputs_url() . 'image/image.plugin.js',
                'image-script' => inputs_url() . 'image/image.js',
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
        $html = '<input '
                . 'type="text" '
                . 'class="form-control" '
                . 'name="' . $name . '" '
                . 'value="' . ($default != null ? $default : '') . '"'
                . '/>'
                . '<a href="javascript:void(0);" class="webrock-page-button webrock-images-browse">'
                . '<i class="fa fa-folder-open"></i> Browse Images'
                . '</a>'
                . '<input class="webrock-page-button webrock-image-upload"'
                . ' type="file"  accept="image/*" '
                . 'name="files[]" '
                . 'data-target="' . $name . '" '
                . 'data-url="webrock/includes/webrock.upload.php"/>';

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
    $input = new WRImageInput();
    $webrock->add_input($input);
}
