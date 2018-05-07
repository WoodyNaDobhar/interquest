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
});

function resetProfileHeight(){
	if($('.rebelContainer').length > 0){
		$('.rebelContainer').each(function(){
			$(this).css("min-height", $(this).find('.underlayRebel').height());
		});
	}
}

/**
 * when the page is done resizing, reset profile height
 */
$(window).resize(function () {
    resetProfileHeight();
});
