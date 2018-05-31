/**
 * constants & whatnot
 */

//spinner options
var spinnerOpts = {
  lines: 20, // The number of lines to draw
  length: 80, // The length of each line
  width: 40, // The line thickness
  radius: 1, // The radius of the inner circle
  scale: 1.05, // Scales overall size of the spinner
  corners: 1, // Corner roundness (0..1)
  color: '#863cc4', // CSS color or array of colors
  fadeColor: 'transparent', // CSS color or array of colors
  opacity: 0.45, // Opacity of the lines
  rotate: 0, // The rotation offset
  direction: 1, // 1: clockwise, -1: counterclockwise
  speed: 1.3, // Rounds per second
  trail: 53, // Afterglow percentage
  fps: 20, // Frames per second when using setTimeout() as a fallback in IE 9
  zIndex: 2e9, // The z-index (defaults to 2000000000)
  className: 'spinner', // The CSS class to assign to the spinner
  top: '80px', // Top position relative to parent
  left: '50%', // Left position relative to parent
  shadow: 'none', // Box-shadow for the lines
  position: 'absolute' // Element positioning
};

/**
 * ajax common settings
 */
$.ajaxSetup({
	cache: false
});

/**
 * dialog common settings
 */
var bigDialogVars = {
	modal:		true,
	width:		$(window).width() * .7,
	position:	{ my: 'top', at: 'top+150' },
	height:		'auto',
	open: function(event, ui) {
//		startupRoutine($(this));
	}
};
var mediumDialogVars = {
	modal:			true,
	resizable:		false,
	dialogClass:	"noOverlayDialog",
	height:			'auto',
	width:			$(window).width() * .5,
	open:			function(event,ui){
//		startupRoutine($(this));
		$('.noOverlayDialog').next('div').css( {'opacity':0.0} );
	}
};
var smallDialogVars = {
	modal:			true,
	resizable:		false,
	dialogClass:	"noOverlayDialog",
	height:			'auto',
	width:			400,
	open:			function(event,ui){
		$('.noOverlayDialog').next('div').css( {'opacity':0.0} );
	}
};
var alertDialogVars = {
	modal:			true,
	resizable:		true,
	dialogClass:	"noOverlayDialog",
	height:			'auto',
	width:			400,
	open:			function(event,ui){
		$('.noOverlayDialog').next('div').css( {'opacity':0.0} );
	}
};

/**
 * various stuff that needs to be triggered both on page load, and when a dialog is opened.
 */
$(document).ready(function(){

	//tooltips
	$('[data-toggle="tooltip"]').tooltip();
	
	//draw any maps showing
	drawMap();
});

/**
 * Draw a Sector Map
 * @param {string}	center Territory id
 * @param {int}	column width of map
 * @param {int}	row height of map
 */
function drawMap(territoryId, columns, rows){
	
	//default hex grid...start with radius
	var radius = $('#mapContainer').parent().width() / 15.5;
	var territoryId = typeof territoryId != typeof undefined ? territoryId : ($('#mapContainer').data('center') && $('#mapContainer').data('center') != '' ? $('#mapContainer').data('center') : null);
	var columns = typeof columns != typeof undefined ? columns : $('#mapContainer').data('columns');
	var rows = typeof rows != typeof undefined ? rows : $('#mapContainer').data('rows');
	
	//if we have a center...
	if(territoryId){
		
		//clear out the container
		$('#mapContainer').empty();
		
		//spinner up
		var target = document.getElementById('mapContainer');
		var spinner = new Spinner(spinnerOpts).spin(target);
		
		//all the ajax calls
		$.when(

			//get the requisite data
			$.ajax({
				type:		"GET",
				url:		"/api/v1/territories/map/" + territoryId,
				dataType:	"json",
				error: function(error){
					
					//wind out the response
					windDown(spinner, {'message':error.responseJSON.message}, true);
				}
			})
		).then(

			function(preTerritories){

				//setup
				var territories = preTerritories['data']['territories'];
				var rowMod = preTerritories['data']['rowMod'];
				var colMod = preTerritories['data']['colMod'];
				
				//do it
				$('#mapContainer').hexGridWidget(radius, columns ? columns : 10, colMod, rows ? rows : 10, rowMod, 'hex', territories)
				.on('hexclick', 
					function(e){ 
						console.log('clicked [' + e.column + ',' + e.row +']' +
						' hex with center at [' + e.center.x + ',' + e.center.y + ']');
					}
				)
				.on('hexhoveron', 
					function(e){ 
						
					}
				)
				.on('hexhoveroff', 
					function(e){ 
						
					}
				);

				//tooltips
				$('[data-toggle="tooltip"]').tooltip({position: { my: "left center-15", at: "right center" }});
				
				//spinner down
				spinner.stop();
			}
		);
	}
}

