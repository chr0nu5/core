<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRFormInput implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'form-input';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Form Input',
            'description' => 'Create a new form input.',
            'icon' => 'fa fa-cube',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
            ),
            'keywords' => 'form, input, text, password, email, file',
            'filter' => '*',
            'order' => 28
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
            'name' => array(
                'title' => 'Name',
                'description' => 'Input the name / id of the form object.',
                'type' => 'text',
                'default' => 'inputname',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'placeholder' => array(
                'title' => 'Placeholder',
                'description' => 'Input the placeholder of the input object.',
                'type' => 'text',
                'default' => 'Enter text',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'type' => array(
                'title' => 'Type',
                'description' => 'Choose one of the input types.',
                'type' => 'radio',
                'default' => 'text',
                'category' => null,
                'values' => array(
                    'text' => 'Text',
                    'email' => 'Email',
                    'password' => 'Password',
                    'file' => 'File'
                ),
                'required' => false
            ),
            'label' => array(
                'title' => 'Label',
                'description' => 'Choose the input label.',
                'type' => 'text',
                'default' => 'Input Label',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'helper' => array(
                'title' => 'Helper Text',
                'description' => 'Input the helper text of the input object.',
                'type' => 'text',
                'default' => '',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'classes' => array(
                'title' => 'Additional Classes',
                'description' => 'Add additional classes to the form object. Classes should be separated by a space.',
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
            'placeholder' => '',
            'type' => '',
            'label' => '',
            'helper' => '',
            'classes' => ''
                        ), $atts));

        $html = '<div class="form-group">';

        if ($label != '')
            $html .= '<label for="' . $name . '">' . $label . '</label>';

        $html .= '<input type="' . $type . '" id="' . $name . '" name="' . $name . '" placeholder="' . $placeholder . '" class="' . $classes . ' ' . ($type != 'file' ? 'form-control' : '') . '">';

        if ($helper != '')
            $html .= '<p class="help-block">' . $helper . '</p>';
        $html .= '</div>';

        $html .= '</form>';

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
    $object = new WRFormInput();
    $webrock->add_object($object);
}
