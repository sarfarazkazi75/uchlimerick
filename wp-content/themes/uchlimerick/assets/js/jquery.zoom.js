var $ = jQuery;
jQuery(document).ready(function(){

	if($(window).width() >= 992) { 
		$(".light-box-image a")
		// tile mouse actions
		.on("mouseover", function() {
			$(this)
			.children(".zoomImg")
			.css({ transform: "scale(" + $(this).attr("data-scale") + ")" });
		})
		.on("mouseout", function() {
			$(this)
			.children(".zoomImg")
			.css({ transform: "scale(1)" });
		})
		.on("mousemove", function(e) {
			$(this)
			.children(".zoomImg")
			.css({
				"transform-origin":
				((e.pageX - $(this).offset().left) / $(this).width()) * 100 +
				"% " +
				((e.pageY - $(this).offset().top) / $(this).height()) * 100 +
				"%"
			});
		});


	}


});