$(document).ready(function(){
	$(document).on('click','.favorites',function(){
		var me = $(this)
		var url = me.attr('data-url')
		axios.get(url).then(function(response){
			if(response.data.status == 1)
				me.addClass('favorite-checked')
			if(response.data.status == 0)
				me.removeClass('favorite-checked')

			if(response.data.count)
				$('.favorite-count').html(response.data.count)
			else
				$('.favorite-count').html('')
		}).catch(function(error){

		})
	})

	$(window).scroll(function(){
		var currentScroll = $(this).scrollTop()
		var block = $(document).find('.stock-control')
		var form = $('.stock-filter-form')
		var nav = $('.nav-menu')
		if(block.length)
		{
			if(currentScroll > block.offset().top)
			{
				if(form.find('.stock-control-fixed').length == 0)
					form.append(block.clone()
						.addClass('stock-control-fixed')
						.css({'width':'100%','top':nav.height()+'px','left':form.find('.container').offset().left+'px'})
						.removeClass('pt-3')
						.addClass('p-1')
					)
			}
			else
			{
				form.find('.stock-control-fixed').remove()
			}
		}
	})
})