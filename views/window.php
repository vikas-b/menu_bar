<?php require_once("constant.php"); ?>
<?php require("window_action.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
    <head>
        <title> Menu Bar 
        </title>
        <link rel= "stylesheet" type= "text/css" href="<?php echo CSS_PATH; ?>/style.css" />
	<link rel= "stylesheet" type= "text/css" href="<?php echo JS_PATH;?>/jquery_ui/jquery-ui.css" />
    </head>
    
    <body>
        <div class = "wrapper" >
	    <div class = "menu" id="showMenu">
		<ul>
		   <li data-val="Accessories"> Accessories </li>
		   <li data-val="Games"> Games </li>
		   <li data-val="Graphics"> Graphics </li>
		   <li data-val="Internet"> Internet </li>
		   <li data-val="Office "> Office </li>
		   <li data-val="Programming"> Programming </li>
		   <li data-val="All programms"> All programms </li>
		</ul>
	    </div>
	    <form  id="show_dialog" title="Enter the folder Name" data-url="<?php echo HTTP_PATH;?>/views/window_action.php" >
		<div class="form">
		    <label for = "folder_name" > Search : </label>
		    <input type = "text" name = "folder_name" id = "folder_name" />
		    <img class="back" src="<?php echo IMAGE_PATH;?>/Button-Back-icon.png" height="32" width="32" title="Back">
		    <img class="img" src="<?php echo IMAGE_PATH;?>/folder.png" height="32" width="32" title="create new folder">
		    <img class="loading" src="<?php echo IMAGE_PATH;?>/ajax-loading.gif" height="46" width="46" >
		</div>
		<div id="create_dialog" title="create directory">
		    <label for = "directory_name" > Directory Name : </label>
		    <input type = "text" name = "directory_name" id = "directory_name" />
		</div>
		<div id="show_files"></div>
	    </form>
	    
	    <div class="footer">
		<img src= "<?php echo IMAGE_PATH;?>/start.jpg" id="start" height="50" width="170" />
	    </div>
	    
	</div>
	
    <script type="text/javascript" src="<?php echo JS_PATH;?>/jquery-1.11.3.min.js" ></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>/jquery_ui/jquery-ui.js" ></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>/ajax_loading/ajax-loading.js" ></script>
    <script type= "text/javascript" src="<?php echo JS_PATH;?>/common.js" ></script>
    </body>
</html>