<?php

/* ===
 * Include Config
 * === */
include 'includes/webrock.config.php';

/* ===
 * Include WebRock
 * 
 * @role returns the object config
 *       as an array
 * === */
$webrock_folder = '';
include 'webrock.main.php';

/* ===
 * Include AJAX Objects
 * 
 * @role load objects for ajax call
 * === */

function include_ajax_objects() {
    global $webrock;

    // Get Config
    $object_config_files = "../objects/*/*.php";
    $files = glob($object_config_files);
    if (is_array($files) && count($files) > 0) {

        foreach ($files as $file) {
            require_once($file);
        }
    }
}

/* =============================================
 * AJAX Response
 * ============================================= */

include_ajax_objects();

/* ===
 * Get Variables
 * === */
$shortcode = null;
$atts = null;
$content = null;
$ajax = false;

if (isset($_POST['shortcode'])) {
    $shortcode = $_POST['shortcode'];
}

if (isset($_POST['atts'])) {
    $atts = $_POST['atts'];
}

if (isset($_POST['content'])) {
    $content = $_POST['content'];
}

if (isset($_POST['ajax'])) {
    $ajax = $_POST['ajax'];
}

/* ===
 * Output HTML
 * === */
if ($ajax == true) {
    echo $webrock->shortcode($shortcode, $atts, $content);
    exit;
}