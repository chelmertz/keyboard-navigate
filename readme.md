#keyboard-navigate

Lightweight plugin to apply keyboard supported navigation through commonly used hotkeys.

## Demo

	<ul>
		<li>Current page</li>
		<li><a class="next" href="page2.html">Page 2</a></li>
	</ul>

could be translated with `$('ul').keyboardNavigate()`.

This would let **<kbd>&rarr;</kbd>**, **<kbd>n</kbd>** or **<kbd>j</kbd>** go to page2.

## Syntax

You need to place some **extra markup** to your navigational elements. Let us take that previous example to the next step:

	<div>
		<a class="up" href="/">Home</a>
		<ul>
			<li><a class="previous" href="?page=2">Previous</a></li>
			<li>Previous<li>
			<li><a class="next" href="?page=3">Next</a></li>
		</ul>
	</div>

To set it off, you would need to call it on the containing element `$('div').keyboardNavigate()`. **<kbd>esc</kbd>**, for example, would trigger a call to the href of the *Home*-element.

Full syntax:

  - Next: j, n or &rarr;

  - Previous: k, p or &larr;

  - Up one level: &uarr; or esc
  
 - Down one level: &darr;

## Options

You can provide the following options when initializing the plugin:

  - `callback = function(keyPressed, keyMap, event)`

    - (int) keyPressed

    - (object) keyMap

    - (object) event

  - `keyMap`

    - (object)

The initialization would then follow the signature `$('#navigation_container').keyboardNavigate({ callback: function() {}, keyMap: {}});`