/**
 * Some common functions after a successful ajax
 * @param {object}	the caller's spinner
 * @param {string}	the json data the caller was sent
 * @param {bool}	whether it's a failture or success
 */
function windDown(spinner, jsonData, failed){

	//spinner down
	spinner.stop();

	//display message
	if(failed){
		if(jsonData){
			showMessage('danger', jsonData.message);
		}
	}else{
		if(jsonData){
			showMessage('success', jsonData.message);
		}
	}

	//if there's a redirect, do it
	if(jsonData && jsonData.redirect){
		$('<div></div>').appendTo('body')
		.html(jsonData.message)
		.dialog(smallDialogVars, {
			title: "",
			buttons: {
				"Gotcha": function () {
					$(this).dialog('destroy').detach().remove();
					window.location = jsonData.redirect;
				}
			}
		});
	}
}

/**
 * Drops a standard alert
 * @param {string} title
 * @param {string} message
 */
function showAlert(title, message, callback){

	//throw up the alert
	$('<div></div>').appendTo('body')
	.html(message)
	.dialog(alertDialogVars, {
		title: 			title,
		buttons:		{
			Cancel: function () {
				$(this).dialog('destroy').detach().remove();
			}
		}
	}).parent().find('.ui-dialog-titlebar').addClass("ui-state-error");
	
	//callback?
	if(typeof callback !== 'undefined'){
		callback();
	}
}

/**
 * Shows messages from js functions in the site's message mechanism
 * @param {string}	type the type of message it is: success, info, warning, danger
 * @param {string}	message the message to be displayed
 */
function showMessage(type, message){
	
	//validate both as not null
	if(!type || !message){
		return null;
	}
	
	//toss up the alert
	$('<div></div>').appendTo('body')
	.html(message)
	.dialog(alertDialogVars, {
		title: 			'Submit ' + capitalizeFirstOnly(type),
		buttons:		{
			'Acknowledged'	:	function(){
				
				//remove this
				$(this).dialog('destroy').detach().remove();
//				
//				//generate a random ID
//				var msgId = 'msg' + Math.floor(Math.random() * 1000000) + 1;
				
//				//add it to the message log on the index
//				$.get('js/templates/elements/_message.tmpl.htm', function(templates) {
//					$('body').append(templates);
//					var preTemplate = $("#templateMessage" + capitalizeFirstOnly(type)).html();
//					var template = preTemplate.format({
//						id:			msgId,
//						message:	today() + ' ' + now() + ' - ' + message
//					});
//					$("#messageContainer").prepend(template);
//				});
//				
//				//update the system message count
//				$('#toggleSystemMessage').find('.n-count').text(parseInt($('#toggleSystemMessage').find('.n-count').text()) + 1);
//				
//				//set the timer
//				setTimeout(
//					function() {
//						$('#' + msgId).fadeOut('slow');
//					}, 
//					120000
//				);
			}
		}
	})
	.parent().find('.ui-dialog-titlebar').addClass("ui-state-" + type);
}

/**
 * Converts a string from any format to This
 * @param {string}	 the string being formatted
 */
function capitalizeFirstOnly(string) {
	return string.charAt(0).toUpperCase() + string.toLowerCase().slice(1);
};