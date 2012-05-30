$(document).ready(function() {
	
	var all_bits;
		
	$('.article').hover(function(){
	
		var metaHeight = $(this).children('.metadata').outerHeight();
	
		$(this).children('.thumb').animate({
			bottom: metaHeight
		}, 200);
	
	}, function() {
	
		$(this).children('.thumb').animate({
			bottom: 0
		}, 200);
	
	});
	
	$('a.pagination').click(function(){
		
		var currnet_bit_title = $('.current_bit a').text();
		$('.current_bit a').text('');
		$('.current_bit a').addClass('loading');
		
		var bit_id_string = $(this).parent().attr('id'),
			bit_parts = bit_id_string.split('_'),
			bit_id = bit_parts.pop();
				
		if(typeof all_bits === 'undefined') {

			$.ajax({
				url: 'public/js/ajax/bit_paginate.php',
				dataType: 'json',
				async: false,
				success: function(data) { all_bits = data; }
			});
			
		}
		
		var new_bit_id;
		
		if($(this).hasClass('next')) {
			new_bit_id = parseInt(bit_id) + 1 - 1;
		} else if ($(this).hasClass('prev')) {
			new_bit_id = parseInt(bit_id) - 1 - 1;
		} else {
			new_bit_id = null;
		}
		
		if(new_bit_id === null || typeof all_bits[new_bit_id] === 'undefined') {
			
			$('.current_bit a').text(currnet_bit_title);
			
		} else {	
			
			$('.bits_container').attr('id', 'bit_'+all_bits[new_bit_id].id);
			$('.current_bit a').attr('href', all_bits[new_bit_id].dir);
			$('.current_bit a').text('Bit '+all_bits[new_bit_id].id+': '+all_bits[new_bit_id].title);
		
		}
		
		$('.current_bit a').removeClass('loading');

		return false;
				
	});
		
});