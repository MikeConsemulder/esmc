/*
 Landed by HTML5 UP
 html5up.net | @n33co
 Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
 */

(function($) {
	"use strict";

	skel.breakpoints({
		xlarge: '(max-width: 1680px)',
		large: '(max-width: 1280px)',
		medium: '(max-width: 980px)',
		small: '(max-width: 736px)',
		xsmall: '(max-width: 480px)'
	});

	$(function() {

		var	$window = $(window),
			$body = $('body');

		// Disable animations/transitions until the page has loaded.
		$body.addClass('is-loading');

		$window.on('load', function() {
			window.setTimeout(function() {
				$body.removeClass('is-loading');
			}, 0);
		});

		// Touch mode.
		if (skel.vars.mobile)
			$body.addClass('is-touch');

		// Fix: Placeholder polyfill.
		$('form').placeholder();

		// Prioritize "important" elements on medium.
		skel.on('+medium -medium', function() {
			$.prioritize(
				'.important\\28 medium\\29',
				skel.breakpoint('medium').active
			);
		});

		// Scrolly links.
		$('.scrolly').scrolly({
			speed: 800
		});

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

		// Parallax.
		// Disabled on IE (choppy scrolling) and mobile platforms (poor performance).
		if (skel.vars.browser == 'ie'
			||	skel.vars.mobile) {

			$.fn._parallax = function() {

				return $(this);

			};

		}
		else {

			$.fn._parallax = function() {

				$(this).each(function() {

					var $this = $(this),
						on, off;

					on = function() {

						$this
							.css('background-position', 'center 0px');

						$window
							.on('scroll._parallax', function() {

								var pos = parseInt($window.scrollTop()) - parseInt($this.position().top);

								$this.css('background-position', 'center ' + (pos * -0.15) + 'px');

							});

					};

					off = function() {

						$this
							.css('background-position', '');

						$window
							.off('scroll._parallax');

					};

					skel.on('change', function() {

						if (skel.breakpoint('medium').active)
							(off)();
						else
							(on)();

					});

				});

				return $(this);

			};

			$window
				.on('load resize', function() {
					$window.trigger('scroll');
				});

		}

		// Spotlights.
		var $spotlights = $('.spotlight');

		$spotlights
			._parallax()
			.each(function() {

				var $this = $(this),
					on, off;

				on = function() {

					// Use main <img>'s src as this spotlight's background.
					$this.css('background-image', 'url("' + $this.find('.image.main > img').attr('src') + '")');

					// Enable transitions (if supported).
					if (skel.canUse('transition')) {

						var top, bottom, mode;

						// Side-specific scrollex tweaks.
						if ($this.hasClass('top')) {

							mode = 'top';
							top = '-20%';
							bottom = 0;

						}
						else if ($this.hasClass('bottom')) {

							mode = 'bottom-only';
							top = 0;
							bottom = '20%';

						}
						else {

							mode = 'middle';
							top = 0;
							bottom = 0;

						}

						// Add scrollex.
						$this.scrollex({
							mode:		mode,
							top:		top,
							bottom:		bottom,
							initialize:	function(t) { $this.addClass('inactive'); },
							terminate:	function(t) { $this.removeClass('inactive'); },
							enter:		function(t) { $this.removeClass('inactive'); },

							// Uncomment the line below to "rewind" when this spotlight scrolls out of view.

							//leave:	function(t) { $this.addClass('inactive'); },

						});

					}

				};

				off = function() {

					// Clear spotlight's background.
					$this.css('background-image', '');

					// Disable transitions (if supported).
					if (skel.canUse('transition')) {

						// Remove scrollex.
						$this.unscrollex();

					}

				};

				skel.on('change', function() {

					if (skel.breakpoint('medium').active)
						(off)();
					else
						(on)();

				});

			});

		// Wrappers.
		var $wrappers = $('.wrapper');

		$wrappers
			.each(function() {

				var $this = $(this),
					on, off;

				on = function() {

					if (skel.canUse('transition')) {

						$this.scrollex({
							top:		250,
							bottom:		0,
							initialize:	function(t) { $this.addClass('inactive'); },
							terminate:	function(t) { $this.removeClass('inactive'); },
							enter:		function(t) { $this.removeClass('inactive'); },

							// Uncomment the line below to "rewind" when this wrapper scrolls out of view.

							//leave:	function(t) { $this.addClass('inactive'); },

						});

					}

				};

				off = function() {

					if (skel.canUse('transition'))
						$this.unscrollex();

				};

				skel.on('change', function() {

					if (skel.breakpoint('medium').active)
						(off)();
					else
						(on)();

				});

			});

		// Banner.
		var $banner = $('#banner');

		$banner
			._parallax();


		// Methods/polyfills.

		// classList | (c) @remy | github.com/remy/polyfills | rem.mit-license.org
		!function(){function t(t){this.el=t;for(var n=t.className.replace(/^\s+|\s+$/g,"").split(/\s+/),i=0;i<n.length;i++)e.call(this,n[i])}function n(t,n,i){Object.defineProperty?Object.defineProperty(t,n,{get:i}):t.__defineGetter__(n,i)}if(!("undefined"==typeof window.Element||"classList"in document.documentElement)){var i=Array.prototype,e=i.push,s=i.splice,o=i.join;t.prototype={add:function(t){this.contains(t)||(e.call(this,t),this.el.className=this.toString())},contains:function(t){return-1!=this.el.className.indexOf(t)},item:function(t){return this[t]||null},remove:function(t){if(this.contains(t)){for(var n=0;n<this.length&&this[n]!=t;n++);s.call(this,n,1),this.el.className=this.toString()}},toString:function(){return o.call(this," ")},toggle:function(t){return this.contains(t)?this.remove(t):this.add(t),this.contains(t)}},window.DOMTokenList=t,n(Element.prototype,"classList",function(){return new t(this)})}}();

		// canUse
		window.canUse=function(p){if(!window._canUse)window._canUse=document.createElement("div");var e=window._canUse.style,up=p.charAt(0).toUpperCase()+p.slice(1);return p in e||"Moz"+up in e||"Webkit"+up in e||"O"+up in e||"ms"+up in e};

		// window.addEventListener
		(function(){if("addEventListener"in window)return;window.addEventListener=function(type,f){window.attachEvent("on"+type,f)}})();


		// Slideshow Background.
		(function() {
			// Settings.
			var settings = {

				// Images (in the format of 'url': 'alignment').
				images: {
					'http://esmc.nl/wp-content/themes/esmc/images/pic_4.jpg': 'center',
					'http://esmc.nl/wp-content/themes/esmc/images/pic_1.jpg': 'center',
					'http://esmc.nl/wp-content/themes/esmc/images/pic_2.jpg': 'center',
					'http://esmc.nl/wp-content/themes/esmc/images/pic_3.jpg': 'center'
				},

				// Delay.
				delay: 6000

			};

			// Vars.
			var	pos = 0, lastPos = 0,
				$wrapper, $bgs = [], $bg,
				k, v;

			// Create BG wrapper, BGs.
			$wrapper = document.createElement('div');
			$wrapper.id = 'bg';
			document.getElementById("banner").appendChild($wrapper);

			for (k in settings.images) {

				// Create BG.
				$bg = document.createElement('div');
				$bg.style.backgroundImage = 'url("' + k + '")';
				$bg.style.backgroundPosition = settings.images[k];
				document.getElementById("bg").appendChild($bg);

				// Add it to array.
				$bgs.push($bg);

			}

			// Main loop.
			$bgs[pos].classList.add('visible');
			$bgs[pos].classList.add('top');

			// Bail if we only have a single BG or the client doesn't support transitions.
			if ($bgs.length == 1
				||	!canUse('transition'))
				return;

			window.setInterval(function() {

				lastPos = pos;
				pos++;

				// Wrap to beginning if necessary.
				if (pos >= $bgs.length)
					pos = 0;

				// Swap top images.
				$bgs[lastPos].classList.remove('top');
				$bgs[pos].classList.add('visible');
				$bgs[pos].classList.add('top');

				// Hide last image after a short delay.
				window.setTimeout(function() {
					$bgs[lastPos].classList.remove('visible');
				}, settings.delay / 2);

			}, settings.delay);

		})();

	});

	$('.googleMap').ClassyMap();

})(jQuery);
