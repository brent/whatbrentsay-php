(function($) {
    
    $.fn.bigFoot = function() {

        return this.each(function() {        
        
            if($('body').height() < $(window).height()) {
            
                var $expando = $(this), 
                    difference = $(window).height() - ($expando.outerHeight() + $expando.siblings().outerHeight());
                
                $expando.css('height', $expando.outerHeight()+difference);
            
            }

        });            
    
    };
    
})( jQuery );