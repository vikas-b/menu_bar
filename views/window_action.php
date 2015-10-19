 <?php require_once("constant.php"); ?>
 <?php
    if( isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'load')
    {
	$file_to_search  	= isset($_POST['folder_name']) ? $_POST['folder_name'] : '';
	
	file_to_search($file_to_search);
    }
    
    if( isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'back' && !empty($_POST['path']))
    {
	$file_to_search  	= isset($_POST['path']) ? $_POST['path'] : '';
	$file_to_search  =   explode("/", $file_to_search);
	array_splice($file_to_search, -2, 2);
	$file_to_search  =   implode("/", $file_to_search);
	file_to_search($file_to_search);
    }
    
    if( isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'create' && !empty($_POST['path']))
    {
	$file_to_create  	= isset($_POST['folder_name']) ? $_POST['folder_name'] : '';
	$file_to_search  	= isset($_POST['path']) ? $_POST['path'] : '';
	
	$create_directory = $file_to_search.$file_to_create;
	
	if (!file_exists($create_directory)) { 
	    $result = mkdir( $create_directory);
	    if ($result == 1)
	    {
		file_to_search($file_to_search);
	    }
	}
	else
	{
	    echo 0;
	}
	die;
    }
    
    if( isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'open' && !empty($_POST['path']))
    {
	$folder_name  	= isset($_POST['folder_name']) ? $_POST['folder_name'] : '';
	$path  		= isset($_POST['path']) ? $_POST['path'] : '';
	$open_directory = $path.$folder_name;
	if(count(glob($open_directory."*"))==0)
	{
	    opendir();
	}
	else
	{
	    file_to_search($open_directory);
	}
	die;
    }
    
    function file_to_search($file_to_search)
    {
	if(strstr($file_to_search, '/'))
	{
	    $is_folder  =   explode("/", $file_to_search);
	    if($is_folder[0] == null)
	    {
		if(($is_folder[count($is_folder) - 1]) == null)
		{
		    $file_to_search 	= substr($file_to_search, 0, -1);
		    $last_dir  		=   end(explode("/", $file_to_search));
		}
		else
		{
		    $last_dir = $is_folder[count($is_folder) - 1];
		}
		
		$path 	= shell_exec('locate '.$file_to_search);
		$records 	=   explode("\n", $path);
		if(!empty($records))
		{
		    search_records($path, $records, $last_dir);
		}
		else
		{
		    echo 1;
		}
	    }
	    die;
	}
	else
	{
	    $path = shell_exec('locate '.$file_to_search);
	    $records  =   explode("\n", $path);
	    if(!empty($records))
	    {
		search_records($path, $records, $file_to_search);
	    }
	    else
	    {
		echo 1;
	    }
	}
	die;
    }
    
    
    
    function search_records($path, $records,  $file_to_search)
    {
	foreach($records as $record)
	{
	    $single_path = trim($record);
	    if(is_dir($single_path))
	    {
		
		$single_path = trim($single_path);
		$is_folder  =   end(explode("/", $single_path));
		if($is_folder == $file_to_search)
		{
		    $single_path = trim($single_path);
		    $files= glob($single_path.'/{,.}*', GLOB_BRACE);
		    foreach ($files as $filename)
		    {
			$file_name = end(explode('/', $filename));
			if (is_Dir($filename)) 
			{
			    echo '<div class="show_image" data-url='.HTTP_PATH.'/views/window_action.php>';
			    echo '<img src='.IMAGE_PATH.'/icons/folder.png height="32" width="32" data-file='.$file_name.'>';
			    echo '<div>'.$file_name.'</div>';
			    echo '</div>';
			}
			else
			{
			    $ext = pathinfo($file_name, PATHINFO_EXTENSION); 
			    echo '<div class="show_image">';
			    switch($ext)
			    {
				case "txt" :
					echo '<img src='.IMAGE_PATH.'/icons/icon-doc-txt.png height="32" width="32">';
					break;
				case "html" :
					echo '<img src='.IMAGE_PATH.'/icons/icon-doc-htm.png height="22" width="22">';
					break;
				case "jpg" :
					echo '<img src='.IMAGE_PATH.'/icons/icon-doc-jpg.png height="22" width="22">';
					break;
				case "avi" :
					echo '<img src='.IMAGE_PATH.'/icons/icon-doc-avi.png height="22" width="22">';
					break;
				case "mov" :
					echo '<img src='.IMAGE_PATH.'/icons/icon-doc-mov.png height="22" width="22">';
					break;
				case "doc" :
					echo '<img src='.IMAGE_PATH.'/icons/icon-doc-doc.png height="22" width="22">';
					break;
				case "ppt" :
					echo '<img src='.IMAGE_PATH.'/icons/icon-doc-ppt.png height="22" width="22">';
					break;
				case "pdf" :
					echo '<img src='.IMAGE_PATH.'/icons/icon-doc-pdf.png height="22" width="22">';
					break;
				case "zip" :
					echo '<img src='.IMAGE_PATH.'/icons/icon-doc-zip.png height="22" width="22">';
					break;
				case "mp3" :
					echo '<img src='.IMAGE_PATH.'/icons/icon-doc-mp3.png height="22" width="22">';
					break;
				case "xls" :
					echo '<img src='.IMAGE_PATH.'/icons/icon-xls-txt.png height="22" width="22">';
					break;
				case "php" :
					echo '<img src='.IMAGE_PATH.'/icons/php.ico height="32" width="32">';
					break;
				case "js" :
					echo '<img src='.IMAGE_PATH.'/icons/js.png height="32" width="32">';
					break;
				    
				default:
					echo '<img src='.IMAGE_PATH.'/icons/icon-doc-other.png height="22" width="22">';
					break;
			    }	
			    echo '<div class="content_name">'.$file_name.'</div>';
			    echo '</div>';
			} 
		    }
		    echo '<input type = "hidden" name = "path" id = "path" value='.$single_path.'/>';
		    $record = 1;
		    break;
		}
	    }
	}
	if(!$record)
	{
	    echo 1;
	}
    }
    
?>
