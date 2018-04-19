/**
 * constants
 */

/**
 * various stuff that needs to be triggered both on page load, and when a dialog is opened.
 */
$(document).ready(function(){
	
	//default hex grid...start with radius
	var radius = $('#mapContainer').parent().width() / 15.5;
	$('#mapContainer').hexGridWidget(radius, 10, 10, 'hex', row, column).on('hexclick', 
		function(e){ 
			console.log('clicked [' + e.column + ',' + e.row +']' +
			' hex with center at [' + e.center.x + ',' + e.center.y + ']');
		}
	);
});