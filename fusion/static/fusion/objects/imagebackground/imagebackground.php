<?php

/* =============================================
 * Object 
 * 
 * @type WebRock Object
 * ============================================= */

class WRImageBackground implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'imagebackground';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Image Background',
            'description' => 'Create a new image or solid background with different display styles.',
            'icon' => 'fa fa-file-photo-o',
            'scripts-admin' => array(
                'imagebackground-admin-script' => objects_url() . 'imagebackground/imagebackground.admin.js'
            ),
            'preview' => '<img src="' . objects_url() . '/imagebackground/preview.jpg" alt="Image Background" />',
            'keywords' => 'image, background, callout, bg',
            'filter' => '*',
            'order' => 10.1
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
            'backgroundsolid' => array(
                'title' => 'Solid Background',
                'description' => 'Choose a solid color for the header background.',
                'type' => 'colorpicker',
                'default' => '#000000',
                'category' => 'Design',
                'values' => null,
                'required' => false
            ),
            'backgroundimage' => array(
                'title' => 'Image Background',
                'description' => 'Choose an image for the header background.',
                'type' => 'image',
                'default' => 'img/default/imagebackground.jpg',
                'category' => 'Design',
                'values' => null,
                'required' => false
            ),
            'backgroundtype' => array(
                'title' => 'Background Type',
                'description' => 'Choose the background type.',
                'type' => 'radio',
                'default' => 'cover',
                'category' => 'Design',
                'values' => array(
                    'default' => 'Default',
                    'cover' => 'Cover',
                    'parallax' => 'Parallax'
                ),
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
            'id' => array(
                'title' => 'Unique ID',
                'description' => 'Choose an unique ID for the header.',
                'type' => 'id',
                'default' => 'imagebackground',
                'category' => 'Configuration',
                'values' => null,
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the background object. Classes should be separated by a space.',
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
            'id' => '',
            'backgroundsolid' => '',
            'backgroundimage' => '',
            'backgroundtype' => '',
            'padding' => '',
            'margin' => '',
            'classes' => ''
                        ), $atts));


        $html = '';

        $default = '<div class="container  webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;}" data-shortcode="container" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="row margin-top-3x margin-bottom-3x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-3x margin-bottom-3x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="col   col-md-12   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;&quot;,&quot;md&quot;:&quot;col-md-12&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="textbox  webrock-object" style="color:#ecf0f1" data-atts="{&quot;text&quot;:&quot;&amp;lt;h1 style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;strong&amp;gt;IMAGE&amp;lt;&amp;#x2F;strong&amp;gt;&amp;amp;nbsp;BACKGROUND&amp;lt;&amp;#x2F;h1&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#ecf0f1&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><h1 style="text-align: center;"><strong>IMAGE</strong>&nbsp;BACKGROUND</h1></div></div></div></div></div></div></div>';
        $content = $content == null ? $default : $content;

        $html .= '<div class="imagebackground ' . $classes . '" id="' . $id . '" '
                . ($margin != '' || $padding != '' ? 'style="'
                        . ($margin != '' ? 'margin: ' . $margin . ';' : '' )
                        . ($padding != '' ? ' padding: ' . $padding . ';' : '' )
                        . '"' : '')
                . '>';

        $html .= webrock_do_shortcode($content);

        $html .= '</div>';

        if ($id != '') {
            $html .= '<style>'
                    . '#' . $id . '{';

            if ($backgroundimage != '') {
                $html .= 'background-image: url(' . html_entity_decode($backgroundimage) . ');';
                if ($backgroundtype == 'cover') {
                    $html .= '-webkit-background-size: cover;';
                    $html .= '-moz-background-size: cover;';
                    $html .= '-o-background-size: cover;';
                    $html .= 'background-size: cover;';
                    $html .= "filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" . html_entity_decode($backgroundimage) . "', sizingMethod='scale');";
                    $html .= "-ms-filter: \"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" . html_entity_decode($backgroundimage) . "', sizingMethod='scale')\";";
                } elseif ($backgroundtype == 'parallax') {
                    $html .= 'background-attachment: fixed;';
                    $html .= '-webkit-background-size: cover;';
                    $html .= '-moz-background-size: cover;';
                    $html .= '-o-background-size: cover;';
                    $html .= 'background-size: cover;';
                    $html .= "filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" . html_entity_decode($backgroundimage) . "', sizingMethod='scale');";
                    $html .= "-ms-filter: \"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" . html_entity_decode($backgroundimage) . "', sizingMethod='scale')\";";
                }
            }
            if ($backgroundsolid != '')
                $html .= 'background-color: ' . $backgroundsolid . ';';

            $html .= '}'
                    . '</style>';
        }
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
    $object = new WRImageBackground();
    $webrock->add_object($object);
}
