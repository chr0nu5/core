<?php

/* =============================================
 * Object 
 * 
 * @type WebRock Object
 * ============================================= */

class WRSolidBackground implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'solidbackground';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Solid Background',
            'description' => 'Create a new solid background with different display styles.',
            'icon' => 'fa fa-file-photo-o',
            'scripts-admin' => array(
                'solidbackground-admin-script' => objects_url() . 'solidbackground/imagebackground.admin.js'
            ),
            'preview' => '<img src="' . objects_url() . '/solidbackground/preview.jpg" alt="Image Background" />',
            'keywords' => 'solid, background, callout, bg',
            'filter' => '*',
            'order' => 10.5
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
            'backgroundclass' => array(
                'title' => 'Background Type',
                'description' => 'Choose the background type.',
                'type' => 'radio',
                'default' => 'bg-gray-dark',
                'category' => 'Design',
                'values' => array(
                    'bg-white' => 'White',
                    'bg-gray-darker' => 'Gray Darker',
                    'bg-gray-dark' => 'Gray Dark',
                    'bg-gray' => 'Gray',
                    'bg-gray-light' => 'Gray Light',
                    'bg-gray-lighter' => 'Gray Lighter',
                    'bg-primary' => 'Primary',
                    'bg-info' => 'Info',
                    'bg-warning' => 'Warning',
                    'bg-success' => 'Success',
                    'bg-danger' => 'Danger',
                    'colorpicker' => 'Colorpicker'
                ),
                'required' => false
            ),
            'backgroundsolid' => array(
                'title' => 'Solid Background',
                'description' => 'Choose the <strong>colorpicker</strong> option above to activate this feature.',
                'type' => 'colorpicker',
                'default' => '#000000',
                'category' => 'Design',
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
        extract(webrock_atts($this->attributes(), $atts));


        $html = '';

        $default = '<div class="container  webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;}" data-shortcode="container" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="row margin-top-3x margin-bottom-3x webrock-object ui-sortable" data-atts="{&quot;margin&quot;:&quot;&quot;,&quot;padding&quot;:&quot;&quot;,&quot;classes&quot;:&quot;margin-top-3x margin-bottom-3x&quot;}" data-shortcode="row" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="col   col-md-12   webrock-object ui-sortable" data-atts="{&quot;xs&quot;:&quot;&quot;,&quot;sm&quot;:&quot;&quot;,&quot;md&quot;:&quot;col-md-12&quot;,&quot;lg&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="column" data-filter="*" data-filter-exclude="*"><div class="webrock-content"><div class="textbox  webrock-object" style="color:#ecf0f1" data-atts="{&quot;text&quot;:&quot;&amp;lt;h1 style=&amp;quot;text-align: center;&amp;quot;&amp;gt;&amp;lt;strong&amp;gt;SOLID&amp;lt;&amp;#x2F;strong&amp;gt;&amp;amp;nbsp;BACKGROUND&amp;lt;&amp;#x2F;h1&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#ecf0f1&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><h1 style="text-align: center;"><strong>SOLID</strong>&nbsp;BACKGROUND</h1></div></div></div></div></div></div></div>';
        $content = $content == null ? $default : $content;

        $html .= '<div class="solidbackground '.$backgroundclass.' ' . $classes . '" id="' . $id . '" '
                . ($margin != '' || $padding != '' ? 'style="'
                        . ($margin != '' ? 'margin: ' . $margin . ';' : '' )
                        . ($padding != '' ? ' padding: ' . $padding . ';' : '' )
                        . '"' : '')
                . '>';

        $html .= webrock_do_shortcode($content);

        $html .= '</div>';

        if ($id != '' && $backgroundclass == 'colorpicker') {
            $html .= '<style>'
                    . '#' . $id . '{';
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
    $object = new WRSolidBackground();
    $webrock->add_object($object);
}
