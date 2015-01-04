<?php

/* =============================================
 * Object 
 * 
 * @type WebRock Object
 * ============================================= */

class WRObject implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'object';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'My Object',
            'description' => 'Lorem ipsum dolor sit amet.',
            'icon' => 'fa fa-cogs',
            'styles' => array(
                'object-style' => objects_url() . 'object/object.css'
            ),
            'styles-admin' => array(
                'object-admin-style' => objects_url() . 'object/object.admin.css'
            ),
            'scripts' => array(
                'object-script' => objects_url() . 'object/object.js',
                'object-plugin-name' => objects_url() . 'object/object.plugin.js'
            ),
            'scripts-admin' => array(
                'object-admin-script' => objects_url() . 'object/object.admin.js'
            ),
            'keywords' => 'my object, test, block',
            'filter' => array(
                'values' => 'test',
                'exclude' => 'true'
            ),
            'order' => 50
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
            'id' => array(
                'title' => 'Unique ID',
                'description' => 'Input an unique ID for the object.',
                'type' => 'id',
                'default' => 'object',
                'category' => 'Text',
                'values' => null,
                'required' => true
            ),
            'text' => array(
                'title' => 'Text',
                'description' => 'Input the text of the object.',
                'type' => 'text',
                'default' => 'Default Text',
                'category' => 'Text',
                'values' => null,
                'required' => false
            ),
            'textarea' => array(
                'title' => 'Textarea',
                'description' => 'Input the description of the object.',
                'type' => 'textarea',
                'default' => 'Default Textarea',
                'category' => 'Text',
                'values' => null,
                'required' => false
            ),
            'textrepeater' => array(
                'title' => 'Text Repeater',
                'description' => 'Input multiple values for the object.',
                'type' => 'text-repeater',
                'default' => array(
                    'Text 1',
                    'Text 2',
                    'Text 3'
                ),
                'category' => 'Text',
                'values' => null,
                'required' => false
            ),
            'keyvalue' => array(
                'title' => 'Key Value',
                'description' => 'Input multiple key value pairs for the object.',
                'type' => 'key-value',
                'default' => array(
                    'key1' => 'Value 1',
                    'key2' => 'Value 2',
                    'key3' => 'Value 3'
                ),
                'category' => 'Text',
                'values' => null,
                'required' => false
            ),
            'select' => array(
                'title' => 'Select',
                'description' => 'Select one of the object options.',
                'type' => 'select',
                'default' => 'option2',
                'category' => 'Selection',
                'values' => array(
                    'option1' => 'Option 1',
                    'option2' => 'Option 2',
                    'option3' => 'Option 3'
                ),
                'required' => false
            ),
            'selectmultiple' => array(
                'title' => 'Select Multiple',
                'description' => 'Select one or more of the object options',
                'type' => 'select-multiple',
                'default' => 'option2,option3',
                'category' => 'Selection',
                'values' => array(
                    'option1' => 'Option 1',
                    'option2' => 'Option 2',
                    'option3' => 'Option 3'
                ),
                'required' => false
            ),
            'radio' => array(
                'title' => 'Radio',
                'description' => 'Choose one of the object options.',
                'type' => 'radio',
                'default' => 'option3',
                'category' => 'Selection',
                'values' => array(
                    'option1' => 'Option 1',
                    'option2' => 'Option 2',
                    'option3' => 'Option 3'
                ),
                'required' => false
            ),
            'checkbox' => array(
                'title' => 'Checkbox',
                'description' => 'Choose one or more of the object options.',
                'type' => 'checkbox',
                'default' => 'option1,option2',
                'category' => 'Selection',
                'values' => array(
                    'option1' => 'Option 1',
                    'option2' => 'Option 2',
                    'option3' => 'Option 3'
                ),
                'required' => false
            ),
            'wysiwyg' => array(
                'title' => 'WYSIWYG',
                'description' => 'Input the content of the object.',
                'type' => 'wysiwyg',
                'default' => 'Hello World!',
                'category' => 'Text',
                'values' => null,
                'required' => false
            ),
            'colorpicker' => array(
                'title' => 'ColorPicker',
                'description' => 'Choose a color for the object.',
                'type' => 'colorpicker',
                'default' => '#ffffff',
                'category' => 'Design',
                'values' => null,
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
            'margin' => array(
                'title' => 'Margin',
                'description' => 'Choose the css margin of the object. See <a href="http://www.w3schools.com/css/box-model.gif" target="_blank">here</a> how margin and padding works.',
                'type' => 'margin',
                'default' => '10px 10px 10px 10px',
                'category' => 'Design',
                'values' => null,
                'required' => false
            ),
            'padding' => array(
                'title' => 'Padding',
                'description' => 'Choose the css padding of the object. See <a href="http://www.w3schools.com/css/box-model.gif" target="_blank">here</a> how margin and padding works.',
                'type' => 'padding',
                'default' => '10px 10px 10px 10px',
                'category' => 'Design',
                'values' => null,
                'required' => false
            ),
            'icon' => array(
                'title' => 'Icon',
                'description' => 'Choose an icon for the object.',
                'type' => 'icon',
                'default' => 'fa fa-cube',
                'category' => 'Design',
                'values' => null,
                'required' => false
            ),
            'image' => array(
                'title' => 'Image',
                'description' => 'Choose an image for the object.',
                'type' => 'image',
                'default' => '',
                'category' => 'Design',
                'values' => null,
                'required' => false
            ),
            'code' => array(
                'title' => 'Custom Code',
                'description' => 'Input custom HTML / CSS / JS for the object.',
                'type' => 'code',
                'default' => '<div></div>',
                'category' => 'Custom Code',
                'values' => null,
                'required' => false
            ),
            'grid' => array(
                'title' => 'Grid',
                'description' => 'Choose a grid for the object.',
                'type' => 'grid',
                'default' => '4/4/4',
                'category' => 'Design',
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
            'text' => '',
            'textarea' => '',
            'textrepeater' => '',
            'keyvalue' => '',
            'select' => '',
            'selectmultiple' => '',
            'radio' => '',
            'checkbox' => array(),
            'wysiwyg' => '',
            'colorpicker' => '',
            'animation' => '',
            'icon' => '',
            'image' => '',
            'grid' => ''
                        ), $atts));

        $html = '';
        $html .= '<div' . ($animation != '' ? ' data-animate="' . $animation . '"' : '') . ' id=' . $id . '>';

        $html .= '<br/> ID <br/>';
        $html .= $id . '<br/>';

        $html .= '<br/> Text <br/>';
        $html .= $text . '<br/>';

        $html .= '<br/> Textarea <br/>';
        $html .= $textarea . '<br/>';

        $html .= '<br/> Text Repeater <br/>';
        $textrepeater = json_decode(html_entity_decode($textrepeater), true);
        foreach ($textrepeater as $text)
            $html .= $text . '<br/>';

        $html .= '<br/> Key Value <br/>';
        $keyvalue = json_decode(html_entity_decode($keyvalue), true);
        foreach ($keyvalue as $key => $value)
            $html .= $key . ' ' . $value . '<br/>';

        $html .= '<br/> Select <br/>';
        $html .= $select . '<br/>';

        $html .= '<br/> Select Multiple <br/>';
        $html .= $selectmultiple . '<br/>';

        $html .= '<br/> Radio <br/>';
        $html .= $radio . '<br/>';

        $html .= '<br/> Checkbox <br/>';
        $checkbox = explode($checkbox, ',');
        foreach ($checkbox as $chk) {
            $html .= $chk . '<br/>';
        }

        $html .= '<br/> WYSIWYG <br/>';
        $html .= html_entity_decode($wysiwyg) . '<br/>';

        $html .= '<br/> ColorPicker <br/>';
        $html .= $colorpicker . '<br/>';

        $html .= '<br/> Animation <br/>';
        $html .= $animation . '<br/>';

        $html .= '<br/> Icon <br/>';
        $html .= '<i class="' . $icon . '"></i>' . '<br/>';

        $html .= '<br/> Image <br/>';
        $html .= '<img src="' . $image . '" alt=""/>' . '<br/>';

        $html .= '<br/> Grid <br/>';
        $html .= $grid . '<br/>';

        $html .= '<br/> Code <br/>';
        $html .= html_entity_decode($code) . '<br/>';

        $html .= '<br/> Content <br/>';
        $html .= webrock_do_shortcode($content);

        $html .= '</div>';

        $html .= '<style>'
                . '#' . $id . '{'
                . 'background: gray;'
                . '}'
                . '</style>';

        $html .= '<script>'
                . 'alert("object");'
                . '</script>';

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
    //$object = new WRObject();
    //$webrock->add_object($object);
}
