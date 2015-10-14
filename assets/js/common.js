$(document).ready(function(){
    $('li').click(function() {
	$( "#show_dialog" ).dialog({
	    buttons: {
	      "Load": function() {
		$("#show_dialog").submit();
		$( this ).dialog( "close" );
		$('#showMenu').hide();
	      },
	      Cancel: function() {
		$( this ).dialog( "close" );
	      }
	    }
	});
    });
    
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