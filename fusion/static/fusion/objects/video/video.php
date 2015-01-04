<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRVideo implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'video';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Video Iframe',
            'description' => 'Create a new responsive video iframe.',
            'icon' => 'fa fa-youtube-play',
            'styles' => array(
            ),
            'scripts' => array(
                'fitvids-script' => objects_url() . 'video/video.fitVids.js'
            ),
            'scripts-admin' => array(
                'video-admin-script' => objects_url() . 'video/video.admin.js'
            ),
            'preview' => '<img src="' . objects_url() . '/video/preview.jpg" alt="Video" />',
            'keywords' => 'video, vimeo, youtube, iframe, embedded',
            'filter' => '*',
            'order' => 30
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
            'src' => array(
                'title' => 'Iframe Source',
                'description' => 'Input the iframe src link that is given by youtube or vimeo.',
                'type' => 'text',
                'default' => 'http://www.youtube.com/embed/SALG_JkVenA',
                'category' => 'Iframe',
                'values' => null,
                'required' => false
            ),
            'width' => array(
                'title' => 'Width',
                'description' => 'Input the iframe width based on which the responsiveness will be processed.',
                'type' => 'text',
                'default' => '560',
                'category' => 'Iframe',
                'values' => null,
                'required' => false
            ),
            'height' => array(
                'title' => 'Height',
                'description' => 'Input the iframe height based on which the responsiveness will be processed.',
                'type' => 'text',
                'default' => '315',
                'category' => 'Iframe',
                'values' => null,
                'required' => false
            ),
            'responsive' => array(
                'title' => 'Responsive',
                'description' => 'Input the iframe height based on which the responsiveness will be processed.',
                'type' => 'radio',
                'default' => 'true',
                'category' => 'Design',
                'values' => array(
                    'false' => 'Disabled',
                    'true' => 'Enabled'
                ),
                'required' => false
            ),
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose an animation for the object.',
                'type' => 'animation',
                'default' => null,
                'category' => 'Design',
                'values' => null,
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the textarea object. Classes should be separated by a space.',
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
            'src' => '',
            'width' => '',
            'height' => '',
            'animation' => '',
            'classes' => ''
                        ), $atts));
        $html = '';
        $html .= '<div class="webrock-video ' . $classes . ' ' . ($responsive == 'true' ? 'responsive-video' : '') . '"'
                . ' '
                . ($animation != '' ? 'data-animate="' . $animation . '"' : '')
                . '>';
        $html .= '<iframe width="' . $width . '" height="' . $height . '" src="' . $src . '" frameborder="0" allowfullscreen></iframe>';
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
    $object = new WRVideo();
    $webrock->add_object($object);
}
