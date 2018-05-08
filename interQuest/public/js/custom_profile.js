/**
 * when the page is ready
 */
$(document).ready(function(){

	//reset profile pic container height
	resetProfileHeight();
	
	//showFiefdom
	$('.showFiefdom').on('click', function(){
		
		//only if collapsed
		if($(this).hasClass('collapsed')){
			
			//only if has center
			if($(this).data('center') && $(this).data('center') != ''){
				drawMap($(this).data('center'));
			}
		}else{
			
			//remove map instead
			$('#mapContainer').empty();
		}
	});
	
	//mapkeeper toggle
	$('.mkToggle').on('click', function(){
		
		var tempId = 'tempID' . Math.round(new Date().getTime() + (Math.random() * 100));
		$(this).attr('id', tempId);

		//don't click
		e.preventDefault();
		
		//spinner up
		var target = document.getElementById(tempId);
		var spinner = new Spinner(spinnerOpts).spin(target);
		
		//all the ajax calls
		$.when(

			//get the requisite data
			$.ajax({
				type:		"GET",
				url:		"/api/v1/users/mkToggle/" + userId,
				dataType:	"json",
				error: function(error){
					//wind out the response
					windDown(spinner, error.error ? error.error : {'message':error.message}, true);
				}
			})
		).then(

			function(presponse){

				//setup
				var response = presponse['message'];
			}
		)
		
		//no clicky!
		return false;
	});
});

function resetProfileHeight(){
	if($('.rebelContainer').length > 0){
		$('.rebelContainer').each(function(){
			$(this).css("min-height", $(this).find('.underlayRebel').height());
		});
	}
	if($('.personaImageContainer').length > 0){
		$('.personaImageContainer').each(function(){
			var oThis = $(this);
			var img = new Image();
		    img.onload = function(){
		    	var newHeight = this.height * (oThis.width() / this.width);
		    	oThis.css("min-height", newHeight);
		    };
		    img.src = $(this).find('.personaImage').first().attr('src');
		});
	}
}

/**
 * when the page is done resizing, reset profile height
 */
$(window).resize(function () {
    resetProfileHeight();
});
