<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRFormTextarea implements WebRockObject
{
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'form-textarea';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config()
    {
        return array(
            'title' => 'Form Textarea',
            'description' => 'Create a new form textarea.',
            'icon' => 'fa fa-cube',
            'styles' => array(),
            'scripts' => array(),
            'scripts-admin' => array(),
            'keywords' => 'form, textarea, text',
            'filter' => '*',
            'order' => 28
        );
    }

    /* ===
     * Attributes
     * 
     * @role returns the object attributes
     *       as an array
     * @used to create textareas of chosen type and
     *       generate the object creation form
     * === */

    function attributes()
    {
        return array(
            'name' => array(
                'title' => 'Name',
                'description' => 'Input the name / id of the textarea object.',
                'type' => 'text',
                'default' => 'textareaname',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'placeholder' => array(
                'title' => 'Initial Text',
                'description' => 'Input the placeholder of the textarea object.',
                'type' => 'text',
                'default' => 'Enter text',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'rows' => array(
                'title' => 'Rows',
                'description' => 'Input the default number of rows of the textarea.',
                'type' => 'text',
                'default' => '3',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'label' => array(
                'title' => 'Label',
                'description' => 'Choose the textarea label.',
                'type' => 'text',
                'default' => 'Textarea Label',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'helper' => array(
                'title' => 'Helper Text',
                'description' => 'Input the helper text of the textarea object.',
                'type' => 'text',
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

    function create($atts, $content = null)
    {
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

        $html .= '<textarea rows="' . $rows . '" id="' . $name . '" name="' . $name . '" class="' . $classes . ' form-control" placeholder="' . $placeholder . '">';
        $html .= '</textarea>';

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
    $object = new WRFormTextarea();
    $webrock->add_object($object);
}
