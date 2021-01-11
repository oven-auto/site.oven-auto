window.FillAlpha = function(color){
	var back = $('.alpha-back')
	back.css({'background':color})
}

$(document).on('change','#car-tab-add [name="brand_id"]',function(){
	var url = $(this).attr('data-url')
	var parameters = {}
	parameters.brand_id = $(this).val()
	var block = $('.car-mark-add')
	block.find('select').html('')
	$('[name="complect_id"]').html('')
	getRender(url,parameters,block)

	var block = $('#car-option')
	var url = $(this).attr('data-url-option')
	getRender(url,parameters,block)
})

$(document).on('change','#car-tab-add [name="mark_id"]',function(){
	var url = $(this).attr('data-url-complect')
	parameters = {}
	parameters.mark_id = $(this).val()
	var block = $('.car-complect-add')
	block.find('select').html('')
	$('[name="complect_id"]').html('')
	getRender(url,parameters,block)
})

$(document).on('change','#car-tab-add [name="complect_id"]',function(){
	var url = $(this).attr('data-url-carview')
	var parameters = {}
	parameters.complect_id = $(this).val()
	var block = $('#car-view')
	block.html('')
	axios.post(url,parameters).then(function(response){
		if(response.data.status==1)
		{
			block.html(response.data.view)
			FillColorDiv('.car-color')
			$('.car-city').html(response.data.complect.mark.country.city)
		}		
	}).catch(function(error){
		console.log(error)
	})
})

$(document).on('click','.car-color',function(){
	var text = $('.color-name')
	text.html($(this).attr('data-code'))
	FillAlpha($(this).attr('data-color'))
	$('.car-color').removeClass('active')
	$(this).addClass('active')
	$('#car-tab-add [name="color_id"]').val($(this).attr('data-id'))
})

$(document).on('change','#car-tab-add [name="pack_ids[]"]',function(){
	var priceBlock = $('.car-price')
	var carPrice = Number.parseInt(priceBlock.attr('data-price'))
	var itemPackPrice = Number.parseInt($(this).attr('data-price'))

	if($(this).prop('checked'))
		carPrice+=itemPackPrice
	else
		carPrice-=itemPackPrice

	priceBlock.attr('data-price',carPrice)
	priceBlock.html(number_format(carPrice,0,'',' ','р.'))
})

$(document).ready(function(){
	FillColorDiv('.car-color')
	FillAlpha($('.car-color.active').attr('data-color'))
	$('#car-tab-add [name="pack_ids[]"]').each(function(){
		if($(this).hasClass('checked'))
			$(this).click()
	})
})
