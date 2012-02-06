<?php

class Load {
	
	public function view($view, $data=NULL) {
		
		if(is_array($data)) {			
			extract($data);
			include(VIEWS.DS.$view);
		} else {
			echo "Error loading template";
		}
		
	}

}

$load = new Load();