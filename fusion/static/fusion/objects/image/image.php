<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRImage implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'image';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Image',
            'description' => 'Create a new image.',
            'icon' => 'fa fa-photo',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'preview' => '<img src="' . objects_url() . '/image/preview.jpg" alt="Grid" />',
            'scripts-admin' => array(
                'image-admin-script' => objects_url() . 'image/image.admin.js'
            ),
            'keywords' => 'image, bootstrap, call to action, btn',
            'filter' => '*',
            'order' => 14
        );
    }

    /* ===
     * Attributes
     * 
     * @role returns the object attributes
     *       as an array
     * @used to create inputs of chosen type and
     *       generate the object creation form
     * === */

    function attributes() {
        return array(
            'image' => array(
                'title' => 'Image',
                'description' => 'Choose the image to be displayed.',
                'type' => 'image',
                'default' => 'img/default/image.jpg',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'alt' => array(
                'title' => 'Alt Tag',
                'description' => 'Choose what the browser will display if the image is broken.',
                'type' => 'text',
                'default' => '#',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'type' => array(
                'title' => 'Type',
                'description' => 'Choose the type of the image element.',
                'type' => 'radio',
                'default' => 'img-responsive',
                'category' => null,
                'values' => array(
                    'img-default' => 'Default',
                    'img-responsive' => 'Responsive',
                    'img-fullwidth' => 'Fullwidth'
                ),
                'required' => false
            ),
            'appearance' => array(
                'title' => 'Appearance',
                'description' => 'Choose the appearance of the image element.',
                'type' => 'radio',
                'default' => '',
                'category' => null,
                'values' => array(
                    '' => "Default",
                    'img-circle' => "Circle",
                    'img-rounded' => "Rounded",
                    'img-thumbnail' => "Thumbnail"
                ),
                'required' => false
            ),
            'link' => array(
                'title' => 'Link',
                'description' => 'Choose the page which the image will link to.',
                'type' => 'text',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'height' => array(
                'title' => 'Height',
                'description' => 'Choose the default image height.',
                'type' => 'text',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'width' => array(
                'title' => 'Width',
                'description' => 'Choose the default image width.',
                'type' => 'text',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose the entering animation when the image is in view.',
                'type' => 'animation',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the image object. Classes should be separated by a space.',
                'type' => 'text',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            )
        );
    }

    /* ===
     * Create
     * 
     * @role function used to generate
     *       the actual object html
     * 
     * @atts {array}
     * @content {string}
     * 
     * @return {string}
     * 
     * @code snippets
     * Animation
     * ' . ($animation != '' ? ' data-animate="' . $animation . '"' : '') . ' 
     * Icons
     * '<i class="' . $icon . '"></i>'
     * 
     * === */

    function create($atts, $content = null) {
        $atts = webrock_atts_decode($atts);
        extract(shortcode_atts(array(
            'image' => '',
            'alt' => '',
            'type' => '',
            'link' => '',
            'height' => '',
            'width' => '',
            'appearance' => '',
            'animation' => '',
            'classes' => ''
                        ), $atts));

        $html = '';
        $html .= '<div class="img ' . $classes . '">';
        if ($link != '')
            $html .= '<a href="' . $link . '">';
        $html .= '<img ' . ($animation != '' ? 'data-animate="' . $animation . '"' : '') . ' ' . ($height != '' ? 'height="' . $height . '"' : '') . ' ' . ($width != '' ? 'width="' . $width . '"' : '') . ' src="' . $image . '" alt="' . $alt . '" class="' . $type . ' ' . $appearance . '"/>';
        if ($link != '')
            $html .= '</a>';
        $html .= '</div>';

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
    $object = new WRImage();
    $webrock->add_object($object);
}
