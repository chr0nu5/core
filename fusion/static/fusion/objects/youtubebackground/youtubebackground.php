<?php

/* =============================================
 * Object 
 * 
 * @type WebRock Object
 * ============================================= */

class WRYoutubeBackground implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'youtubebackground';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'YouTube Background',
            'description' => 'Create a new youtube video background with different display styles.',
            'icon' => 'fa fa-file-video-o',
            'styles' => array(
                'youtubebackground-style' => objects_url() . 'youtubebackground/youtubebackground.css'
            ),
            'scripts' => array(
                'youtubebackground-script' => objects_url() . 'youtubebackground/youtubebackground.js'
            ),
            'scripts-admin' => array(
                'youtubebackground-admin-script' => objects_url() . 'youtubebackground/youtubebackground.admin.js'
            ),
            'preview' => '<img src="' . objects_url() . '/youtubebackground/preview.jpg" alt="Youtube Background" />',
            'keywords' => 'youtube, video, background, callout, bg',
            'filter' => '*',
            'order' => 10.3
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
            'url' => array(
                'title' => 'YouTube Video ID',
                'description' => 'Input the id of the youtube video. For example: https://www.youtube.com/watch?v=<strong>ab0TSkLe-E0</strong>',
                'type' => 'text',
                'default' => 'ab0TSkLe-E0',
                'category' => null,
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
                'default' => '',
                'category' => null,
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
            'url' => '',
            'padding' => '',
            'margin' => '',
            'classes' => ''
                        ), $atts));
        $html = '';

        $default = '<div class="container  webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;}" data-shortcode="container" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="row margin-top-4x margin-bottom-4x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-4x margin-bottom-4x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="col   col-md-12   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;&quot;,&quot;md&quot;:&quot;col-md-12&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="textbox  webrock-object" style="color:#ecf0f1" data-atts="{&quot;text&quot;:&quot;&amp;lt;h1 style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;strong&amp;gt;YOUTUBE&amp;lt;&amp;#x2F;strong&amp;gt; BACKGROUND&amp;lt;&amp;#x2F;h1&amp;gt;\n&amp;lt;p style=&amp;quot;text-align: center;&amp;quot;&amp;gt;PRESS PREVIEW TO SEE&amp;lt;&amp;#x2F;p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#ecf0f1&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><h1 style="text-align: center;"><strong>YOUTUBE</strong> BACKGROUND</h1>
<p style="text-align: center;">PRESS PREVIEW TO SEE</p></div></div></div></div></div></div></div>';
        $content = $content == null ? $default : $content;

        $html .= '<div class="video-bg-youtube ' . $classes . ' clearfix"';
        if ($url != '')
            $html .= ' data-youtube-video="' . $url . '"';
        $html .= ' ' . ($margin != '' || $padding != '' ? 'style="'
                        . ($margin != '' ? 'margin: ' . $margin . ';' : '' )
                        . ($padding != '' ? ' padding: ' . $padding . ';' : '' )
                        . '"' : '')
                . '>';

        $html .= '<div class="tubular-content">'
                . webrock_do_shortcode($content)
                . '</div>';

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
    $object = new WRYoutubeBackground();
    $webrock->add_object($object);
}
