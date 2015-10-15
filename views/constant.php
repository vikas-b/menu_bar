<?php

    define('BASE_FOLDER', '/learn/menu_bar' );
    define('HTTP_PATH', 'http://' . $_SERVER['HTTP_HOST'] . BASE_FOLDER );
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . BASE_FOLDER);
    define('JS_PATH', HTTP_PATH. '/assets/js');
    define('IMAGE_PATH', HTTP_PATH. '/assets/images');
    define('CSS_PATH', HTTP_PATH. '/assets/css');
    define('SEARCH_PATH', $_SERVER['DOCUMENT_ROOT'] . '/learn');
?>
