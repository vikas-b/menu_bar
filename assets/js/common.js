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
	if( $('#showMenu').is(":visible") )
	{
	    $('#showMenu').hide();
	}
	else
	{
	    $('#showMenu').show();
	    $('#start').data('clicked', true);
	}
    });
    
    
//    $('body').click(function() {
//	if(($('#start').data('clicked')))
//	{
//	    if( $('#showMenu').is(":visible") ) {
//		console.log('f');
//		$('#showMenu').hide();
//		//$('#start').data('clicked', true);
//	    }
//	    else
//	    {
//		//$('#showMenu').show();
//		$('#start').data('clicked', true);
//	    }
//	}
//	else
//	{
//	    $('#showMenu').hide();
//	}
//    });
});