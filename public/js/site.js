$(document).ready(function() {
									
	$(".article").hover(function(){
	
		var metaHeight = $(this).children(".metadata").outerHeight();
	
		$(this).children(".thumb").animate({
			bottom: metaHeight
		}, 200);
	
	}, function() {
	
		$(this).children(".thumb").animate({
			bottom: 0
		}, 200);
	
	});
	
});