/**
 * Created by Mike on 02-Dec-16.
 */
	alert('yo');
    var $body = $('#titleBar');
	/**
	 * Generate an indented list of links from a nav. Meant for use with panel().
	 * @return {jQuery} jQuery object.
	 */
	$.fn.navList = function() {

		var	$this = $(this);
		$a = $this.find('a'),
			b = [];

		$a.each(function() {

			var	$this = $(this),
				indent = Math.max(0, $this.parents('li').length - 1),
				href = $this.attr('href'),
				target = $this.attr('target');

			b.push(
				'<a ' +
				'class="link depth-' + indent + '"' +
				( (typeof target !== 'undefined' && target != '') ? ' target="' + target + '"' : '') +
				( (typeof href !== 'undefined' && href != '') ? ' href="' + href + '"' : '') +
				'>' +
				'<span class="indent-' + indent + '"></span>' +
				$this.text() +
				'</a>'
			);

		});

		return b.join('');

	};


// Dropdowns.
	$('#nav > ul').dropotron({
		alignment: 'right',
		hideDelay: 350
	});

// Off-Canvas Navigation.

// Title Bar.

	$(
		'<div id="titleBar">' +
		'<a href="#navPanel" class="toggle"></a>' +
		'<span class="title">' + $('#logo').html() + '</span>' +
		'</div>'
	)
		.appendTo($body);
// Navigation Panel.
	$(
		'<div id="navPanel">' +
		'<nav>' +
		$('#nav').navList() +
		'</nav>' +
		'</div>'
	)
		.appendTo($body)
		.panel({
			delay: 500,
			hideOnClick: true,
			hideOnSwipe: true,
			resetScroll: true,
			resetForms: true,
			side: 'left',
			target: $body,
			visibleClass: 'navPanel-visible'
		});

// Fix: Remove navPanel transitions on WP<10 (poor/buggy performance).
	if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
		$('#titleBar, #navPanel, #page-wrapper')
			.css('transition', 'none');
