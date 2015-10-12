<?php require_once("constant.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
    <head>
        <title> Menu Bar 
        </title>
        <link rel= "stylesheet" type= "text/css" href="<?php echo CSS_PATH; ?>/style.css" />
    </head>
    
    <body>
        <div class = "wrapper">
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
	    <div class="footer">
		<img src= "<?php echo IMAGE_PATH;?>/start.jpg" id="start" height="59" width="170"  />
	    </div>
	</div>
	
    <script type="text/javascript" src="<?php echo JS_PATH;?>/jquery-1.11.3.min.js" ></script>
    <script type= "text/javascript">
	$(document).ready(function(){
	    $('li').click(function() {
		alert($(this).data('val'));
		$('#showMenu').hide();
	    });
	    
	    $('#start').click(function () {
		$('#showMenu').show();
	    	
	    });
	    
	    $('div.wrapper').click(function () {
		    $('#showMenu').hide();
		});
	});
	
	
	
	function showHide()
	{
	    var menu = document.getElementById("showMenu");
	    if (menu.style.display !== "block") {
		menu.style.display = "block";
	    }
	    else {
		menu.style.display = "none";
	    }
	}
    </script>
    </body>
</html>