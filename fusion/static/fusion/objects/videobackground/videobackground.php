<?php

/* =============================================
 * Object 
 * 
 * @type WebRock Object
 * ============================================= */

class WRVideoBackground implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'videobackground';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Video Background',
            'description' => 'Create a new video background with different display styles.',
            'icon' => 'fa fa-file-video-o',
            'styles' => array(
                'videobackground-style' => objects_url() . 'videobackground/videobackground.css'
            ),
            'scripts' => array(
                'videobackground-script' => objects_url() . 'videobackground/videobackground.js'
            ),
            'scripts-admin' => array(
                'videobackground-admin-script' => objects_url() . 'videobackground/videobackground.admin.js'
            ),
            'preview' => '<img src="' . objects_url() . '/videobackground/preview.jpg" alt="Video Background" />',
            'keywords' => 'video, background, callout, bg',
            'filter' => '*',
            'order' => 10.2
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
            'backgroundimage' => array(
                'title' => 'Image Format',
                'description' => 'Choose a background image to display in case video is not supported.',
                'type' => 'image',
                'default' => 'img/default/videobackground.jpg',
                'category' => 'Image',
                'values' => null,
                'required' => false
            ),
            'mp4' => array(
                'title' => 'MP4 Format',
                'description' => 'Input the path to the MP4 Video file.',
                'type' => 'text',
                'default' => 'img/default/defaultvideo.mp4',
                'category' => 'Video',
                'values' => null,
                'required' => false
            ),
            'ogv' => array(
                'title' => 'OGV Format',
                'description' => 'Input the path to the OGV Video file.',
                'type' => 'text',
                'default' => 'img/default/defaultvideo.ogv',
                'category' => 'Video',
                'values' => null,
                'required' => false
            ),
            'webm' => array(
                'title' => 'WEBM Format',
                'description' => 'Input the path to the WEBM Video file.',
                'type' => 'text',
                'default' => 'img/default/defaultvideo.webm',
                'category' => 'Video',
                'values' => null,
                'required' => false
            ),
            'margin' => array(
                'title' => 'Margin',
                'description' => 'Choose the css margin of the object. See <a href="http://www.w3schools.com/css/box-model.gif" target="_blank">here</a> how margin and padding works.',
                'type' => 'margin',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'padding' => array(
                'title' => 'Padding',
                'description' => 'Choose the css padding of the object. See <a href="http://www.w3schools.com/css/box-model.gif" target="_blank">here</a> how margin and padding works.',
                'type' => 'padding',
                'default' => '100px 0px 100px 0px',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'id' => array(
                'title' => 'Unique ID',
                'description' => 'Choose an unique ID for the header.',
                'type' => 'id',
                'default' => 'videobackground',
                'category' => 'Configuration',
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
            'mp4' => '',
            'ogv' => '',
            'webm' => '',
            'jpg' => '',
            'padding' => '',
            'margin' => '',
            'classes' => ''
                        ), $atts));
        $html = '';

        $default = '<div class="container  webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;}" data-shortcode="container" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="row  webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="col   col-md-12   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;&quot;,&quot;md&quot;:&quot;col-md-12&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="textbox  webrock-object" style="color:#ecf0f1" data-atts="{&quot;text&quot;:&quot;&amp;lt;h1 style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;strong&amp;gt;VIDEO&amp;lt;&amp;#x2F;strong&amp;gt; BACKGROUND&amp;lt;&amp;#x2F;h1&amp;gt;\n&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;PRESS PREVIEW TO SEE&amp;lt;&amp;#x2F;p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#ecf0f1&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><h1 style="text-align: center;"><strong>VIDEO</strong> BACKGROUND</h1>
<p style="text-align: center;">PRESS PREVIEW TO SEE</p></div></div></div></div></div></div></div>';
        $content = $content == null ? $default : $content;

        $html .= '<div class="video-bg ' . $classes . ' clearfix"';
        if ($mp4 != '')
            $html .= ' data-video-mp4="' . $mp4 . '"';
        if ($ogv != '')
            $html .= ' data-video-ogv="' . $ogv . '"';
        if ($webm != '')
            $html .= ' data-video-webm="' . $webm . '"';
        if ($jpg != '')
            $html .= ' data-video-jpg="' . $jpg . '"';
        $html .= ' ' . ($margin != '' || $padding != '' ? 'style="'
                        . ($margin != '' ? 'margin: ' . $margin . ';' : '' )
                        . ($padding != '' ? ' padding: ' . $padding . ';' : '' )
                        . '"' : '')
                . '>';

        $html .= webrock_do_shortcode($content);

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
    $object = new WRVideoBackground();
    $webrock->add_object($object);
}
