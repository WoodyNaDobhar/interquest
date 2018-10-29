/**
 * when the page is ready
 */
$(document).ready(function(){

	//reset profile pic container height
	resetProfileHeight();
	
	//showFiefdom
	$('.showFiefdom').on('click', function(){

		//only if has center
		if($(this).data('center') && $(this).data('center') != ''){
			drawMap($(this).data('center'), null, null, $(this).data('zoom'));
		}
	});
	
	//showFief
	$('.showFief').on('click', function(){
		$('#mapContainer').attr('data-zoom', 3);
		drawMap($(this).data('center'), null, null, 3);
	});
	
	//mapkeeper toggle
	$('.makeMapkeeper').on('click', function(){
		
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
				url:		"/api/v1/users/makeMapkeeper/" + userId,
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
	
	//invitePersona
	$('body').on('click', '.invitePersona', function(e){
		
		//no submit
		e.preventDefault();
		var clickedElement = $(this);
		clickedElement.prop("disabled", true);

		//spinner up
		var spinner = new Spinner(spinnerOpts).spin(spinnerTarget);
		
		//save this for later
		var templateId = "templatePersonaInvite";
		var dialogId = 'personaAdminInviteUserForm';
		var email = clickedElement.closest('form').find('#validClaim').val();
		var personaId = clickedElement.data('persona_id');
				
		//load our templates
		loadTemplates(
			['personae/_invite.tmpl.htm'],
			function(templateGuts){

				//setup
				clickedElement.prop("disabled", false);
				var disabled = ' disabled';
				
				//template
				var template = templateGuts[templateId].format({
					dialogId:	dialogId,
					personaId:	personaId,
					value:		email
				});
				
				//load the template to the page
				$('body').append(template);
				
				//wind out the response
				windDown(spinner);
				
				//listeners
				
				//if it's up, kill it
				if($("#" + dialogId).hasClass('ui-dialog-content')){
					$("#" + dialogId).dialog('destroy').detach().remove();
				}

				//display the dialog
				$("#" + dialogId).dialog(mediumDialogVars, {
					title: "Invite Persona User",
					buttons: {
						Submit: function(){
							
							//post the request
							postWidgetForm($(this));
						},
						Cancel: function() {
							$(this).dialog('destroy').detach().remove();
						}
					},
					close: function(){
						$(this).dialog('destroy').detach().remove()
					}
				});
			}
		);
		
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
