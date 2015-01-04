<?php

/* =============================================
 * Row 
 * 
 * @type WebRock Object
 * ============================================= */

class WRCodebox implements WebRockObject {
    /* ===
     * Shortcode
     * 
     * @role main object identifier
     * === */

    public $shortcode = 'code';

    /* ===
     * Config
     * 
     * @role returns the object config
     *       as an array
     * === */

    function config() {
        return array(
            'title' => 'Code',
            'description' => 'Create a new code object.',
            'icon' => 'fa fa-code',
            'styles' => array(
            ),
            'scripts' => array(
            ),
            'scripts-admin' => array(
                'code-admin-script' => objects_url() . 'code/code.admin.js'
            ),
            'keywords' => 'code, html, css, js, javascript, jquery, custom',
            'filter' => '*',
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
                'description' => 'Choose an unique id to identify this code object.',
                'type' => 'id',
                'default' => 'code',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'html' => array(
                'title' => 'HTML Code',
                'description' => 'Write your custom HTML code here.',
                'type' => 'code',
                'default' => '<div class="myclass">
    Some content here
</div>',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'css' => array(
                'title' => 'CSS Code',
                'description' => 'Write your custom CSS code here.',
                'type' => 'code',
                'default' => '<style>
    .myclass{
        background: gray;
    }
</style>',
                'category' => null,
                'values' => null,
                'required' => false
            ),
            'js' => array(
                'title' => 'JavaScript Code',
                'description' => 'Write your custom javascript or jquery code here.',
                'type' => 'code',
                'default' => '<script>
    alert("Custom javascript");
</script>',
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
            'html' => '',
            'css' => '',
            'js' => ''
                        ), $atts));

        $code = '';
        $code .= '<div class="codebox" id="' . $id . '">';
        $code .= html_entity_decode($html);
        $code .= '</div>';

        if ($id != '') {
            $code .= html_entity_decode($css);
            $code .= html_entity_decode($js);
        }
        
        return $code;
    }

}

/* =============================================
 * Add to WebRock 
 * 
 * @role adds the object config and shortcode to
 *       the WebRock framework
 * ============================================= */
if (defined('WEBROCK')) {
    $object = new WRCodebox();
    $webrock->add_object($object);
}
