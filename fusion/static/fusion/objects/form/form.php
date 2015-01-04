<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRForm implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'form';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Form',
            'description' => 'Create a new form object. Forms can be serialized and submitted through AJAX.',
            'icon' => 'fa fa-cubes',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'form-admin-script' => objects_url() . 'form/form.admin.js'
            ),
            'preview' => '<img src="' . objects_url() . '/form/preview.jpg" alt="Form" />',
            'keywords' => 'form, input, ajax, submit',
            'filter' => '*',
            'order' => 27
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
                'description' => 'Choose an unique id to identify this form object.',
                'type' => 'id',
                'default' => 'form',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'action' => array(
                'title' => 'Action',
                'description' => 'Choose the form action.',
                'type' => 'text',
                'default' => 'index.php',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'method' => array(
                'title' => 'Method',
                'description' => 'Choose the form method when sending the data.',
                'type' => 'radio',
                'default' => 'get',
                'category' => null,
                'values' => array(
                    'get' => 'GET',
                    'post' => 'POST'
                ),
                'required' => false
            ),
            'name' => array(
                'title' => 'Name',
                'description' => 'Input the name of the form object.',
                'type' => 'text',
                'default' => 'Default Text',
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
            'classes' => '',
            'margin' => '',
            'padding' => '',
            'id' => '',
            'action' => '',
            'method' => '',
            'name' => ''
                        ), $atts));

        $html = '';
        $html .= '<form class="' . $classes . '" ' . ($id != '' ? 'id="' . $id . '"' : '') . ' '
                . ($margin != '' || $padding != '' ? 'style="'
                        . ($margin != '' ? 'margin: ' . $margin . ';' : '' )
                        . ($padding != '' ? ' padding: ' . $padding . ';' : '' )
                        . '"' : '')
                . ' action="' . $action . '" method="' . $method . '" name="' . $name . '">';

        $form = '<div class="textbox  webrock-object" style="color:#000000" data-atts="{&quot;text&quot;:&quot;&amp;lt;h1&amp;gt;Sample Form&amp;lt;&amp;#x2F;h1&amp;gt;\n&amp;lt;p&amp;gt;Create amazing websites using the most awesome page builder framework. &amp;lt;strong&amp;gt;Rock the web!&amp;lt;&amp;#x2F;strong&amp;gt;&amp;lt;&amp;#x2F;p&amp;gt;&quot;,&quot;classes&quot;:&quot;&quot;,&quot;color&quot;:&quot;#000000&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="textbox" data-filter="*" data-filter-exclude="*"><h1>Sample Form</h1>
<p>Create amazing websites using the most awesome page builder framework. <strong>Rock the web!</strong></p></div>';
        $form .= '<div class="form-group webrock-object" data-atts="{&quot;name&quot;:&quot;sampleemail&quot;,&quot;placeholder&quot;:&quot;Enter your email&quot;,&quot;type&quot;:&quot;email&quot;,&quot;label&quot;:&quot;Email&quot;,&quot;helper&quot;:&quot;&quot;,&quot;classes&quot;:&quot;&quot;}" data-shortcode="form-input" data-filter="*" data-filter-exclude="*"><label for="sampleemail">Email</label><input type="email" id="sampleemail" name="sampleemail" placeholder="Enter your email" class=" form-control"></div>';
        $form .= '<button type="submit" class="btn btn-lg btn-primary btn-block webrock-object" data-atts="{&quot;text&quot;:&quot;Submit&quot;,&quot;type&quot;:&quot;btn-primary&quot;,&quot;size&quot;:&quot;btn-lg&quot;,&quot;classes&quot;:&quot;btn-block&quot;,&quot;animation&quot;:&quot;&quot;}" data-shortcode="form-submit" data-filter="*" data-filter-exclude="*">Submit</button>';
        
        $content = $content == null ? $form : $content;

        $html .= webrock_do_shortcode($content);

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
    $object = new WRForm();
    $webrock->add_object($object);
}
