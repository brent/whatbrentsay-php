$(document).ready(function() {
			
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
		
		$('.current_bit a').text('');
		$('.current_bit a').addClass('loading');
		
		var bit_id_string = $(this).parent().attr('id'),
			bit_parts = bit_id_string.split('_'),
			bit_id = bit_parts.pop();
						
		if(typeof all_bits === 'undefined') {

			var all_bits;

			$.ajax({
				url: 'public/js/ajax/bit_paginate.php',
				dataType: 'json',
				async: false,
				success: function(data) { all_bits = data; }
			});
			
		}
		
		for(i=0; i < all_bits.length; i++) {
			
			if($(this).hasClass('prev') && (all_bits[i].id < bit_id)) {
				console.log(all_bits[i]);
				$('.current_bit a').removeClass('loading');
				$('.bits_container').attr('id', 'bits_'+all_bits[i].id);
				$('.current_bit a').attr('href', all_bits[i].dir);
				$('.current_bit a').text('Bit '+all_bits[i].id+": "+all_bits[i].title);
				break;
			} 
			else if($(this).hasClass('next') && (all_bits[i].id > bit_id)) {
				console.log(all_bits[i]);
				$('.current_bit a').removeClass('loading');
				$('.bits_container').attr('id', 'bits_'+all_bits[i].id);
				$('.current_bit a').attr('href', all_bits[i].dir);
				$('.current_bit a').text('Bit '+all_bits[i].id+": "+all_bits[i].title);
				break;
			} 
			
		} 
		
		return false;
				
	});
		
});