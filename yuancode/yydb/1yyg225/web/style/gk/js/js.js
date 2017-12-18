$(document).ready(function(){
	var $container = $('#WA');
	
	$container.imagesLoaded(function(){
		$container.masonry({
			itemSelector: '.item',
			columnWidth: 4,
            isAnimated: true
		});
	});
	

	
});

/*$( newElements ).find('.p2').each(function(){
	var mood_id = $(this).attr('_mood');
	var id = 7;
	$.getJSON('/index.php?m=mood&c=index&a=post02&id='+mood_id+'&k='+id+'&'+Math.random()+'&callback=?', function(data){
		if(data.status==1)	{
			$('#mood'+mood_id).html(data.data);
		}
	})
})*/