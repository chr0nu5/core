<?php

/* =============================================
 * Row
 *
 * @type WebRock Object
 * ============================================= */

class WRTextbox implements WebRockObject
{
    /* ===
     * Shortcode
     *
     * @role main object identifier
     * === */

    public $shortcode = 'textbox';

    /* ===
     * Config
     *
     * @role returns the object config
     *       as an array
     * === */

    function config()
    {
        return array(
            'title' => 'Text Box',
            'description' => 'Create a new textbox from WYSIWYG editor.',
            'icon' => 'fa fa-font',
            'preview' => '<div class="margin-top-1x"></div><h2>Text Box</h2><p class="text-xs">Lorem ipsum dolor sit amet, consectetur adipisicing <strong>elit</strong>.</p>',
            'styles' => array(),
            'scripts' => array(),
            'scripts-admin' => array(
                'textbox-admin-script' => objects_url() . 'textbox/textbox.admin.js'
            ),
            'keywords' => 'textbox, text, textarea, font, heading',
            'filter' => '*',
            'order' => 13.2
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

    function attributes()
    {
        return array(
            'text' => array(
                'title' => 'Text',
                'description' => 'Input the content of the textbox.',
                'type' => 'wysiwyg',
                'default' => 'Create amazing websites using the most awesome page builder framework. <strong>Rock the web!</strong>',
                'category' => 'Text',
                'values' => null,
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the textbox object. Classes should be separated by a space.',
                'type' => 'text',
                'default' => '',
                'category' => 'Text',
                'values' => null,
                'required' => false
            ),
            'color' => array(
                'title' => 'Text Color',
                'description' => 'Choose a color for the text of the textbox.',
                'type' => 'colorpicker',
                'default' => '#000000',
                'category' => 'Text',
                'values' => null,
                'required' => false
            ),
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose the entering animation when the textbox is in view.',
                'type' => 'animation',
                'default' => '',
                'category' => 'Text',
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

    function create($atts, $content = null)
    {
        $atts = webrock_atts_decode($atts);
        extract(webrock_atts($this->attributes(), $atts));

        $colorClass = '';
        if ($color == '#000000') {
            $color = '';
            $colorClass = 'text-gray-dark';
        } else if ($color == '#ffffff') {
            $color = '';
            $colorClass = 'text-white';
        } else if ($color == '#897f79') {
            $color = '';
            $colorClass = 'text-muted';
        } else if ($color == '#90360a') {
            $color = '';
            $colorClass = 'text-primary';
        }


        $html = '';
        $html .= '<div ' . ($animation != '' ? 'data-animate="' . $animation . '"' : '') . ' class="textbox ' . $colorClass . ' ' . $classes . '" ' . ($color != '' ? 'style="color:' . $color . '"' : '') . '>'
            . html_entity_decode($text)
            . '</div>';

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
    $object = new WRTextbox();
    $webrock->add_object($object);
}

