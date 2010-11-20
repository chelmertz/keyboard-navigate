jQuery.fn.keyboardNavigate = function(options) {
	var navigationContainer = this;

	if(!this.has('a').length) {
		return this;
	}

	var keyMap = {
		39: 'next', // right
		37: 'previous', // left
		38: 'up', // up
		40: 'down', // down
		80: 'previous', // p
		27: 'up', // esc
		78: 'next', // n
		74: 'next', // j
		75: 'previous' // k
	};

	$('body').keydown(function(event) {
		var keyPressed = event.which;
		if(!$.inArray(keyPressed, keyMap)) {
			return;
		}
		var newHref = navigationContainer.find('a.'+keyMap[keyPressed]).attr('href');
		if(newHref) {
			window.location.href = newHref;
		}
	});

	return this;
};
