/*global $, document*/
$.fn.hexGridWidget = function (radius, zoom, colMod, rowMod, cssClass, data) {
	'use strict';
	var createSVG = function (tag) {
		return $(document.createElementNS('https://www.w3.org/2000/svg', tag || 'svg'));
	};

	return $(this).each(function () {
		var element = $(this)
		var evenStagger = false,
		hexClick = function () {
			var hex = $(this);
			element.trigger($.Event('hexclick', hex.data()));
		},
		hexHoverOn = function () {
			var hex = $(this);
			element.trigger($.Event('hexhoveron', hex.data()));
		},
		hexHoverOff = function () {
			var hex = $(this);
			element.trigger($.Event('hexhoveroff', hex.data()));
		},
		height = Math.sqrt(3) / 2 * radius,
		svgParent = createSVG('svg').attr('tabindex', 1).appendTo(element).css({
			width: (1.5 * zoom  +  0.5) * radius,
			height: (2 * zoom  +  1) * height
		}),
		column,
		thisColumn,
		row,
		thisRow,
		center,
		toPoint = function (dx, dy) {
			return Math.round(dx + center.x) + ',' + Math.round(dy + center.y);
		};

		for(row = rowMod + zoom - 1; row >= rowMod; row--){
			thisRow = row - rowMod;
			for(column = colMod + zoom - 1; column >= colMod; column--){
				
				//first iteration & column is even? set evenStagger
				if(
					column == (colMod + zoom - 1) && 
					row == (rowMod + zoom - 1) && 
					column % 2 == 0
				){
					evenStagger = true;
				}

				//setup
				thisColumn = column - colMod;
				var columnOffset = zoom - thisColumn;
				var rowOffset = zoom - thisRow;
				
				//center
				center = {
					x: Math.round(
						(-.45 + 1.49 * columnOffset) * radius
					), 
					y: Math.round(
						height * (-.90 + rowOffset * 2 + ((evenStagger ? columnOffset + 1 : columnOffset) % 2))
					)
				};

				//make the SVG
				createSVG('polygon').attr({
					points: [
						toPoint(-1 * radius / 2, -1 * height),
						toPoint(radius / 2, -1 * height),
						toPoint(radius, 0),
						toPoint(radius / 2, height),
						toPoint(-1 * radius / 2, height),
						toPoint(-1 * radius, 0)
					].join(' '),
					'class':cssClass + 
						(data.hasOwnProperty(column+'-'+row) ? ' ' + data[column+'-'+row]['terrain'] : 'Undiscovered'),
					tabindex:1,
					'data-toggle':"tooltip",
					'title': (data[column+'-'+row]['fiefdom'] != null ?
								(data[column+'-'+row]['fiefdom']['name'] != null ? 
									data[column+'-'+row]['fiefdom']['name'] + ((data[column+'-'+row]['fief'] && data[column+'-'+row]['fief']['name'] != null) || data[column+'-'+row]['name'] != null ? ': ' : '') :
									'')
								: '') +
							(data[column+'-'+row]['fief'] != null && data[column+'-'+row]['fief']['name'] != null ? 
								(data[column+'-'+row]['fief']['name'] + (data[column+'-'+row]['name'] != null ? ': ' : '')) : 
								'') +
							(data[column+'-'+row]['name'] != null ? 
								data[column+'-'+row]['name'] : 
								'')
				})
				.html("<title>" + (data[column+'-'+row]['id'] != '' ? data[column+'-'+row]['id'] + ' - ' : '') + 'Long: ' + column + " x Lat: " + row + "</title>")
				.appendTo(svgParent)
				.data({center:center, row:row, column:column, territory_id:data[column+'-'+row]['id']})
				.on('click', hexClick)
				.on({
				    mouseenter: hexHoverOn,
				    mouseleave: hexHoverOff
				})
				.attr({
					'hex-row': row, 
					'hex-column': column, 
					'fiefdom': data.hasOwnProperty(column+'-'+row) && data[column+'-'+row]['fiefdom'] ? data[column+'-'+row]['fiefdom']['id'] : ''
				});

				//cs
				var left = center.x + 5;
				var top = center.y - 10;
				if(data.hasOwnProperty(column+'-'+row) && data[column+'-'+row].hasOwnProperty('cs') && data[column+'-'+row]['cs'] > 0){
					$(this).append('<img class="hex-castle" style="left: ' + left + 'px; top: ' + top + 'px;" src="/img/cs' + data[column+'-'+row]['cs'] + '.png"/>');
				}else{
					$(this).append('<img class="hex-castle" style="left: ' + left + 'px; top: ' + top + 'px;" src="/img/cs0.png"/>');
				}
			}
		}
		
		//draw svgs over fiefdoms
		var fiefdoms = [];

		//get all with fief != ''
		$('#mapContainer').find("polygon[fiefdom!='']").each(function(){

			//add to fiefdoms by id
			if(typeof fiefdoms[$(this).attr('fiefdom')] == typeof undefined){
				fiefdoms[$(this).attr('fiefdom')] = [];
			}
			
			//add points
			fiefdoms[$(this).attr('fiefdom')].push($(this).attr('points').split(" "));
		});

		//iterate fiefdoms
		for(var fiefdomKey in fiefdoms){
			
			//setup
			var fifdomPoints = traceHex(fiefdoms[fiefdomKey]);
			
			//build polygon w/ points
			createSVG('polygon').attr({
				points: fifdomPoints.join(' '),
				'class':'fiefdomBorder fiefdom' + fiefdomKey.toString().split('').map(Number).reduce(function (a, b){return a + b;}, 0),
				tabindex:1,
				'fiefdomId':fiefdomKey
			})
			.appendTo(svgParent);
		};
		
		//add map controls
		$(this).append('<img src="/img/compass.png" class="compass" usemap="#compassMap">');
		$(this).append('<map name="compassMap"><area shape="poly" coords="0, 0, 40, 40, 80, 0" onclick="mapNorth();" href="#"><area shape="poly" coords="80, 0, 40, 40, 80, 80" onclick="mapEast();" href="#"><area shape="poly" coords="0, 80, 40, 40, 80, 80" onclick="mapSouth();" href="#"><area shape="poly" coords="0, 0, 40, 40, 0, 80" onclick="mapWest();" href="#"></map>');
		if(zoom > 3){
			$(this).append('<img src="/img/zoomPlus.png" class="zoomPlus">');
		}
		if(zoom < 32){
			$(this).append('<img src="/img/zoomMinus.png" class="zoomMinus">');
		}
	});
};

