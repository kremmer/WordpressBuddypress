// Avoid `console` errors in browsers that lack a console.
"use strict";

jQuery(document).ready(function(){


	//dragable mobile
	var drag;
	if(jQuery(window).width()<796){drag=false;}else{drag=true;}

	/* Color Picker */

	  //demo
	 jQuery('.picker-btn').click(function(){
	  if(jQuery('.color-picker').css('right')=='0px'){
	   jQuery('.color-picker').animate({ "right": "-223px" }, "slow" );
	  }else{
	   jQuery('.color-picker').animate({ "right": "0px" }, "slow" );
	  }
	 });
    setTimeout(function(){
    jQuery('.color-picker').animate({ "right": "-223px" }, "slow" );}, 4000);

	var currentColor = 'red';
	jQuery('body').addClass(currentColor);

	jQuery('.picker-blue').click(function(){
		jQuery('body').removeClass(currentColor);
		jQuery('body').addClass('blue');
		currentColor='blue';
		loadjscssfile(currentColor);
	});
	jQuery('.picker-black').click(function(){
		jQuery('body').removeClass(currentColor);
		jQuery('body').addClass('black');
		currentColor='black';
		loadjscssfile(currentColor);
	});
	jQuery('.picker-green').click(function(){
		jQuery('body').removeClass(currentColor);
		jQuery('body').addClass('green');
		currentColor='green';
		loadjscssfile(currentColor);
	});
	jQuery('.picker-yellow').click(function(){
		jQuery('body').removeClass(currentColor);
		jQuery('body').addClass('yellow');
		currentColor='yellow';
		loadjscssfile(currentColor);
	});
	jQuery('.picker-red').click(function(){
		jQuery('body').removeClass(currentColor);
		jQuery('body').addClass('red');
		currentColor='red';
		loadjscssfile(currentColor);
	});
	jQuery('.picker-turquoise').click(function(){
		jQuery('body').removeClass(currentColor);
		jQuery('body').addClass('turquoise');
		currentColor='turquoise';
		loadjscssfile(currentColor);
	});
	jQuery('.picker-purple').click(function(){
		jQuery('body').removeClass(currentColor);
		jQuery('body').addClass('purple');
		currentColor='purple';
		loadjscssfile(currentColor);
	});
	jQuery('.picker-orange').click(function(){
		jQuery('body').removeClass(currentColor);
		jQuery('body').addClass('orange');
		currentColor='orange';
		loadjscssfile(currentColor);
	});
	jQuery('.light-version').click(function(){
		jQuery('body').addClass('light');
	});
	jQuery('.dark-version').click(function(){
		jQuery('body').removeClass('light');
	});

	function loadjscssfile(filename){
		var fileref=document.createElement("link")
		fileref.setAttribute("rel", "stylesheet")
		fileref.setAttribute("type", "text/css")
		fileref.setAttribute("href", 'http://jellythemes.com/themes/sonoramawp/wp-content/themes/sonorama/css/color/' + filename + '.css')

		document.getElementsByTagName("head")[0].appendChild(fileref)
	}
	/* End */
	});