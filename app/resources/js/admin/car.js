window.FillAlpha = function(data_id){
	$('.alpha-back img').addClass('d-none')
	$('.alpha-back [data-color-id="'+data_id+'"]').removeClass('d-none')
}

function changePrice(){
	var priceBlock = $('.car-price')
	var carPrice = Number.parseInt(priceBlock.attr('data-price'))
	var selectPack = 0
	$(document).find('.car-pack').each(function(){
		if($(this).prop('checked'))
			selectPack+=Number.parseInt($(this).attr('data-price'))
	})

	var totalPrice = carPrice+selectPack+changePriceWithOption()
	priceBlock.html(number_format(totalPrice,0,'',' ','р.'))
}

function changePriceWithOption()
{
	var priceBlock = $('.car-price')
	var carPrice = Number.parseInt(priceBlock.attr('data-price'))
	var optionPrice = parseInt($('[name="option_price"]').val())
	if(optionPrice=='')
		optionPrice=0
	if(Number.isInteger(optionPrice))
		return optionPrice
	else return 0
}

//Клик по селекту бренда
$(document).on('change','#car-tab-add [name="brand_id"]',function(){
	var url = $(this).attr('data-url')
	var parameters = {}
	parameters.brand_id = $(this).val()
	var block = $('.car-mark-add')
	block.find('select').html('')
	$('[name="complect_id"]').html('')
	getRender(url,parameters,block)

	var block = $('#additional')
	var url = $(this).attr('data-url-option')
	getRender(url,parameters,block)
})

//Клик по селекту модели
$(document).on('change','#car-tab-add [name="mark_id"]',function(){
	var url = $(this).attr('data-url-complect')
	parameters = {}
	parameters.mark_id = $(this).val()
	var block = $('.car-complect-add')
	block.find('select').html('')
	$('[name="complect_id"]').html('')
	getRender(url,parameters,block)
	console.log('car')
})

//клик по селекту комплектации
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

//click по иконке цвета
$(document).on('click','.car-color',function(){
	var text = $('.color-name')
	text.html($(this).attr('data-code'))
	FillAlpha($(this).attr('data-id'))
	$('.car-color').removeClass('active')
	$(this).addClass('active')
	$('#car-tab-add [name="color_id"]').val($(this).attr('data-id'))
	var url = $(this).attr('data-url')
	var parameters = {complect_color_id:$(this).attr('data-complect-color')}
	axios.post(url,parameters).then(function(response){
		$(document).find('.colored-pack').prop('checked',false)
		
		if(response.data.status==1)
			response.data.packs_ids.forEach(function(item,i){
				var obj = $(document).find('.car-pack[data-pack-id="'+item+'"]')
				obj.prop('checked',true)
			})
		changePrice()
	}).catch(function(error){

	})
})

//включение выключение опции
$(document).on('change','#car-tab-add [name="pack_ids[]"]',function(){
	var priceBlock = $('.car-price')
	var carPrice = Number.parseInt(priceBlock.attr('data-price'))
	changePrice()
})



$(document).on('click','.add-provision',function(){
	var newDetail = $('.provision-details .default').clone()
	newDetail.find('input').val('')
	newDetail.removeClass('default')
	newDetail.find('.input-group-prepend').remove()
	$('.provision-details').append(newDetail)	
})

$(document).on('change','.provision_day, .provision_date',function(){
	var pBlock = $(this).closest('.row')
	var pDay = pBlock.find('.provision_day')
	var pDate = pBlock.find('.provision_date')
	var receiptDate = new Date($('[name="receipt_date"]').val())

	if($(this).hasClass('provision_day')){
		receiptDate.setDate(receiptDate.getDate() + parseInt(pDay.val()) )
		pDate.val(date_format(receiptDate,'yyyy-mm-dd'))
	}
	else if($(this).hasClass('provision_date')){
		var currentInputDate = new Date(pDate.val())
		var dif = currentInputDate-receiptDate
		dif = dif/1000/60/60/24
		pDay.val(dif)
	}
})

$(document).on('input','[name="option_price"]',function(){
	changePrice()
})



$(document).ready(function(){
	FillColorDiv('.car-color')
	FillAlpha($('.car-color.active').attr('data-id'))
	$('#car-tab-add [name="pack_ids[]"]').each(function(){
		if($(this).hasClass('checked'))
		{
			
			$(this).prop('checked',true)
			changePrice()	
		}
	})
})
