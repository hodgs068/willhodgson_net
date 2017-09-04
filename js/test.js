$(document).ready(function() {
	$('#agree').change(function() {
		state=$(this).is(':checked'); // note that the attr() function failed to work here, maybe is() is preferred
		if (state == true) {
			$('#switch').removeAttr('disabled');
		} else {
			$('#switch').attr('disabled', 'disabled');
		}
		
	});
	
	
	$('#switch').toggle(function() 
			{
				$('#switch_color').addClass('highlight');
				$('#switch').val('Remove');
			}, 
			function() 	{
				$('#switch_color').removeClass('highlight');
				$('#switch').val('Switch');
				
			});
	
	
});