/*global $, document*/
$.fn.hexGridWidget = function (radius, columns, colMod, rows, rowMod, cssClass, data) {
	'use strict';
	var createSVG = function (tag) {
		return $(document.createElementNS('http://www.w3.org/2000/svg', tag || 'svg'));
	};

	return $(this).each(function () {
		var element = $(this),
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
			width: (1.5 * columns  +  0.5) * radius,
			height: (2 * rows  +  1) * height
		}),
		column,
		thisColumn,
		row,
		thisRow,
		center,
		toPoint = function (dx, dy) {
			return Math.round(dx + center.x) + ',' + Math.round(dy + center.y);
		};

		for(row = rowMod + rows - 1; row >= rowMod; row--){
			thisRow = row - rowMod;
			for(column = colMod + columns -1; column >= colMod; column--){

				//setup
				thisColumn = column - colMod;
				center = {x:Math.round((-.45 + 1.49 * (columns - thisColumn)) * radius), y: Math.round(height * (-.90 + (rows - thisRow) * 2 + ((columns - thisColumn) % 2)))};

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
						(data.hasOwnProperty(column+'-'+row) ? ' ' + data[column+'-'+row]['terrain'] : 'Undiscovered')
						+ (data.hasOwnProperty(column+'-'+row) && data[column+'-'+row]['fiefdom'] ? ' fief' + data[column+'-'+row]['fiefdom']['id'].toString().split('').map(Number).reduce(function (a, b){return a + b;}, 0) : ''),
					tabindex:1,
					'data-toggle':"tooltip",
					'title': data[column+'-'+row]['name']
				})
				.html(data.hasOwnProperty(column+'-'+row) && data[column+'-'+row]['fiefdom'] ? "<title>" + data[column+'-'+row]['fiefdom']['name'] + "</title>" : '')
				.appendTo(svgParent)
				.data({center:center, row:row, column:column})
				.on('click', hexClick)
				.on({
				    mouseenter: hexHoverOn,
				    mouseleave: hexHoverOff
				})
				.attr({'hex-row': row, 'hex-column': column});

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
	});
};