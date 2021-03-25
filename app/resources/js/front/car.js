$(document).ready(function(){
	$(window).scroll(function(){
		var currentScroll = $(this).scrollTop()
		var nav = $('.nav-menu')
		var block = $('.car-header-info')
		if(block.length)
		{
			var blockTopPoint = block.offset().top
			if(currentScroll > blockTopPoint)
			{
				if($('.fixed-car-header-info').length == 0)
				{
					$('body').append(block
						.clone()
						.css({
							'position':'fixed',
							'top':nav.height()+'px',
							'left':block.parent().offset().left+30+'px',
							'width':block.parent().width()+'px'
						})
						.addClass('fixed-car-header-info')
						.removeClass('car-header-info')
						.removeClass('py-1')
					)
				}
			}
			else
			{
				$('.fixed-car-header-info').remove()
			}
		}
	})
})