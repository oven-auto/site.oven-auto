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

