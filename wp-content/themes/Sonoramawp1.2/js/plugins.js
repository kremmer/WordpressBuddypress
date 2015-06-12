"use strict";

// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Plugins
jQuery(document).ready(function($) {

	/* Portfolio Gallery - Isotope Filtering */
	var container = jQuery('#i-portfolio');
	container.isotope({
		animationEngine : 'best-available',
		animationOptions: {
			duration: 200,
			queue: false
		},
		layoutMode: 'fitRows'
	});

	function splitColumns() {
	var winWidth = jQuery(window).width(),
		columnNumb = 1;
	if (winWidth > 1800) {
		columnNumb = 6;
	}
	else if (winWidth > 1300) {
		columnNumb = 6;
	} else if (winWidth > 900) {
		columnNumb = 5;
	} else if (winWidth > 600) {
		columnNumb = 4;
	} else if (winWidth > 300) {
		columnNumb = 2;
	}
	return columnNumb;
	}

	function setColumns() {
	var winWidth = jQuery(window).width(),
		columnNumb = splitColumns(),
		postWidth = Math.floor(winWidth / columnNumb);
	container.find('.element').each(function () {
		jQuery(this).css( {
			width : postWidth + 'px'
		});
	});
	}
	function setProjects() {
	setColumns();
	container.isotope('reLayout');
	}
	function loadIsotope(){
	container.imagesLoaded(function () {setProjects();});
	setProjects();
	}
	// Resize portfolio grid when window size changes
	var doit;
	jQuery(window).bind('resize', function () {
		clearTimeout(doit);
		doit = setTimeout(resizedw, 1000);
	});
	function resizedw(){
		setProjects();
	}
	loadIsotope();// end Portfolio Isotope

	/* Call HoverDir Portfolio RollOver */
	function loadHoverDir(){
		jQuery(' #i-portfolio > .ch-grid').each( function() { jQuery(this).hoverdir({
			hoverDelay : 5
		}); } );
	}
	loadHoverDir()

	/* Main Menu Section Selector */
	function loadMenuSelector(){
		jQuery('.main-menu').onePageNav({
			begin: function() {
			console.log('start');
			},
			end: function() {
			console.log('stop');
			},
		scrollOffset: 150 // header Height
		});
	}
    jQuery('.main-menu li.current-menu-item').addClass('current');
	loadMenuSelector()

	function loadsuperslides(){
      jQuery('.slides-1').superslides({
        hashchange: false,
        animation: 'fade',
		play: 10000,
		pagination: false
      });
	}
	loadsuperslides();

	/* FancyBox */
	jQuery(".fancybox").fancybox();
	/*  Media helper. Group items, disable animations, hide arrows, enable media and button helpers */
	jQuery('.fancybox-media')
		.attr('rel', 'media-gallery')
		.fancybox({
			openEffect : 'none',
			closeEffect : 'none',
			prevEffect : 'none',
			nextEffect : 'none',

			arrows : false,
			helpers : {
				media : {},
				buttons : {}
			}
		});

	/* Audio Player */
      function loadAudio(){
        // Setup the player to autoplay the next track
        var a = audiojs.createAll({
          trackEnded: function() {
            var next = jQuery('ol li.playing').next();
            if (!next.length) next = jQuery('ol li').first();
            next.addClass('playing').siblings().removeClass('playing');
            audio.load(jQuery('a', next).attr('data-src'));
            audio.play();
          }
        });

        // Load in the first track
		var first;
		var track;

        var audio = a[0];
            first = jQuery('ol a').attr('data-src');
			track = jQuery('ol a').attr('data-track');
        jQuery('ol li').first().addClass('playing');
		jQuery('.artist').html(track);
        if (typeof audio != 'undefined') {
            audio.load(first);
        }

        // Load in a track on click
        jQuery('ol li').click(function(e) {
          e.preventDefault();
          jQuery(this).addClass('playing').siblings().removeClass('playing');
          audio.load(jQuery('a', this).attr('data-src'));
          audio.play();
        });
        // Keyboard shortcuts
        /*jQuery(document).keydown(function(e) {
          var unicode = e.charCode ? e.charCode : e.keyCode;
             // right arrow
          if (unicode == 39) {
            var next = jQuery('li.playing').next();
            if (!next.length) next = jQuery('ol li').first();
            next.click();
            // back arrow
          } else if (unicode == 37) {
            var prev = jQuery('li.playing').prev();
            if (!prev.length) prev = jQuery('ol li').last();
            prev.click();
            // Shift
          } else if (unicode == 16) {
            audio.playPause();
          }
        })*/
		// buttons
		jQuery(".prev-track").click(function(){
			var prev = jQuery('li.playing').prev();
            if (!prev.length) prev = jQuery('ol li').last();
            prev.click();
			track = jQuery('.playing a').attr('data-track');
			jQuery('.artist').html(track);
		})
		jQuery(".next-track").click(function(){
			var next = jQuery('li.playing').next();
            if (!next.length) next = jQuery('ol li').first();
            next.click()
			track = jQuery('.playing a').attr('data-track');
			jQuery('.artist').html(track);
		})
	}
	if (jQuery('.audio-player').length>0 )
		loadAudio();

	/* Parallax */
	function loadParallax(){
	jQuery('.parallax').scrolly({bgParallax: true});
	};
	//loadParallax()

	/* Google Analytics: change UA-XXXXX-X to be your site's ID. */
	(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
	function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
	e=o.createElement(i);r=o.getElementsByTagName(i)[0];
	e.src='//www.google-analytics.com/analytics.js';
	r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
	ga('create','UA-XXXXX-X');ga('send','pageview');

});// end Plugins
