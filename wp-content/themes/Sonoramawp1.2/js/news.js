/* Dynamic Window Ajax Content */
"use strict";

var $actual2= null;
var obert2=false;
jQuery(".last-news").click(function() {
		obre2(jQuery(this).attr('id'));
		$actual2=jQuery(this);
});

function obre2(quin2){
	jQuery.ajax({
		url: quin2,
		success: function(data) {
			jQuery('.news-content').html(data);
			jQuery(".news-content").hide(0)
			jQuery('.news-window').hide(0)
			tanca2();
			canvia2();
			jQuery("html, body").animate({ scrollTop: jQuery('#news-show').offset().top - (200) }, 500, function(){
				jQuery('.news-window').show(0);
				jQuery('.news-window').css('height','0');
				jQuery('.news-window').animate({height:760}, 1000,function(){
					jQuery('.news-window').css('height','760');
					jQuery(".news-content").fadeIn("slow");
				});
			});
		}
	});
}
/**/
function canvi2(quin2){
	var obert2=true;
	jQuery.ajax({
		url: quin2,
		success: function(data) {
			jQuery('.news-content').html(data);
			tanca2();
			canvia2();
			jQuery("html, body").animate({ scrollTop: jQuery('#news-show').offset().top - (200) }, 500, function(){
				jQuery('.news-window').show(0);
				jQuery('.news-window').animate({height:760}, 1000,function(){
					jQuery('.news-window').css('height','760');
					jQuery(".news-content").fadeIn("slow");
				});
			});
		}
	});
}
/**/
function tanca2(){
	jQuery(".close2-btn").click(function() {
		jQuery(".news-window").slideUp("slow");
		jQuery(".news-content").fadeOut("slow");
		jQuery("html, body").animate({ scrollTop: jQuery('#anchor01').offset().top }, 1000);
		obert2=false;
	});
}
function seguent(){
	if($actual2.next().hasClass('end')){
		jQuery(".news-content").fadeOut("slow");
		$actual2=jQuery(jQuery('.start').next());
	}else{
		jQuery(".news-content").fadeOut("slow");
		$actual2=jQuery($actual2.next());
	}
	if($actual2.hasClass('isotope-hidden')){
		seguent();
	}else{
		jQuery(".news-content").fadeOut("slow");
		canvi2($actual2.attr('id'));
	}
}
function enrera(){
	if($actual2.prev().hasClass('start')){
		jQuery(".news-content").fadeOut("slow");
		$actual2=jQuery(jQuery('.end').prev());
	}else{
		jQuery(".news-content").fadeOut("slow");
		$actual2=jQuery($actual2.prev());
	}

	if($actual2.hasClass('isotope-hidden')){
		enrera();
	}else{
		jQuery(".news-content").fadeOut("slow");
		canvi2($actual2.attr('id'));
	}
}
function canvia2(){
	jQuery('.news-next').click(function() {
		seguent();
	});
	jQuery('.news-prev').click(function() {
		enrera();
	});
}