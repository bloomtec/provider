// JavaScript Document
$(document).ready(
	function(e) {
    	$('#cycle').cycle({ 
   			fx:     'fade', 
    		speed:  'fast', 
    		timeout: 4000, 
    		next:   '#next', 
    		prev:   '#prev',
			pager:  '#nav' 
		});
	}
);