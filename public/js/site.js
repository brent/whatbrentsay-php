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
	
	/*
	$('.current_bit a').on({
		ajaxStart: function() {
			$(this).addClass('loading');
			$(this).text('');
		},
		ajaxStop: function() {
			$(this).removeClass('loading');
		}
	});
	*/
	
	$('a.pagination').click(function(){
		
		if($(this).hasClass('next')) {
			var direction = 'next';
		} else {
			var direction = 'prev';
		}
		
		var bit = $(this).parent().attr('id');
		var bit_parts = bit.split('_');
		var bit = bit_parts.pop();
		
		var dataString = 'current_id='+bit+'&direction='+direction;
		
		$('.current_bit a').addClass('loading');
		$('.current_bit a').text('');
		
		$.ajax({
			
			url: 'public/js/ajax/bit_paginate.php',
			data: dataString,
			dataType: 'json',
			success: function(data) {
				$('.current_bit a').removeClass('loading');
				$('.bits_container').attr('id', 'bits_'+data.id);
				$('.current_bit a').attr('href', data.dir);
				$('.current_bit a').text('Bit '+data.id+": "+data.title);
			}
			
		});
		
		return false;
		
	});
		
});