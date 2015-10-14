<?php

    if( isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST')
    {
	$file_to_search  	= isset($_POST['folder_name']) ? $_POST['folder_name'] : '';
	
	print '<pre>';
	$files = glob('/opt/lampp/htdocs/'.$file_to_search.'/{,.}*', GLOB_BRACE);
	foreach ($files as $filename) {
	    echo "$filename " . "\n"; 
	}
    }
?>