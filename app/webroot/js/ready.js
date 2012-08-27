// JavaScript Document
$(document).ready(function(e) {
	$('#cycle').cycle({
		fx : 'fade',
		speed : 'fast',
		timeout : 4000,
		next : '#banner-next',
		prev : '#banner-prev',
		pager : '#banner-nav'
	});
}); 