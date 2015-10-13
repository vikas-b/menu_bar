$(document).ready(function(){
    $('li').click(function() {
	alert($(this).data('val'));
	$('#showMenu').hide();
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