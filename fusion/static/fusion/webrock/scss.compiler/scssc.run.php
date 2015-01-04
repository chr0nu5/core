<?php

/* =============================================
 * Run SCSS Compiler
 * 
 * @role get all scss files of objects 
 *       and recompile
 * ============================================= */
require_once '../includes/webrock.checklogin.php';
require_once 'scssc.php';
require_once 'scssc.setup.php';

// Write JSON file with theme variables
$filename = '../webrock.theme.json';
if (isset($_POST['scssVariables'])) {
    $content = $_POST['scssVariables'];
    $variables = json_decode($_POST['scssVariables']);
}

$content = json_decode($content, true);

if (isset($_POST['default_font'])) {
    $default_font = stripslashes($_POST['default_font']);
    $content['default_font'] = $default_font;
}
if (isset($_POST['heading_font'])) {
    $heading_font = stripslashes($_POST['heading_font']);
    $content['heading_font'] = $heading_font;
}


if (!$handle = fopen($filename, 'wb')) {
    echo "NULL";
    exit;
}
if (fwrite($handle, json_encode($content)) === FALSE) {
    echo "NULL";
    exit;
}
fclose($handle);

unset($content['default_font']);
unset($content['heading_font']);

$override = '';
foreach ($variables as $variable => $value) {
    $override .= $variable . ': ' . $value . '; ';
}

$dirs = array_filter(glob('../../objects/*/'), 'is_dir');
foreach ($dirs as $dir) {
    SassCompiler::run($dir, $dir, $override);
}

SassCompiler::run("../../theme/scss/", "../../theme/css/", $override);
SassCompiler::run("../webrock/scss", "../webrock/css", $override);
