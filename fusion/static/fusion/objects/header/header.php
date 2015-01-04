<?php

/* =============================================
 * Object 
 * 
 * @type WebRock Object
 * ============================================= */

class WRHeader1 implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'header';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Header',
            'description' => 'Create a new WebRock header.',
            'icon' => 'fa fa-archive',
            'preview' => '<img src="' . objects_url() . '/header/preview.jpg" alt="Header" />',
            'styles' => array(
                'header-style' => objects_url() . 'header/header.css'
            ),
            'styles-admin' => array(
                'header-admin-style' => objects_url() . 'header/header.admin.css'
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'header-admin-script' => objects_url() . 'header/header.admin.js'
            ),
            'keywords' => 'header, callout, jumbotron',
            'filter' => '*',
            'order' => 1.1
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
            'size' => array(
                'title' => 'Size',
                'description' => 'Choose the header size. The header will resize itself responsively.',
                'type' => 'radio',
                'default' => 'header-xlg',
                'category' => 'Design',
                'values' => array(
                    'header-xlg' => 'Extralarge',
                    'header-lg' => 'Large',
                    'header-md' => 'Medium',
                    'header-sm' => 'Small',
                    'header-xs' => 'Extrasmall'
                ),
                'required' => false
            ),
            'theme' => array(
                'title' => 'Type',
                'description' => 'Choose the header theme. This will determine the color of the text inside of it.',
                'type' => 'radio',
                'default' => 'header-inverse',
                'category' => 'Design',
                'values' => array(
                    'header-default' => 'Default',
                    'header-inverse' => 'Inverse'
                ),
                'required' => false
            ),
            'background_solid' => array(
                'title' => 'Solid Background',
                'description' => 'Choose a solid color for the header background.',
                'type' => 'colorpicker',
                'default' => '#000000',
                'category' => 'Design',
                'values' => null,
                'required' => false
            ),
            'background_image' => array(
                'title' => 'Image Background',
                'description' => 'Choose an image for the header background.',
                'type' => 'image',
                'default' => 'img/default/header.jpg',
                'category' => 'Design',
                'values' => null,
                'required' => false
            ),
            'background_type' => array(
                'title' => 'Background Type',
                'description' => 'Choose the background type.',
                'type' => 'radio',
                'default' => 'parallax',
                'category' => 'Design',
                'values' => array(
                    'default' => 'Default',
                    'cover' => 'Cover',
                    'fixed' => 'Fixed',
                    'parallax' => 'Parallax'
                ),
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the header object. Classes should be separated by a space.',
                'type' => 'text',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'id' => array(
                'title' => 'Unique ID',
                'description' => 'Choose an unique ID for the header.',
                'type' => 'id',
                'default' => 'header',
                'category' => 'Text',
                'values' => null,
                'required' => true
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
        extract(webrock_atts($this->attributes(), $atts));

        $background_image = html_entity_decode($background_image);
        if ($content == null)
            $content = '<div data-animate="transition.slideDownIn" class="text-center webrock-object" '
                    . 'data-atts="{&quot;text&quot;:&quot;grozav\'s&quot;,&quot;type&quot;:&quot;h1&quot;,&quot;responsive&quot;:&quot;heading-sm&quot;,&quot;font&quot;:&quot;text-heading-stylish&quot;,&quot;style&quot;:&quot;heading&quot;,&quot;classes&quot;:&quot;text-center&quot;,&quot;animation&quot;:&quot;transition.slideDownIn&quot;}" data-shortcode="heading" data-filter="*" data-filter-exclude="*">'
                    . '<h1 class="heading heading-sm heading text-heading-stylish">grozav\'s</h1>'
                    . '</div>'
                    //
                    . '<div data-animate="transition.flipBounceYIn" class="text-center webrock-object" '
                    . 'data-atts="{&quot;text&quot;:&quot;WEBROCK&quot;,&quot;type&quot;:&quot;h1&quot;,&quot;responsive&quot;:&quot;heading-lg&quot;,&quot;font&quot;:&quot;text-heading-bold&quot;,&quot;style&quot;:&quot;&quot;,&quot;classes&quot;:&quot;text-center&quot;,&quot;animation&quot;:&quot;transition.flipBounceYIn&quot;}" data-shortcode="heading" data-filter="*" data-filter-exclude="*">'
                    . '<h1 class="heading heading-lg  text-heading-bold">WEBROCK</h1>'
                    . '</div>'
                    //
                    . '<div data-animate="transition.slideDownIn" class="text-center webrock-object" data-atts="{&quot;text&quot;:&quot;Powered by our exclusive &amp;lt;span class=&amp;quot;text-primary&amp;quot;&amp;gt;Page Builder&amp;lt;/span &amp;gt;&quot;,&quot;type&quot;:&quot;h5&quot;,&quot;responsive&quot;:&quot;&quot;,&quot;font&quot;:&quot;&quot;,&quot;style&quot;:&quot;heading-2&quot;,&quot;classes&quot;:&quot;text-center&quot;,&quot;animation&quot;:&quot;transition.slideDownIn&quot;}" data-shortcode="heading" data-filter="*" data-filter-exclude="*">'
                    . '<h5 class="heading  heading-2 ">Powered by our exclusive <span class="text-primary">Page Builder</span></h5>'
                    . '</div>'
                    //
                    . '<div data-animate="transition.slideUpIn" class="text-center webrock-object" data-atts="{&quot;text&quot;:&quot;- since &amp;lt;i class=&amp;quot;fa fa-star&amp;quot;&amp;gt;&amp;lt;/i&amp;gt; 2014 -&quot;,&quot;type&quot;:&quot;h2&quot;,&quot;responsive&quot;:&quot;&quot;,&quot;font&quot;:&quot;text-heading-stylish&quot;,&quot;style&quot;:&quot;&quot;,&quot;classes&quot;:&quot;text-center&quot;,&quot;animation&quot;:&quot;transition.slideUpIn&quot;}" data-shortcode="heading" data-filter="*" data-filter-exclude="*">'
                    . '<h2 class="heading   text-heading-stylish">- since <i class="fa fa-star"></i> 2014 -</h2>'
                    . '</div>';

        $html = '';
        $html .= '<header class="header ' . $classes . ' ' . $size . ' ' . $theme . ' ' . ($background_type == 'parallax' ? 'parallax' : '') . '" id="' . $id . '">';
        $html .= '<div class="container">';
        $html .= webrock_do_shortcode($content);
        $html .= '</div>'
                . '</header>';

        if ($id != '') {
            $html .= '<style>'
                    . '#' . $id . '{';
            if ($background_image != '') {
                $html .= 'background-image: url(' . $background_image . ');';
                if ($background_type == 'cover' || $background_type == 'parallax') {
                    $html .= '-webkit-background-size: cover;';
                    $html .= '-moz-background-size: cover;';
                    $html .= '-o-background-size: cover;';
                    $html .= 'background-size: cover;';
                    $html .= "filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" . $background_image . "', sizingMethod='scale');";
                    $html .= "-ms-filter: \"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" . $background_image . "', sizingMethod='scale')\";";
                } elseif ($background_type == 'fixed') {
                    $html .= 'background-attachment: fixed;';
                    $html .= '-webkit-background-size: cover;';
                    $html .= '-moz-background-size: cover;';
                    $html .= '-o-background-size: cover;';
                    $html .= 'background-size: cover;';
                    $html .= "filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" . $background_image . "', sizingMethod='scale');";
                    $html .= "-ms-filter: \"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" . $background_image . "', sizingMethod='scale')\";";
                }
            }
            if ($background_solid != '')
                $html .= 'background-color: ' . $background_solid . ';';
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
    $object = new WRHeader1();
    $webrock->add_object($object);
}
