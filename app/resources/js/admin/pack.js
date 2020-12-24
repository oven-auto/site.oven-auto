

$(document).on('change','#pack-edit [name="brand_id"]',function(){
	var urlMark = $(this).attr('data-url-mark')
	var urlOption = $(this).attr('data-url-option')
	var parameters = {}
	parameters.brand_id = $(this).val()
	var block = $(document).find('#pack-edit .mark-container')
	getRender(urlMark,parameters,block)

	var blockOption = $(document).find('.option-container')
	getRender(urlOption,parameters,blockOption)
})

$(document).on('change','.option-container input',function(){
	var me = $(this)
	var label = me.closest('label')
	if(me.prop('checked'))
		label.addClass('fillblack')
	else
		label.removeClass('fillblack')
})

$(document).on('click','#pack-option-button',function(){
	var url = $(this).attr('data-url')
	parameters = {}
	var modal = $(document).find('.modal')
	var pastInto = modal.find('.modal-body')
	
	axios.post(url,parameters).then(function(response){
		if(response.data.status==1)
			pastInto.html(response.data.view)
		var mas = $('.option-filter').val().split(',')	
		mas.forEach(function(item,i){
			var itemCheck = modal.find('[value="'+item+'"]')
			if(itemCheck.jquery)
				itemCheck.prop('checked','checked')
		})
		modal.modal('show')
	}).catch(function(error){
		console.log(error)
	})	
})

window.setHiddenOptionIds = function(){
	if($('.modal').jquery)
	{
		var str = ''
		var mas = []
		$('.modal [name="option_ids[]"]').each(function(){
			if($(this).prop('checked'))
				mas.push($(this).val())
		})
		str = mas.join(',')

		$('.option-filter').val(str)
	}
}

$(document).on('change','.modal [name="option_ids[]"]',function(){
	setHiddenOptionIds()
})

$(document).on('click','.unset-checkbox',function(){
	var unsetElems = $(document).find('.'+$(this).attr('data-unset'))
	if(unsetElems.jquery)
	{
		unsetElems.prop('checked',false)
		unsetElems.closest('label').removeClass('fillblack')
	}
	setHiddenOptionIds()
})