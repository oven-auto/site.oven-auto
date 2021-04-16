window.toOneHeight = function (separator, subHeight = 0){
	var max = 0
	$(document).find(separator).each(function(){
		if($(this).height()>max)
			max = $(this).height()
	})
	if(subHeight)
		max += subHeight
	$(document).find(separator).height(max)
}

$(document).on('click','.complect-filter .dropdown-item',function(){
	var me = $(this)	
	var title = me.html()
	var parent = me.closest('.btn-group')
	var button = parent.find('.btn')
	
	parent.find('.dropdown-item').removeClass('active')
	me.addClass('active')

	button.find('.type-info').html(title)
	button.attr('data-active-id',me.attr('data-type'))

	var obj = {
		motor:$('.complect-filter .motor-btn').attr('data-active-id'),
		transmission:$('.complect-filter .transmission-btn').attr('data-active-id'),
		driver:$('.complect-filter .driver-btn').attr('data-active-id'),
	}
	
	var count = 0
	$('.complect-filter .btn').each(function(){
		if($(this).attr('data-active-id')!='')
			count++
	})

	$(document).find('.item-complect').animate({
	    opacity: 0,
	}, 300)

	setTimeout(() => {  $(document).find('.item-complect').css({'display':'none'})}, 300)
	
	setTimeout(() => {  
		$(document).find('.item-complect').each(function(){
			var motor = $(this).attr('data-motor')
			var transmission = $(this).attr('data-transmission')
			var driver = $(this).attr('data-driver')
			var k = 0

			if(obj.motor!='' && obj.motor==motor)
				k++
			if(obj.transmission!='' && obj.transmission==transmission)
				k++
			if(obj.driver!='' && obj.driver==driver)
				k++

			if(k==count)
			{
				$(this).css({'display':'flex'})
				$(this).animate({
				    opacity: 1,
				}, 300)
			}

		})
	},300)
})
