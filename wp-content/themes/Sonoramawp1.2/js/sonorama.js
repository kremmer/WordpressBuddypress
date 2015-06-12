"use strict";
	jQuery(document).ready(function () {
		if (jQuery(".player").length>0) { //If there are video backgrounds
            jQuery(".player").mb_YTPlayer();
            jQuery('.player').on("YTPPause",function(){
			   jQuery('.play-video').removeClass('playing');
			});
            jQuery('.player').on("YTPStart",function(){
			   jQuery('.play-video').addClass('playing');
			});
			jQuery('.play-video').on('click', function(e) {
				if (jQuery('.play-video').hasClass('playing')) {
					jQuery(".player").pauseYTP();
				} else {
					jQuery('audio').each(function (i,e) {
			            this.pause(); 
			        });
					jQuery(".player").playYTP();
				}
				
				e.preventDefault();
			});
        }
	});
	/*Validation*/
	jQuery("#contact-form").validate({
		submitHandler: function(form) {
			jQuery(form).ajaxSubmit();
			jQuery('.formSent').show();
		}
	});

	/* Loading */
	jQuery(window).load(function() {
		jQuery(".loader").delay(500).fadeOut();
		jQuery("#mask").delay(1000).fadeOut("slow");
	});

	/* Jump Menu */
	function loadJump(){
		jQuery('.jump-menu').click(function() {
			if(jQuery('#nav2').hasClass('active')){
				jQuery('#nav2').removeClass('active');
			}else{
				jQuery('#nav2').addClass('active');
			}
		})

		jQuery('#nav2 ul li a').click(function(){
			jQuery('#nav2').removeClass('active');
		});
	}loadJump();

	/* News Carousel */
	function loadNewsSlider(){
		var amplecar = jQuery(".last-news-container ul li").length;
		var ampleitem = 300;
		var amplelist = amplecar*ampleitem;
		jQuery('.last-news-container ul').css('width', amplelist)
		//alert(amplelist);

		var index = 0;
		var pos = 1;
		jQuery(".last-news-next").click(function(){
		  if( index != amplecar-4){
			index++;
			jQuery(".news-box").stop().animate({scrollLeft:ampleitem*index},'slow');
		  }
		 });
		jQuery(".last-news-prev").click(function(){
		  if( index!=0 ){
			  index--;
			  jQuery(".news-box").stop().animate({scrollLeft:ampleitem*index},'slow');
		  }
		});
		//alert(amplecar-1)
	}loadNewsSlider() /* end News Carousel */

	/* Menu Anchors */
	jQuery('a[href*=#]').click(function() {
	 if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
		 var $target = jQuery(this.hash);
		 $target = $target.length && $target || jQuery('[name=' + this.hash.slice(1) +']');
		 if ($target.length) {
			 var targetOffset = $target.offset().top;
			 jQuery('html,body').animate({scrollTop: targetOffset-50}, 1000);
			 return false;
			}
		}
	});

	/* Slider AutoChanging Title */
	function loadTitleAnimated(){
		var myInterval;
		var contador = 1;
		var myFunc = function() {
			var cur = jQuery('.main-title ul li').length;
			//alert(contador);
			if(cur == contador) {;
					jQuery('.main-title ul li.t-current').removeClass('t-current');
					jQuery('.main-title ul li').first().addClass('t-current');
					contador = 1;
				} else {
					contador++;
					jQuery('.main-title ul li.t-current').removeClass('t-current').next().addClass('t-current');
				}
		};
		myInterval = setInterval(myFunc, 5000); // Set Animation Interval in Miliseconds
	}loadTitleAnimated()

	/* Dates Carousel */
	/* Caroussel One Images & Two Queues */
	function loadCarousel(){

		var amplecar = jQuery(".dates-wrapper ul li").length;
		var ampleitem = 400;
		var amplelist = amplecar*ampleitem;
		jQuery(".dates-wrapper ul").css('width', amplelist)

		var itemscar= jQuery(".dates-wrapper ul li").length;

		var fragment = document.createDocumentFragment(),
		li = document.createElement('li');
		while (itemscar--) {
			fragment.appendChild(li.cloneNode(true));
		}
		jQuery('.controller ul').append(fragment);

		var index = 0;
		var pos = 1;
		jQuery('.controller ul li:first-child').addClass('selected');

		jQuery(".controller ul li").click(function(){
			ampleitem= 400;
			index = jQuery(this).index();
			jQuery(".dates-wrapper").stop().animate({scrollLeft:ampleitem*index},'slow');
			 jQuery('.controller ul li').removeClass('selected');
			jQuery(this).addClass('selected');
			//alert(ampleitem);
		});
		jQuery(".dates-nav .next").click(function(){
				if( index != jQuery(".controller ul li").size()-1){
				  index++;
				  jQuery(".dates-wrapper").stop().animate({scrollLeft:ampleitem*index},'slow');
				  pos++;
				  jQuery('.controller ul li.selected').removeClass('selected').next().addClass('selected');
			}
		   });
		jQuery(".dates-nav .prev").click(function(){
		  if( index!=0 ){
			  index--;
			  jQuery(".dates-wrapper").stop().animate({scrollLeft:ampleitem*index},'slow');
			  pos--;
			  jQuery('.controller ul li.selected').removeClass('selected').prev().addClass('selected');
		  }
		});
	}
	loadCarousel();

	/* Discography player btns */
    jQuery(document).ajaxComplete(function() {
		jQuery("audio").on("play", function (me) {
			if (jQuery(".player").length>0) jQuery(".player").pauseYTP();
	        jQuery('audio').each(function (i,e) {
	              if (e != me.currentTarget)
	              { 
	                  this.pause(); 
	              }
	        });
	 	});
		jQuery(".btn-play").on('click', function() {
			jQuery(".btn-play").show();
			jQuery(".btn-pause").hide();
			jQuery(this).hide();
			jQuery(".btn-pause").show();
		});

		jQuery(".btn-pause").on('click', function() {
		   jQuery(this).hide();
		   jQuery(".btn-play").show();
		});
	});

	/* Twitter */
	function loadTwitter(){
			var username='vesper_on'; // Insert your twitter Username
			var format='json';
			var url='http://api.twitter.com/1/statuses/user_timeline/'+username+'.'+format+'?callback=?'; // Creamos la URL completa para extraer el último tweet

			/*$.getJSON(url,function(tweet){ // Geting all tweets
			jQuery("#last-tweet").html(tweet[0].text); // cogemos el primer tweet y lo introducimos dentro del div con id last-tweet
	});*/
	}
	loadTwitter();

	 /* end Document Ready Function */
