jQuery.fn.keyboardNavigate = function(options) {
	var navigationContainer = this;

	if(!this.has('a').length) {
		return this;
	}

	var settings = {
		callback: function(keyPressed, keyMap, event) {
			if(!$.inArray(keyPressed, keyMap)) {
				return;
			}
			var affectedElement = navigationContainer.find('a.'+keyMap[keyPressed]);
			if(affectedElement.length) {
				window.location.href = affectedElement.attr('href');
			}
		},
		keyMap: {
			39: 'next', // right
			37: 'previous', // left
			38: 'up', // up
			40: 'down', // down
			80: 'previous', // p
			27: 'up', // esc
			78: 'next', // n
			74: 'next', // j
			75: 'previous' // k
		}
	};

	if(options) {
		$.extend(settings, options);
	}

	$('body').keydown(function(event) {
		var keyPressed = event.which;
		settings.callback(keyPressed, settings.keyMap, event);
	});

	return this;
};
