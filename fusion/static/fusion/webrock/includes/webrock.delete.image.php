<?php

include_once ('../../../../includes/inc.grozav.php');

$grozav->require_login();

$user_id = $grozav->get_user_id();

/* =============================================
 * Delete Image
 * ============================================= */

if (isset($_POST['imgurl'])) {
    $img = filter_input(INPUT_POST, 'imgurl', FILTER_SANITIZE_URL);

    $img_parts = explode('/', $img);

    if ($img_parts[1] == $user_id) {
        $imgurl = '../../' . $img;
        $thumburl = '../../' . str_replace($user_id . '/', $user_id . '/thumbnail/', $img);

        if (file_exists($imgurl))
            unlink($imgurl);
        if (file_exists($thumburl))
            unlink($thumburl);
        echo 'success';
    } else {
        echo 'failed';
    }
}