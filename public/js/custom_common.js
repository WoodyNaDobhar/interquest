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
	
	//draw any empty maps showing
	if($('#mapContainer').html() == ''){
		drawMap();
	}
	
	/**
	 * common jQuery functions
	 */
	//typeSelect
	$('body').on('change', '.typeSelect', function(e){
		
		//no submit
		e.preventDefault();
		
		//setup
		var context = $(this);
		
		//iterate typeTargets
		$.each(context.parent().find('.typeTarget'), function(ti, e){
			
			//check for kids
			if($(this).hasClass('showSource')){
				$(this).siblings('.showTarget').val('').hide();
			}
			
			//unset and hide it
			$(this).val('').hide();
		});
		
		//clear out related hidden inputs
		$.each(context.parent().find('select'), function(si, select){
			if($(this).attr('data-name')){
				$('input#' + $(this).data('name')).val('');
			}
		});

		//show the appropriate select
		context.parent().find('select[data-type="' + context.val() + '"]').show('slow');
		
		//no clicky!
		return false;
	});

	//typeTarget
	$('body').on('change', '.typeTarget', function(e){
		
		//no submit
		e.preventDefault();
		
		//setup
		context = $(this);
		
		//if something selected
		if(context.val() > 0){
			
			console.log(context.parent().find('input#' + context.data('name')));
		
			//update hidden
			context.parent().find('input#' + context.data('name')).val(context.val());
		}
		
		//no clicky!
		return false;
	});
	
	//makeNew
	$('body').on('change', '.makeNew', function(e){
		
		//no submit
		e.preventDefault();
		
		//setup
		makeNewContext = $(this);
		
		//act based on value
		if(makeNewContext.val() == 'newNpc'){
			
			//open new NPC window
			loadPage(makeNewContext, 'Create NPC', '/sparse/npcs/create', null, function(jsonData){
				
				//add to dd & select
				makeNewContext.val('');
				makeNewContext.append('<option value="' + jsonData.data.id + '" selected="selected">' + jsonData.data.name + '</option>');
				
				//update hidden
				makeNewContext.parent().find('#' + makeNewContext.data('name')).val(jsonData.data.id);
				
				//show the fiefdom dd
				makeNewContext.parent().find('#ruler_fiefdom_id').show('slow');
			});
		}else if(makeNewContext.val() == 'newFiefdom'){
		
			//open new Fiefdom window
			loadPage(makeNewContext, 'Create Fiefdom', '/sparse/fiefdoms/create/' + makeNewContext.parent().find('#ruler_id').val() + '/' + makeNewContext.parent().find('#ruler_type').val(), null, function(jsonData){
				
				//add to dd & select
				makeNewContext.val('');
				makeNewContext.append('<option value="' + jsonData.data.id + '" selected="selected">' + jsonData.data.name + '</option>');
				
				//update hidden
				makeNewContext.parent().find('#' + makeNewContext.data('name')).val(jsonData.data.id);
			});
		}
		
		//no clicky!
		return false;
	});
	
	//showSource
	$('body').on('change', '.showSource', function(e){

		//show the related whatever
		$(this).siblings('.showTarget').show('slow');
	});
	
	//open a link in a dialog modal
	$('body').on('click', '.openInDialog', function(e){
		
		//no submit
		e.preventDefault();
		
		//setup
		var params = [];
		var context = $(this);
		var callback = null;

		if(context.attr('id') == 'territoryCreateWidget' || 
			context.attr('id') == 'territoryEditWidget' ||
			context.attr('id') == 'fiefCreateWidget' ||
			context.attr('id') == 'fiefEditWidget')
		{
			
			//set callback
			callback = function(jsonData){

				//update all the things
				var territoryDisplay = context.closest('.ui-dialog');
				territoryDisplay.find('.ui-dialog-title').html(jsonData.data.displayname);
				territoryDisplay.find('.tab-container').first().children().eq(0).children().eq(0).children().eq(1).html(jsonData.data.fief ? jsonData.data.fief.fiefdom.name : '');
				territoryDisplay.find('.tab-container').first().children().eq(0).children().eq(1).children().eq(1).html(jsonData.data.fief ? jsonData.data.fief.fiefdom.ruler.name : '');
				territoryDisplay.find('.tab-container').first().children().eq(0).children().eq(2).children().eq(1).html(jsonData.data.fief && jsonData.data.fief.steward ? jsonData.data.fief.steward.name : '');
				territoryDisplay.find('.tab-container').first().children().eq(0).children().eq(5).children().eq(1).html(jsonData.data.terrain.name);
				territoryDisplay.find('.tab-container').first().children().eq(0).children().eq(6).children().eq(1).html(jsonData.data.primary_resource);
				territoryDisplay.find('.tab-container').first().children().eq(0).children().eq(7).children().eq(1).html(jsonData.data.secondary_resource);
				territoryDisplay.find('.tab-container').first().children().eq(0).children().eq(8).children().eq(1).html(jsonData.data.castle_strength);
				territoryDisplay.find('.tab-container').first().children().eq(0).children().eq(9).children().eq(1).html('');
				territoryDisplay.find('.tab-container').first().children().eq(0).children().eq(10).children().eq(1).html(jsonData.data.is_wasteland ? 'Yes!' : 'No');
				territoryDisplay.find('.tab-container').first().children().eq(0).children().eq(11).children().eq(1).html(jsonData.data.is_no_mans_land ? 'Yes!' : 'No');
				
				//don't need $(this) anymore
				loadTemplates(
					['common/_button.tmpl.htm'],
					function(templateGuts){
						context.parent().html(getTerritoryLinks(templateGuts, jsonData.data));
					}
				);
				
				//refresh the map
				drawMap();
			}
		}else if(context.attr('id') == 'fiefdomEditWidget'){
			
			//set callback
			callback = function(jsonData){
				
				//update some of the things
				var territoryDisplay = context.closest('.ui-dialog');
				territoryDisplay.find('.tab-container').first().children().eq(0).children().eq(0).children().eq(1).html(jsonData.data.name);
				territoryDisplay.find('.tab-container').first().children().eq(0).children().eq(1).children().eq(1).html(jsonData.data.ruler.name);
				
				//refresh the map
				drawMap();
			}
		}
		
		//load the page
		loadPage(context, context.html(), context.attr('href'), params, callback);
		
		//no clicky!
		return false;
	});
	
	//randomize various stuff on a new territory
	$('body').on('click', '.randomizeTerritory', function(e){
		
		//no submit
		e.preventDefault();
		
		//setup
		var context = $(this).parent().parent().parent().find('form');
		
		//set Terrain
		var terrainOptions = context.find("#terrain_id > option");
		var whichOne = Math.floor(Math.random() * (terrainOptions.length - 1)) + 1;
		terrainOptions[whichOne].selected = true;
		
		//(re)set Resource(s)
		var firstPick = Math.floor((Math.random() * 6));
		var secondPick = Math.floor((Math.random() * 4)) + 1;
		var primaryOptions = context.find('#primary_resource > option');
		var secondaryOptions = context.find('#secondary_resource > option');
		secondaryOptions[0].selected = true;
		if(firstPick == 5){
			var anotherPick = Math.floor((Math.random() * 5));
			primaryOptions[anotherPick].selected = true;
			secondaryOptions[secondPick].selected = true;
		}else{
			primaryOptions[firstPick].selected = true;
		}
		
		//(re)set stored resources
		var primaryResource = context.find('#primary_resource').val() == 'Trade' ? 'Gold' : context.find('#primary_resource').val();
		var secondaryResource = context.find('#secondary_resource').val() == 'Trade' ? 'Gold' : context.find('#secondary_resource').val();
		var firstAmount = Math.floor(Math.random() * 19) + 1;
		var secondAmount = Math.floor(Math.random() * 19) + 1;
		context.find('#gold, #iron, #grain, #stone, #timber').val('');
		context.find('#' + primaryResource.toLowerCase()).val(parseInt(context.find('#' + primaryResource.toLowerCase()).val() != '' ? context.find('#' + primaryResource.toLowerCase()).val() : 0) + firstAmount);
		if(secondaryResource != ''){
			context.find('#' + secondaryResource.toLowerCase()).val(parseInt(context.find('#' + secondaryResource.toLowerCase()).val() != '' ? context.find('#' + secondaryResource.toLowerCase()).val() : 0) + secondAmount);
		}

		//no clicky!
		return false;
	});
	
	//related dd population
	$('body').on('change', '.relatedSource', function(e){
		
		//setup
		var context = $(this);
		var relatedTarget = context.siblings('.relatedTarget');
		
		//remove anythign already there
		relatedTarget.find('option[value="newFiefdom"]').nextAll().remove();
		
		//check for val
		if(context.val() > 0){
			
			//spinner up
			var target = document.getElementById(context.closest('form').attr('id'));
			var spinner = new Spinner(spinnerOpts).spin(target);
			
			//the ajax calls
			$.when(

				//get the requisite data
				$.ajax({
					type:		"GET",
					url:		"/api/v1/" + context.data('type').toLowerCase() + 's/' + context.val(),
					dataType:	"json",
					error: function(error){
						
						//wind out the response
						windDown(spinner, error.responseJSON, true);
					}
				})
			).then(

				function(preResults){
					
					//spinner down
					spinner.stop();

					//setup
					var results = preResults['data'];
					var data = preResults['data'][relatedTarget.data('name').substring(0, relatedTarget.data('name').length - 3) + 's'];
					var options = '';
					
					//load our templates
					loadTemplates(
						['common/_selectOption.tmpl.htm'],
						function(templateGuts){

							//iterate and build options
							$.each(data, function(i, fiefdom){

								options = options + templateGuts['templateCommonSelectOption'].format({
									value:		fiefdom.id,
									label:		fiefdom.name
								});
							});
							
							//add options to select
							relatedTarget.append(options);
						}
					);
				}
			);
		}
	});

	//Related Target
	$('body').on('change', '.relatedTarget', function(e){
		
		//no submit
		e.preventDefault();
		
		//setup
		context = $(this);
		
		//update hidden
		context.parent().find('#' + context.data('name')).val((isNumber(context.val()) ? context.val() : ''));

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
		$('#mapContainer').empty().off();
		
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
				$('#mapContainer')
					.hexGridWidget(radius, columns ? columns : 10, colMod, rows ? rows : 10, rowMod, 'hex', territories)
					.on('hexclick', 
						function(e){
							
							//spinner up
							var target = document.getElementById('mapContainer');
							var spinner = new Spinner(spinnerOpts).spin(target);
							
							//save this for later
							var templateId = "templateTerritoryShow";
							var dialogId = 'commonAdminShowTerritoryForm';
							var thisRow = e.row;
							var thisColumn = e.column;

							//premise
							var premise = {
								data:	{
									name:				'Undiscovered',
									fief:				{
										fiefdom:	{
											name:	'Undiscovered',
											ruler:	{
												name:	'Undiscovered'
											}
										},
										steward:	{
											name:	'Undiscovered'
										}
									},
									steward:			'Undiscovered',
									column:				thisColumn,
									row:				thisRow,
									terrain:		{
										name:	'Undiscovered'
									},
									primary_resource:	'Undiscovered',
									secondary_resource:	'Undiscovered',
									castle_strength:	'Undiscovered',
									buildings:			'Undiscovered',
									is_wasteland:		'Undiscovered',
									is_no_mans_land:	'Undiscovered'
								}
							}
							if(e.territory_id != ''){
								var premise = $.ajax({
									type:		"GET",
									url:		"/api/v1/territories/" + e.territory_id,
									dataType:	"json",
									error: 		function(error){
										
										//wind out the response
										windDown(spinner, error.error ? error.error : {'message': (error.message ? error.message : error.responseText)}, true);
									}
								})
							}
							
							//all the ajax calls
							$.when( 
								premise
							).then(
	
								function(preterritory){
	
									//setup
									var territory = preterritory.data;
	
									//load our templates
									loadTemplates(
										['territories/_show.tmpl.htm',
										 'common/_button.tmpl.htm'],
										function(templateGuts){
											
											//buildings
											var buildings = 'None';
											if(territory.buildings && 
												territory.buildings != 'Undiscovered' && 
												territory.buildings.length > 0){
												
												//build list
												buildings = '';
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
											}else{
												buildings = territory.buildings;
											};
											
											//buttons
											var links = getTerritoryLinks(templateGuts, territory);
											
											//template
											var template = templateGuts[templateId].format({
												dialogId:		dialogId,
												name:			territory.name,
												id:				territory.id,
												ruler:			territory.fief && territory.fief.fiefdom.ruler ? territory.fief.fiefdom.ruler.name : '',
												steward:		territory.fief && territory.fief.steward ? territory.fief.steward.name : '',
												fiefdomName:	territory.fief && territory.fief.fiefdom.name,
												column:			territory.column,
												row:			territory.row,
												terrain:		territory.terrain.name,
												resource1:		territory.primary_resource,
												resource2:		territory.secondary_resource ? territory.secondary_resource : '',
												cs:				territory.castle_strength,
												buildings:		buildings,
												wasteland:		territory.is_wasteland ? (territory.is_wasteland == 'Undiscovered' ? territory.is_wasteland : 'Yes!') : 'No',
												noMans:			territory.is_no_mans_land ?  (territory.is_no_mans_land == 'Undiscovered' ? territory.is_no_mans_land : 'Yes!') : 'No',
												links:			links
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
											var dialog = $("#" + dialogId).dialog(mediumDialogVars, {
												title: territory.name,
												close: function(){
													$(this).dialog('destroy').detach().remove()
												}
											});
											dialog.dialog('open');
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
 * All the control buttons for a given territory's widget
 * @param {object}	template
 * @param {object}	territory in question
 */
function getTerritoryLinks(templateGuts, territory){
	
	//setup
	var links = '';

	//depending on territory stuff
	if(territory.id && territory.id != ''){
		links = links + templateGuts['templateCommonButton'].format({
			href:	'/sparse/territories/' + territory.id + '/edit',
			etc:	'id="territoryEditWidget" target="_blank"',
			css:	'pull-right openInDialog',
			label:	'Update Territory'
		}) + '<br><br>';
	}else{
		links = links + templateGuts['templateCommonButton'].format({
			href:	'/sparse/territories/create/' + territory.column + '/' + territory.row,
			etc:	'id="territoryCreateWidget" target="_blank"',
			css:	'pull-right openInDialog',
			label:	'Create Territory'
		}) + '<br><br>';
	}
	if(territory.fief && territory.fief.id && territory.fief.id != ''){
		links = links + templateGuts['templateCommonButton'].format({
			href:	'/sparse/fiefs/' + territory.fief.id + '/edit',
			etc:	'id="fiefEditWidget" target="_blank"',
			css:	'pull-right openInDialog',
			label:	'Add/Update Steward'
		}) + '<br><br>';
	}else if(territory.id && territory.id != ''){
		links = links + templateGuts['templateCommonButton'].format({
			href:	'/sparse/fiefs/create/' + territory.id,
			etc:	'id="fiefCreateWidget" target="_blank"',
			css:	'pull-right openInDialog',
			label:	'Assign Fief'
		}) + '<br><br>';
	}
	if(territory.fief && territory.fief.fiefdom_id && territory.fief.fiefdom_id != ''){
		links = links + templateGuts['templateCommonButton'].format({
			href:	'/sparse/fiefdoms/' + territory.fief.fiefdom_id + '/edit',
			etc:	'id="fiefdomEditWidget" target="_blank"',
			css:	'pull-right openInDialog',
			label:	'Update Fiefdom'
		}) + '<br><br>';
	}

	return links;
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
		},
		close: function(e, ui) {
			$(this).dialog('destroy').detach().remove();
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
		},
		close: function(e, ui) {
			$(this).dialog('destroy').detach().remove();
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
 * checks if n is a number
 * @param {string}	 the string being checked
 */
function isNumber(n) {
	return !isNaN(parseFloat(n)) && !isNaN(n - 0);
};

/**
 * Main page dialog loading function
 * @param {title} string dialog title
 * @param {contentUrl} string of page to get
 * @param {params} array of params to pass to page
 * @param {callback} function to pass to postWidgetForm
 */
var loadPage = function(context, title, contentUrl, params, callback){
	
	//set up the dialog
	var dialogId = 'show' + (typeof context.attr('id') == typeof undefined ? (context.val() == '' ? 'newWidget' : context.val()) : context.attr('id'));
	var pageDialog = $('<div id="' + dialogId + '">').dialog(
		mediumDialogVars, 
		{
			title: title,
			close: function(e, ui) {
				$(this).dialog('destroy').detach().remove();
			},
			buttons: {
				Submit: function(){
					
					//post the request
					postWidgetForm($(this), callback);
				},
				Cancel: function() {
					$(this).dialog('destroy').detach().remove();
				}
			},
			minHeight: 300
		}
	);
	
	//open it
	pageDialog.dialog('open');
	
	//spinner up
	var target = document.getElementById(dialogId);
	var spinner = new Spinner(spinnerOpts).spin(target);
	
	//load contents
	pageDialog.load(contentUrl, params && params.length > 0 ? params : null, function(){
		spinner.stop();
	});
}

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
function postWidgetForm(context, callback){
	
	//setup
	var formID = context.find('form').attr('id');

	//validate
//	if($("#" + formID).validationEngine('validate')){
		
		//any files?
//		var numFiles = 0;
//		for(var i in uploadFiles){
//			numFiles++;
//		}
		
		//route based on # of files
//		if(numFiles > 0){
//			postFileWidgetForm(context, callback);
//		}else{
			postPostFileWidgetForm(context, null, callback);
//		}
//	}
}
//function postFileWidgetForm(context, callback){
//	
//	//spinner up
//	var spinner = new Spinner(spinnerOpts).spin(spinnerTarget);
//	
//	//setup
//	var fileData = new FormData();
//	var formID = context.find('form').attr('id');
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
function postPostFileWidgetForm(context, files, callback){
	
	//spinner up
	var target = document.getElementById(context.find('form').attr('id'));
	var spinner = new Spinner(spinnerOpts).spin(target);
	
	//setup
	var formID = context.find('form').attr('id');
	
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
				context.dialog('destroy').detach().remove();

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
		context.dialog('destroy').detach().remove();

		//callback?
		if(callback && typeof callback !== typeof undefined){
			callback(jsonData);
		}else{
			//just dump it, I guess
			return jsonData;
		}
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
			},
			close: function(e, ui) {
				$(this).dialog('destroy').detach().remove();
				window.location = jsonData.redirect;
			}
		});
	}
}