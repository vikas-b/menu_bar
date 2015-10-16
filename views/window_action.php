 <?php require_once("constant.php"); ?>
 <?php
    if( isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'load')
    {
	$file_to_search  	= isset($_POST['folder_name']) ? $_POST['folder_name'] : '';
	
	if(strstr($file_to_search, '/'))
	{
	    $is_folder  =   explode("/", $file_to_search);
	    if($is_folder[0] == null)
	    {
		if(($is_folder[count($is_folder) - 1]) == null)
		{
		    $file_to_search = substr($file_to_search, 0, -1);
		    $last_dir  =   end(explode("/", $file_to_search));
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
		    echo '<div class="no_record">no folder found</div>';
		}
	    }
	    else
	    {
		echo '<div class="no_record">please enter exact path</div>';
	    }
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
		echo '<div class="no_record">no folder found</div>';
	    }
	}
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
			    echo '<img src='.IMAGE_PATH.'/icons/folder.png height="32" width="32" data-path='.$filename.'>';
			    echo '<div class="content_name">'.$file_name.'</div>';
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
					echo '<img src='.IMAGE_PATH.'/icons/icon-doc-other.png height="32" width="32">';
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
		    $record = 1;
		    break;
		}
	    }
	}
	if(!$record)
	{
	    echo '<div class="no_record">no folder found</div>';
	}
    }
    
?>