function traceHex(fiefdom){
	
	//startup
	points = [];
	fiefKey = 0;
	pointKey = 0;
	
	//determine last failed check point of first hex in fiefdom, if any
	var tCheck = null;
	for(var tPointKey in fiefdom[0]){
		if(checkPoint(fiefdom[0][tPointKey], 0, fiefdom)){
			tCheck = tPointKey;
		}
	}
	
	//complex area found
	if(tCheck){
		
		//reorganize fiefdom[0] array so that tCheck1 is at point 0, and the order is maintainted
		var nextPoint = (parseInt(tCheck) == 5) ? 0 : parseInt(tCheck) + 1;
		var newStart = fiefdom[0][nextPoint];
		while(fiefdom[0][0] != newStart){
			fiefdom[0].push(fiefdom[0].shift());
		}
	}
	
	//do the things
	fiefdomLoop(fiefdom);
	
	return points;
	
	//init this mess
	function fiefdomLoop(fiefdom){
		
		//setup
		var firstRun = true;
		
		//loop thru fiefs
		while(firstRun || (fiefKey != 0 && pointKey != 0)){
			fiefLoop(fiefdom);
			firstRun = false;
		}
	}
	
	//iterate a given fief's points
	function fiefLoop(fiefdom){
		
		//setup
		var doingFief = fiefKey;
		
		//loop thru points
		while(doingFief == fiefKey && pointKey < fiefdom[fiefKey].length){
			pointLoop(fiefdom);
		}
	}

	//check points for collisions w/ other fiefs in fiefdom
	function pointLoop(fiefdom){

		//add it
		points.push(fiefdom[fiefKey][pointKey]);
		
		//check point against all other fief points
		var check = checkPoint(fiefdom[fiefKey][pointKey], fiefKey, fiefdom);
		
		//if found in another hex
		if(check){
			
			//reorganize fiefdom[check[0]] array so that check1 is at point 0, and the order is maintainted
			var newStart = fiefdom[check[0]][check[1]];
			while(fiefdom[check[0]][0] != newStart){
				fiefdom[check[0]].push(fiefdom[check[0]].shift());
			}
			
			//update 'next' to that hex, second point
			fiefKey = check[0];
			pointKey = 1;

		//if not
		}else{
			
			//next
			pointKey++;
		}
	}

	function checkPoint(point, excludeFiefKey, fiefdom){
		
		//setup
		var checkForPre = point.split(",");
		var checkForA = checkForPre[0] + ',' + checkForPre[1];
		var checkForB = checkForPre[0] + ',' + (parseInt(checkForPre[1]) + 1);
		var checkForC = checkForPre[0] + ',' + (parseInt(checkForPre[1]) - 1);
		var checkForD = (parseInt(checkForPre[0]) + 1) + ',' + checkForPre[1];
		var checkForE = (parseInt(checkForPre[0]) - 1) + ',' + checkForPre[1];
		var checkForF = (parseInt(checkForPre[0]) + 1) + ',' + (parseInt(checkForPre[1]) + 1);
		var checkForG = (parseInt(checkForPre[0]) + 1) + ',' + (parseInt(checkForPre[1]) - 1);
		var checkForH = (parseInt(checkForPre[0]) - 1) + ',' + (parseInt(checkForPre[1]) + 1);
		var checkForI = (parseInt(checkForPre[0]) - 1) + ',' + (parseInt(checkForPre[1]) - 1);
		var checkForJ = checkForPre[0] + ',' + (parseInt(checkForPre[1]) + 2);
		var checkForK = checkForPre[0] + ',' + (parseInt(checkForPre[1]) - 2);
		var checkForL = (parseInt(checkForPre[0]) + 2) + ',' + checkForPre[1];
		var checkForM = (parseInt(checkForPre[0]) - 2) + ',' + checkForPre[1];
		var checkForN = (parseInt(checkForPre[0]) + 2) + ',' + (parseInt(checkForPre[1]) + 2);
		var checkForO = (parseInt(checkForPre[0]) + 2) + ',' + (parseInt(checkForPre[1]) - 2);
		var checkForP = (parseInt(checkForPre[0]) - 2) + ',' + (parseInt(checkForPre[1]) + 2);
		var checkForQ = (parseInt(checkForPre[0]) - 2) + ',' + (parseInt(checkForPre[1]) - 2);
		
		//iterate, excluding given Fief
		for(var fiefKey in fiefdom){
			if(fiefKey == excludeFiefKey){
				continue;
			}
			
			//see if x,y or x-1,y or x+1,y or x,y-1 or x,y+1 exists
			for(var pointKey in fiefdom[fiefKey]){
				if(fiefdom[fiefKey][pointKey] == checkForA || 
				fiefdom[fiefKey][pointKey] == checkForB || 
				fiefdom[fiefKey][pointKey] == checkForC || 
				fiefdom[fiefKey][pointKey] == checkForD || 
				fiefdom[fiefKey][pointKey] == checkForE || 
				fiefdom[fiefKey][pointKey] == checkForF || 
				fiefdom[fiefKey][pointKey] == checkForG || 
				fiefdom[fiefKey][pointKey] == checkForH || 
				fiefdom[fiefKey][pointKey] == checkForI || 
				fiefdom[fiefKey][pointKey] == checkForJ || 
				fiefdom[fiefKey][pointKey] == checkForK || 
				fiefdom[fiefKey][pointKey] == checkForL || 
				fiefdom[fiefKey][pointKey] == checkForM || 
				fiefdom[fiefKey][pointKey] == checkForN || 
				fiefdom[fiefKey][pointKey] == checkForO || 
				fiefdom[fiefKey][pointKey] == checkForP || 
				fiefdom[fiefKey][pointKey] == checkForQ){
					return [
					    fiefKey,
					    pointKey
					];
				}
			}
		}
		return false;
	}
}

