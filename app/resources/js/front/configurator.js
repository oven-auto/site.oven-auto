$(document).ready(function(){
	var basePrice = parseInt($('.config-price').attr('data-price'))
	$(document).on('click','.color-btn',function(){
		var me = $(this)
		var packIds = me.attr('data-pack')
		var idArray = packIds.split('-')
		$('.color-pack').prop('checked',false)
		idArray.forEach(function(item,i){
			if($('.color-pack').val() == item)
				$('.color-pack[value="'+item+'"]').prop('checked',true)
		})
		addPrice()
	})

	$(document).on('click','.config-pack',function(){
		addPrice()
	})

	function addPrice()
	{
		var sum = 0
		$('.config-pack').each(function(){
			if($(this).prop('checked') == true)
				sum+=parseInt($(this).attr('data-pack-price'))
		})
		sum+=basePrice
		$('.config-price').html(number_format(sum,0,'',' ')+' руб.')
	}
})