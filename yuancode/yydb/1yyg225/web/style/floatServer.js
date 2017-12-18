// JavaScript Document
$(document).ready(function(){
	$(window).scroll(function(){
		nowtop = parseInt($(document).scrollTop());	
		$('#cleft_box').css('top', nowtop + 158 + 'px')
	})
	$('#cleft_box').hover(function(){
		$(this).css('width','158px');
	},function(){
		$(this).css('width','32px');
	})	
	$('#toTop').click(function(){
		$(document).scrollTop(0);	
	})
})