$(document).ready(function(){
	$(window).scroll(function(){
		var currentScroll = $(this).scrollTop()
		var nav = $('.nav-menu')
		if(nav.length)
		{
			if(nav.offset().top<currentScroll)
			{
				if($(document).find('.nav-menu-clone').length == 0)
					$('body').append(nav.clone().addClass('nav-menu-clone').addClass('fixed-top'))
			}
			else if(nav.offset().top > currentScroll)
			{
				$('.nav-menu-clone').remove()
			}	
		}	
	})
})
