/* Dynamic Window Ajax Content */
"use strict";

var $actual= null;
var obert=false;
jQuery(".open-disc").click(function() {
		obre(jQuery(this).attr('id'));
		$actual=jQuery(this);
});

function obre(quin){
jQuery.ajax({
	url: quin,
	success: function(data) {
		jQuery('.project-content').html(data);
		jQuery(".project-content").hide(0)
		jQuery('.project-window').hide(0)
		tanca();
		jQuery("html, body").animate({ scrollTop: jQuery('#project-show').offset().top - (200) }, 300, function(){
			jQuery('.project-window').show(0);
			jQuery('.project-window').css('height','0');
			jQuery('.project-window').animate({height:'auto'}, 500,function(){
				jQuery('.project-window').css('height','auto'); /*jQuery('.project-window').css('height','auto');*/
				jQuery(".project-content").fadeIn("slow");
			});
		});
	}
});
}

function tanca(){
	jQuery(".close-btn").click(function() {
		jQuery(".project-window").slideUp("slow");
		jQuery(".project-content").fadeOut("slow");
		jQuery("html, body").animate({ scrollTop: jQuery('.discography').offset().top -(50) }, 1000);
		obert=false;
	});
}