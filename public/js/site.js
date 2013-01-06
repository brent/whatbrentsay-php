$(document).ready(function() {
	
	$('.post.article a').hover(function(){
	
		var metaHeight = $(this).children('.metadata').outerHeight();
	
		$(this).children('.thumb').animate({
			bottom: metaHeight
		}, 200);
	
	}, function() {
	
		$(this).children('.thumb').animate({
			bottom: 0
		}, 200);
	
	});
	
	$('div.pagination a.pagination').click(function() {
		
		var all_bits,
			new_bit_id,
			bit_id = $('div.pagination .current_bit_id').val();
		
		$.ajax({
			url: '../public/js/ajax/bit_paginate.php',
			dataType: 'json',
			async: false,
			success: function(data) { all_bits = data; }
		});
		
		if($(this).hasClass('next')) {
			new_bit_id = parseInt(bit_id) + 1 - 1;
		} else if ($(this).hasClass('prev')) {
			new_bit_id = parseInt(bit_id) - 1 - 1;
		} else {
			new_bit_id = null;
		}
		
		$(this).attr('href', '../'+all_bits[new_bit_id].dir);
							
	});
		
});