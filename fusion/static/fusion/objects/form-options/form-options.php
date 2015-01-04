<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRFormOptionsInput implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'form-options';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Form Options Input',
            'description' => 'Create a new form options input.',
            'icon' => 'fa fa-cube',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
            ),
            'keywords' => 'form, options, checkbox, radio, select, input, text',
            'filter' => '*',
            'order' => 28
        );
    }

    /* ===
     * Attributes
     * 
     * @role returns the object attributes
     *       as an array
     * @used to create options inputs of chosen type and
     *       generate the object creation form
     * === */

    function attributes() {
        return array(
            'name' => array(
                'title' => 'Name',
                'description' => 'Input the name / id of the options input object.',
                'type' => 'text',
                'default' => 'inputname',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'type' => array(
                'title' => 'Type',
                'description' => 'Choose the type of the options select input.',
                'type' => 'radio',
                'default' => 'checkbox',
                'category' => null,
                'values' => array(
                    'checkbox' => 'Checkbox',
                    'radio' => 'Radio',
                    'select' => 'Select',
                    'select-multiple' => 'Select Multiple'
                ),
                'required' => false
            ),
            'keyvalue' => array(
                'title' => 'Key Value',
                'description' => 'Input multiple key value pairs for the options select form.',
                'type' => 'key-value',
                'default' => array(
                    'option1' => 'Option 1',
                    'option2' => 'Option 2',
                    'option3' => 'Option 3'
                ),
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the options input object. Classes should be separated by a space.',
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
            'name' => '',
            'type' => '',
            'keyvalue' => '',
            'classes' => ''
                        ), $atts));

        $html = '<div class="options-input ' . $classes . '">';

        $keyvalue = json_decode(html_entity_decode($keyvalue), true);

        switch ($type) {
            case 'checkbox' : {
                    foreach ($keyvalue as $key => $value) {
                        $html .= '<div class="checkbox">';
                        $html .= '<label>';
                        $html .= '<input type="checkbox" name="' . $name . '" value="' . $key . '">' . $value;
                        $html .= '</label>';
                        $html .= '</div>';
                    }
                }break;
            case 'radio' : {
                    foreach ($keyvalue as $key => $value) {
                        $html .= '<div class="radio">';
                        $html .= '<label>';
                        $html .= '<input type="radio" name="' . $name . '" value="' . $key . '">' . $value;
                        $html .= '</label>';
                        $html .= '</div>';
                    }
                }break;
            case 'select' : {
                    $html .= '<select class="form-control" name="' . $name . '">';
                    foreach ($keyvalue as $key => $value) {
                        $html .= '<option value="' . $key . '">' . $value . '</option>';
                    }
                    $html .= '</select>';
                }break;
            case 'select-multiple' : {
                    $html .= '<select multiple class="form-control" name="' . $name . '">';
                    foreach ($keyvalue as $key => $value) {
                        $html .= '<option value="' . $key . '">' . $value . '</option>';
                    }
                    $html .= '</select>';
                }break;
        }



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
    $object = new WRFormOptionsInput();
    $webrock->add_object($object);
}
