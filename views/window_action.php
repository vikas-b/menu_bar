 <?php require_once("constant.php"); ?>
 <?php
    if( isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'load')
    {
	$file_to_search  	= isset($_POST['folder_name']) ? $_POST['folder_name'] : '';
	$path = shell_exec('locate -l 1 '.$file_to_search);
	$path = trim($path);
	$files= glob($path.'/{,.}*', GLOB_BRACE);
	if(!empty($files))
	{
	    foreach ($files as $filename) {
		$filename = trim($filename);
		$file_name = end(explode('/', $filename));
		if (is_Dir($filename)) 
		{
		    echo '<div class="show_image">';
		    echo '<img src='.IMAGE_PATH.'/icons/folder.png height="32" width="32">';
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
			    
			default:echo '<img src='.IMAGE_PATH.'/icons/icon-doc-other.png height="22" width="22">';
			    break;
			
		    }
		    echo '<div class="content_name">'.$file_name.'</div>';
		    echo '</div>';
		}
	    }
	}
	else
	{
	    echo '<div class="no_record">no folder found</div>';
	}    
    }
?>
