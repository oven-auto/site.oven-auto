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

//Получение палитры цветов по бренду
$(document).on('click','#get-color',function(){
	var modal = $('#bigModal')
	var parameters = {}
	parameters.brand_id = $('[name="brand_id"]').val()

	var url = $(this).attr('data-url')
	axios.post(url,parameters).then(function(response){
		modal.find('.modal-body').html(response.data.view)
		modal.modal('show')
	}).catch(function(error){
		console.log(error)
	})
})

