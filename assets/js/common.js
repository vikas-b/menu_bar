$(document).ready(function(){
    $('li').click(function() {
	$("#show_files").empty();
	$( "#show_dialog" ).dialog({
	    height:480,
	    width:820,
	    buttons:
	    {
		"Load": function()
		{
		    var folder_name 	= document.getElementById('folder_name').value;
		    var action		= 'load';
		    commonFunction(folder_name, action);
		    
		},
		"Cancel": function()
		{
		    $( this ).dialog( "close" );
		}
	    }
	    
	});
	
	$('.img').click(function() {
	    $( "#create_dialog" ).dialog({
		height:170,
		width:500,
		buttons:
		{
		    "Create": function()
		    {
			$( "#show_dialog" ).dialog("close");
			
			var directory_name 	= document.getElementById('directory_name').value;
			var action		= 'create';
			var path		= document.getElementById('path').value;
			
			commonFunction(directory_name, action, path);
			$( this ).dialog("close");
			$( "#show_dialog" ).dialog("open");
			
		    },
		    "Cancel":function()
		    {
			$( this ).dialog( "close" );
		    }
		}
	    });
	});
	
	$(document).on('dblclick', '.show_image img', function() {
	    
	    var thisObj 	= $(this);
	    var url 		= thisObj.data('url');
	    var action		= 'open';
	    var path		= document.getElementById('path').value;
	    var directory_name 	= thisObj.data('file');
	    var dataString	= 'folder_name='+ directory_name +'&action='+ action +'&path='+ path;
	    $('.loading').show();
	    $.ajax({
		url		: url,
		data		: dataString,
		type		: 'POST',
		success		: function(data) {
		    console.log(data);
		    if (data == 1)
		    {
			alert('this is empty directory');
			$('.loading').hide();
		    }
		    else
		    {
			$("#show_files").html(data);
			$('.back').show();
			$('.img').show();
			$('.loading').hide();
		    }
		}
	    });
	});
	
	
	$(document).on('click', '.back', function() {
	    $('.loading').show();
	    var thisObj 	= $(this);
	    var url 		= thisObj.data('url');
	    var action		= 'back';
	    var path		= document.getElementById('path').value;
	    var dataString	= 'action='+ action +'&path='+ path;
	    $.ajax({
		url		: url,
		data		: dataString,
		type		: 'POST',
		success		: function(data) {
		    console.log(data);
		    $("#show_files").html(data);
		    $('.back').show();
		    $('.img').show();
		    $('.loading').hide();
		}
	    });
	});
	
	
	function commonFunction(folder_name, action, path = '')
	{
	    var thisObj 	= $(this);
	    var url 		= thisObj.data('url');
	    var dataString	= 'folder_name='+ folder_name +'&action='+ action +'&path='+ path;
	    if ((folder_name.search('/') == -1) && (folder_name != ""))
	    {
		checkSlash(thisObj, url, folder_name, action, dataString);
	    }
	    else
	    {
		if(!(folder_name.indexOf('/')) && (folder_name != null))
		{
		    checkSlash(thisObj, url, folder_name, action, dataString);
		}
		else
		{
		    $("#show_files").html('<div> please enter correct path or name</div>');
		}
	    }
	}
	
	
	function checkSlash(thisObj, url, folder_name, action, dataString)
	{
	    $('.loading').show();
	    $.ajax({
		url		: url,
		data		: dataString,
		type		: 'POST',
		success		: function(data) {
		    console.log(data);
		    if (data == 1)
		    {
			$("#show_files").html('<div> No record found</div>');
			$('.back').hide();
			$('.img').hide();
			$('.loading').hide();
		    }
		    else
		    {
			if (data == 0)
			{
			    alert("This directory alredy exists");
			    $('.loading').hide();
			}
			else
			{
			    $("#show_files").html(data);
			    $('.back').show();
			    $('.img').show();
			    $('.loading').hide();
			}
		    }
		    
		},
	    });
	}
    });
    
    flag = '';
    $('#start').click(function() {
	flag = 1;
	if( $('#showMenu').is(":visible") )
	{
	    $('#showMenu').hide(); 
	}
	else
	{
	    $('#showMenu').show();
	}
    });
    
    $(document).click(function() {
	if(flag)
	{
	    flag = 0;
	}
	else
	{
	    $('#showMenu').hide();
        }
    });
});