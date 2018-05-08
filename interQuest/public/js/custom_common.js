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
 * various stuff that needs to be triggered both on page load, and when a dialog is opened.
 */
$(document).ready(function(){

	//tooltips
	$('[data-toggle="tooltip"]').tooltip();
	
	//draw any maps showing
	drawMap();
});

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
				url:		"/territories/map/" + territoryId,
				dataType:	"json",
				error: function(error){
					//wind out the response
					windDown(spinner, error.error ? error.error : {'message':error.message}, true);
				}
			})
		).then(

			function(preTerritories){

				//setup
				var territories = preTerritories['territories'];
				var rowMod = preTerritories['rowMod'];
				var colMod = preTerritories['colMod'];
				
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
				$('[data-toggle="tooltip"]').tooltip();
				
				//spinner down
				spinner.stop();
			}
		);
	}
}