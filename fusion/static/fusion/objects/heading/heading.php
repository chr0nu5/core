<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRHeading implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'heading';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Heading',
            'description' => 'Create a stylish page heading.',
            'icon' => 'fa fa-header',
            'preview' => '<div class="margin-top-1x"><h1 class="text-heading-bold text-center heading heading-3">WebRock</h1></div>',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'styles-admin' => array(
                'heading-admin-style' => objects_url() . 'heading/heading.admin.css'
            ),
            'scripts-admin' => array(
                'heading-admin-script' => objects_url() . 'heading/heading.admin.js'
            ),
            'keywords' => 'textbox, text, textarea, font, heading',
            'filter' => '*',
            'order' => 13
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
            'text' => array(
                'title' => 'Text',
                'description' => 'Write the text of the heading object.',
                'type' => 'text',
                'default' => 'WebRock',
                'category' => '',
                'values' => null,
                'required' => false
            ),
            'type' => array(
                'title' => 'Type',
                'description' => 'Choose the heading type.',
                'type' => 'select',
                'default' => 'h1',
                'category' => '',
                'values' => array(
                    'h1' => 'Heading h1',
                    'h2' => 'Heading h2',
                    'h3' => 'Heading h3',
                    'h4' => 'Heading h4',
                    'h5' => 'Heading h5',
                    'h6' => 'Heading h6'
                ),
                'required' => false
            ),
            'responsive' => array(
                'title' => 'Responsive',
                'description' => 'Make your header large and responsive.',
                'type' => 'radio',
                'default' => 'heading-md',
                'category' => '',
                'values' => array(
                    '' => 'Disabled',
                    'heading-sm' => 'Small',
                    'heading-md' => 'Medium',
                    'heading-lg' => 'Large'
                ),
                'required' => false
            ),
            'font' => array(
                'title' => 'Font',
                'description' => 'Choose one of WebRock\'s fonts for your heading.',
                'type' => 'radio',
                'default' => 'text-heading-bold',
                'category' => '',
                'values' => array(
                    '' => 'Default',
                    'text-heading-bold' => 'Retro',
                    'text-pacifico' => 'Vintage'
                ),
                'required' => false
            ),
            'style' => array(
                'title' => 'Style',
                'description' => 'Choose one of WebRock\'s stylish headings to give your page some eye candy.',
                'type' => 'radio',
                'default' => '',
                'category' => '',
                'values' => array(
                    '' => 'Unstyled',
                    'heading-1' => 'Heading 1',
                    'heading-2' => 'Heading 2',
                    'heading-3' => 'Heading 3',
                    'heading-4' => 'Heading 4',
                    'heading-5' => 'Heading 5',
                    'heading-6' => 'Heading 6',
                    'heading-7' => 'Heading 7',
                    'heading-6 heading-7' => 'Heading 8'
                ),
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the heading object. Classes should be separated by a space.',
                'type' => 'text',
                'default' => '',
                'category' => '',
                'values' => null,
                'required' => false
            ),
            'animation' => array(
                'title' => 'Animation',
                'description' => 'Choose the animation to play when the heading is in view.',
                'type' => 'animation',
                'default' => '',
                'category' => '',
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
            'text' => '',
            'classes' => '',
            'color' => '',
            'animation' => ''
                        ), $atts));



        $html = '';
        $html .= '<div ' . ($animation != null ? 'data-animate="' . $animation . '"' : '') . ' class="' . $classes . '">'
                . '<' . $type . ' class="heading ' . $responsive . ' ' . $style . ' ' . $font . '">'
                . html_entity_decode($text)
                . '</' . $type . '>'
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
    $object = new WRHeading();
    $webrock->add_object($object);
}
