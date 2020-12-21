//ИЗМЕНЕНИЕ СОРТИРОВКИ МОДЕЛИ AJAX`ОМ`
$(document).on('change','.sort-control',function(){
	
	var param = {'sort':$(this).val()}
	var url = $(this).attr('data-url')
	
	axios.put(url,param).then(function(response){
		console.log(response.data)
	}).catch(function(error){
		console.log(error)
	})
})

//ИЗМЕНЕНИЕ СТАТУСА МОДЕЛИ AJAX`ОМ
$(document).on('change','.status-control',function(){
	var param = {}
	if ($(this).is(':checked'))
		param.status = 1
	else 
		param.status = 0
	var url = $(this).attr('data-url')

	axios.put(url,param).then(function(response){
		console.log(response.data)
	}).catch(function(error){
		console.log(error)
	})
})


window.setCheckedColor = function(){
	var input = $('.palette [name="colors_ids"]')
	var str = input.val()
	var masIds = str.split(',')
	masIds.forEach(function(val,key){
		$('.modal [data-color-id="'+val+'"]').addClass('checked-color')
	})
}


//Получение палитры цветов по бренду
$(document).on('click','#get-color',function(){
	var modal = $('#bigModal')
	var parameters = {}
	parameters.brand_id = $('[name="brand_id"]').val()
	var url = $(this).attr('data-url')
	axios.post(url,parameters).then(function(response){
		modal.find('.modal-body').html(response.data.view)
		FillColorDiv('.color-pic')
		setCheckedColor()
		modal.modal('show')
	}).catch(function(error){
		console.log(error)
	})
})

$(document).on('click','.modal .color-check',function(){
	console.log('click')
	var input = $('.palette [name="colors_ids"]')
	var str = input.val()
	var masIds = str.split(',')
	var pressedId = $(this).attr('data-color-id')

	if(masIds.includes(pressedId))
	{
		masIds.splice(masIds.indexOf(pressedId),1)
		$(this).removeClass('checked-color')
		$('.palette [data-color-id="'+pressedId+'"]').remove()
		console.log('delete')
	}
	else
	{
		masIds.push(pressedId)
		$(this).addClass('checked-color')
		console.log('add')
	}

	var checkedColors = $(document).find('.modal .checked-color').clone().addClass('col-2').removeClass('border')
	var colorContent = $('.palette .color-content')
	
	colorContent.html(checkedColors)
	input.val(masIds.join())
})

