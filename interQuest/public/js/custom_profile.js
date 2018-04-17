/**
 * when the page is ready
 */
$(document).ready(function(){

	//reset profile pic container height
	resetProfileHeight();
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
