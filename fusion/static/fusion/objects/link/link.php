<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRLink implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'link';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Link',
            'description' => 'Create a new link.',
            'icon' => 'fa fa-link',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'link-admin-script' => objects_url() . 'link/link.admin.js'
            ),
            'keywords' => 'link, href, anchor, bootstrap',
            'filter' => '*',
            'order' => 15
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
            'link' => array(
                'title' => 'Link Href',
                'description' => 'Choose the anchor link.',
                'type' => 'text',
                'default' => 'http://google.com',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the link object. Classes should be separated by a space.',
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
            'link' => '',
            'classes' => ''
                        ), $atts));

        $html = '';
        $html .= '<a href="' . $link . '" ' . ($classes != '' ? 'class="' . $classes . '"' : '') . ' '
                . '>'
                . webrock_do_shortcode($content)
                . '</a>';

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
    $object = new WRLink();
    $webrock->add_object($object);
}