function mapNorth(){
	
	//update the parent SVG's data
	var newColumn = $('#mapContainer').data('column');
	var newRow = $('#mapContainer').data('row') + 5;
	$('#mapContainer')
		.data('center', '')
		.data('column', newColumn)
		.data('row', newRow);
	
	//redraw the map
	drawMap();
}

function mapEast(){
	
	//update the parent SVG's data
	var newColumn = $('#mapContainer').data('column') - 5;
	var newRow = $('#mapContainer').data('row');
	$('#mapContainer')
		.data('center', '')
		.data('row', newRow)
		.data('column', newColumn);
	
	//redraw the map
	drawMap();
}

function mapSouth(){
	
	//update the parent SVG's data
	var newColumn = $('#mapContainer').data('column');
	var newRow = $('#mapContainer').data('row') - 5;
	$('#mapContainer')
		.data('center', '')
		.data('row', newRow)
		.data('column', newColumn);
	
	//redraw the map
	drawMap();
}

function mapWest(){
	
	//update the parent SVG's data
	var newColumn = $('#mapContainer').data('column') + 5;
	var newRow = $('#mapContainer').data('row');
	$('#mapContainer')
		.data('center', '')
		.data('row', newRow)
		.data('column', newColumn);
	
	//redraw the map
	drawMap();
}

$('body').on('click', '.zoomPlus', function(e){
	
	//no submit
	e.preventDefault();
	
	//setup
	var context = $(this);

	//figure out newDim
	var newDim = $('#mapContainer').data('zoom') - 2;
	
	//update the parent SVG's data
	if(newDim > 2){
		$('#mapContainer').data('zoom', newDim);
	
		//redraw the map
		drawMap();
	}

	//no clicky!
	return false;
});

$('body').on('click', '.zoomMinus', function(e){
	
	//figure out newDim
	var newDim = $('#mapContainer').data('zoom') + 2;
	
	//update the parent SVG's data
	$('#mapContainer').data('zoom', newDim);
	
	//redraw the map
	drawMap();

	//no clicky!
	return false;
});