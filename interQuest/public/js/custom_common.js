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
var spinnerTarget = document.getElementById('spinMe');

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
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	}
});

/**
 * various stuff that needs to be triggered both on page load, and when a dialog is opened.
 */
$(document).ready(function(){

	//tooltips
	$('[data-toggle="tooltip"]').tooltip();
	
	//draw any maps showing
	drawMap();
	
	/**
	 * common jQuery functions
	 */
	//typeSelect
	$('body').on('change', '.typeSelect', function(e){
		
		//no submit
		e.preventDefault();
		
		//hide any related selects
		$(this).parent().find('.typeTarget').hide();

		//show the appropriate select
		$(this).parent().find('select[data-type="' + $(this).val() + '"]').show('slow');
		
		//no clicky!
		return false;
	});

	//typeTarget
	$('body').on('change', '.typeTarget', function(e){
		
		//no submit
		e.preventDefault();
		
		//update hidden
		$(this).parent().find('#' + $(this).data('name')).val($(this).val());

		console.log($(this).parent().find('#' + $(this).data('name')).val());
		
		//no clicky!
		return false;
	});
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
					windDown(spinner, error.responseJSON, true);
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
						
						//spinner up
						var target = document.getElementById('mapContainer');
						var spinner = new Spinner(spinnerOpts).spin(target);
						
						//save this for later
						var templateId = "templateTerritoryShow";
						var dialogId = 'commonAdminShowTerritoryForm';
						
						//all the ajax calls
						$.when(

							//get the requisite data
							$.ajax({
								type:		"GET",
								url:		"/api/v1/territories/" + e.territory_id,
								dataType:	"json",
								error: function(error){
									//wind out the response
									windDown(spinner, error.error ? error.error : {'message':error.message}, true);
								}
							})
						).then(

							function(preterritory){

								//setup
								var territory = preterritory.data;

								//load our templates
								loadTemplates(
									['territories/_show.tmpl.htm'],
									function(templateGuts){
										
										//buildings
										var buildings = '';
										if(territory.buildings && territory.buildings.length > 0){
											
											//build list
											territory.buildings.forEach(function(building){
												
												//setup
												var buildingSize = (building.expandable ?
													' (' + building.pivot.size + ')' :
													''
												);
												
												//update
												buildings = buildings + 
													(building.pivot.name ? 
														building.pivot.name + ' (' + building.name + buildingSize + ')' : 
														building.name + buildingSize
													)
													+ ',<br>'
											});
											buildings = buildings.substring(0, buildings.length - 5);
										};
										
										//template
										var template = templateGuts[templateId].format({
											dialogId:		dialogId,
											name:			territory.name,
											id:				territory.id,
											ruler:			territory.fief && territory.fief.fiefdom.ruler ? territory.fief.fiefdom.ruler.name : '',
											steward:		territory.fief && territory.fief.steward ? territory.fief.steward.name : '',
											fiefdomName:	territory.fief.fiefdom.name,
											column:			territory.column,
											row:			territory.row,
											terrain:		territory.terrain.name,
											resource1:		territory.primary_resource,
											resource2:		territory.secondary_resource ? territory.secondary_resource : '',
											cs:				territory.castle_strength,
											buildings:		buildings,
											wasteland:		territory.is_wasteland ? 'Yes!' : 'No',
											noMans:			territory.is_no_mans_land ?  'Yes!' : 'No'
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
											title: territory.name,
											close: function(){
												$(this).dialog('destroy').detach().remove()
											}
										});
									}
								);
							}
						)
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

/**
 * Generic formatter
 * @param {string} the string being formatted
 */
String.prototype.format = function() {
	var data = arguments[0];
	return this.replace(/{{(\w*)}}/g, function(m,key){
		return data.hasOwnProperty(key)?data[key]||"":"";
	});
};

/**
 * Main template loading function
 * @param {templates} array of templates to get
 */
var loadTemplates = function(templates, callback){
	
	//setup
	var templateIds = [];
	
	//iterate templates
	$.each(templates, function(ti, template){

		//get the template
		$.get('/js/templates/' + template, function(thisTemplate){
			
			//get the id
			var thisTemplateId = $(thisTemplate).attr('id');
			
			//clear it out if it already existed
			$("#" + thisTemplateId).remove();
			
			//load the template to the page
			$('body').append(thisTemplate);
			
			//make sure the template loaded
			if($("#"+thisTemplateId).length){

				//add the id to the list
				templateIds.push(thisTemplateId);
				
				//if the list is the same length as numGets (ie, we're done loading)
				if(templateIds.length == templates.length){
					
					//setup
					var templateGuts = [];

					//iterate to load the templates into memory
					$.each(templateIds, function(tii, templateId) {
						templateGuts[templateId] = $("#" + templateId).html();
					});
					
					callback(templateGuts);
				}
			}else{
				
				//display message
				showMessage('danger', 'Failed to fetch ' + thisTemplateId + '.	Please refresh the page and try again.	If it fails again, alert support immediately and tell them to uncomment the script tag on that view they were mucking with.');
			}
		});
	});
}

/**
 * Post widget info via ajax
 */
function postWidgetForm(formID, callback){

	//validate
//	if($("#" + formID).validationEngine('validate')){
		
		//any files?
//		var numFiles = 0;
//		for(var i in uploadFiles){
//			numFiles++;
//		}
		
		//route based on # of files
//		if(numFiles > 0){
//			postFileWidgetForm(formID, callback);
//		}else{
			postPostFileWidgetForm(formID, null, callback);
//		}
//	}
}
//function postFileWidgetForm(formID, callback){
//	
//	//spinner up
//	var spinner = new Spinner(spinnerOpts).spin(spinnerTarget);
//	
//	//setup
//	var fileData = new FormData();
//	
//	//iterate the files
//	$.each(uploadFiles, function(fieldName, uploadFile){
//		
//		//add it to the form data
//		fileData.append(fieldName, uploadFile['file']);
//		
//		//add the target folder to the form data
//		fileData.append("targets[]", uploadFile['target']);
//		
//		//add the fieldName to the form data
//		fileData.append("fieldNames[]", fieldName);
//		
//		//local?
//		fileData.append("local[]", uploadFile['local'] ? true : false);
//	});
//	
//	//clear out uploadFiles
//	uploadFiles = Object.create(null);
//	
//	//add the token
//	fileData.append("_token", $('meta[name="_token"]').attr('content'));
//
//	$.ajax({
//		url:			'/fileWrangler',
//		type:			'POST',
//		data:			fileData,
//		dataType:		'text',
//		processData:	false, // Don't process the files
//		contentType:	false, // Set content type to false as jQuery will tell the server its a query string request
//		success:		function(files){
//			
//			//spinner down
//			spinner.stop();
//			
//			//post the rest of the form
//			postPostFileWidgetForm(formID, files, callback);
//		},
//		error: function(error){
//			
//			//wind out the response
//			windDown(spinner, error.responseJSON, true);
//			
//			//close up
//			$('form#' + formID).parent('div.widgetActionTemplate').dialog('destroy').detach().remove();
//		}
//	});
//}
function postPostFileWidgetForm(formID, files, callback){
	
	//spinner up
	var spinner = new Spinner(spinnerOpts).spin(spinnerTarget);
	
	//set the data
	var submitData = $('form#' + formID).serializeArray();
	
	//update the checkbox items in the array to a boolean
	$.each($('form#' + formID + ' input[type=checkbox]:checked'), function(){
		for(index = 0; index < submitData.length; ++index){
			if(submitData[index].name == this.name){
				submitData[index].value = "1";
				break;
			}
		}
	});
	
	//add the checkbox naughts to the array
	$.each($('form#' + formID + ' input[type=checkbox]:not(:checked)'), function(){
		if(this.name){
			submitData[submitData.length] = {"name": this.name, "value": '0'};
		}
	});
	
	//add the token
//	submitData[submitData.length] = { name: "_token", value: $('meta[name="_token"]').attr('content')};
	
	//for each files inputs that may have been set, update the list of files
//	if(files && typeof files !== typeof undefined){
//
//		$.each(JSON.parse(files), function(fieldName, file){
//
//			//change dot notated multidemetional fieldName to bracketed
//			var fieldNameSplit = fieldName.split('_');
//			if(fieldNameSplit.length > 0){
//				var fieldNameSplitBrackets = '';
//				for(var i = 1; i < fieldNameSplit.length; i++){
//					fieldNameSplitBrackets = fieldNameSplitBrackets + '[' + fieldNameSplit[i] + ']';
//				}
//				fieldName = fieldNameSplit[0] + fieldNameSplitBrackets;
//			}
//
//			//send it all on
//			submitData[submitData.length] = { name: fieldName, value: file.name };
//		});
//	}
	
	//for testing
//	console.log(submitData);
	
	//if there's an action, do it
	if(typeof $('form#' + formID).attr('action') !== typeof undefined && $('form#' + formID).attr('action') !== false && $('form#' + formID).attr('action') != ''){

		//post the request
		$.ajax({
			type:		"POST",
			url:		$('form#' + formID).attr('action'),
			dataType:	"json",
			data:		submitData,
			context:	$(this),
			success:	function(jsonData){
				
				//wind out the response
				windDown(spinner, jsonData);
				
				//close up
				$('form#' + formID).closest('div.widgetActionTemplate').dialog('destroy').detach().remove();

				//callback?
				if(callback && typeof callback !== typeof undefined){
					(callback(jsonData));
				}else{
					//just dump it, I guess
					return jsonData;
				}
			},
			error: function(error){

				//wind out the response
				windDown(spinner, error.responseJSON ? error.responseJSON : {'message': error.responseText}, true);
			}
		});
	}else{
		
		//wind out the response
		windDown(spinner);
		
		//close up
		$('form#' + formID).closest('div.widgetActionTemplate').dialog('destroy').detach().remove();

		//callback?
		if(callback && typeof callback !== typeof undefined){
			callback(jsonData);
		}else{
			//just dump it, I guess
			return jsonData;
		}
	}
}