//Получить и отрисовать форму расчёта взависимости от сценария
$(document).on('change','[name="scenario_id"]',function(){
	var url = $(this).attr('data-url')+'?scenario_id='+$(this).val()
	axios.get(url).then(function(response){
		$('.callculate-company').html(response.data.view)	
	}).catch(function(error){
		console.log(error)
	})
})
//удалить условие
$(document).on('click','.cars-set-delete',function(){
	var me = $(this)
	var mainContainer = me.closest('.cars_set')
	var deleteContainer = me.closest('.container')
	if(mainContainer.find('.container').length>1)
		deleteContainer.remove()
	else
		mainContainer.find('input,select').val('')
})
//добавить условие
$(document).on('click','.cars-set-add',function(){
	var me = $(this)
	var url = $(this).attr('data-url')
	axios.get(url).then(function(response){
		me.closest('.row').find('.cars_set').append(response.data.view)
	}).catch(function(error){

	})
})

$(document).on('click','.company-modal-options',function(){
	var me = $(this)
	var url = me.attr('data-url')
	axios.post(url).then(function(response){
		var modal = $('#bigModal')
		modal.find('.modal-body').html(response.data.view)
		modal.addClass('company-modal')
		modal.modal('show')
	}).catch(function(error){
		console.log(error)
	})
})

$(document).on('change','.company-modal [type="checkbox"]',function(){
	var options = []
	$('.company-modal [type="checkbox"]').each(function(){
		if($(this).prop('checked'))
		{
			var id = $(this).val()
			options.push({'id':id})
		}
	})
	$('#nomenklatures').val(JSON.stringify(options))
	var strArr = []
	options.forEach(function(item,i){
		strArr.push(item.name)
	})
	$('.select-options-view').html(strArr.join(', '))
})