<?php

    if( isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST')
    {
	$file_to_search  	= isset($_POST['folder_name']) ? $_POST['folder_name'] : '';
	
	$files = array();
	$root_path = SEARCH_PATH; 
	
	foreach ($iterator = new RecursiveIteratorIterator(
	    new RecursiveDirectoryIterator($root_path, 
		RecursiveDirectoryIterator::SKIP_DOTS),
	    RecursiveIteratorIterator::SELF_FIRST) as $value) {
	    
	    if($value->getFilename() == $file_to_search) {
		$files[] = $value->getPathname();
		if(!empty($files))
		{
		    foreach($files as $value)
		    {
		    echo "$value<br/>";
		    } 
		}
	    }
	}
    }
?>