<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<?php
    if( isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST')
    {
	$file_to_search  	= isset($_POST['folder_name']) ? $_POST['folder_name'] : '';
	
	$path = shell_exec('locate -l1 '.$file_to_search);
	$path = trim($path);
	$files= glob($path.'/{,.}*', GLOB_BRACE);
    }
?>
<?php require_once("constant.php"); ?>
<html>
    <head>
        <title> Menu Bar 
        </title>
    </head>
    <body>
        <div class = "wrapper" >
	    <?php foreach ($files as $filename) {
		$file_name = end(explode('/', $filename));
		if (is_Dir($filename)) { ?>
		    <div>
			<img src="<?php echo IMAGE_PATH; ?>/doc-icons/icon-doc-avi.jpg" height="32" width="32" />
			<?php //echo $filename; ?>
		    </div>
		<?php }else{ ?>
		<?php echo "hello"; } ?>
	    <?php }?>
	</div>
    </body>
</html>