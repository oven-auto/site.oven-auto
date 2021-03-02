$(document).on('change','#complect-edit [name="brand_id"]',function(){
	var urlMark = $(this).attr('data-url-mark')
	var urlOption = $(this).attr('data-url-option')
	var urlMotor = $(this).attr('data-url-motor')
	var parameters = {}
	parameters.brand_id = $(this).val()

	var block = $(document).find('#complect-edit .mark-container')
	getRender(urlMark,parameters,block)

	var blockOption = $(document).find('.option-container')
	getRender(urlOption,parameters,blockOption)

	var blockMotor = $(document).find('.motor-container')
	getRender(urlMotor,parameters,blockMotor)

})

$(document).on('change','#complect-edit [name="mark_id"]',function(){
	$(this).removeAttr('multiple')
	var url = $(this).attr('data-url-pack')
	var parameters = {}
	parameters.mark_id = $('#complect-edit [name="mark_id"]').val()
	var block = $('#complect-edit .pack-container')
	getRender(url,parameters,block)
	var url = $(this).attr('data-url-complect')
	getRender(url,parameters, $('.color-container'))
})

$(document).on('change','.complect-table [name="complect-status"]',function(){
	var url = $(this).attr('data-url')
	var parameters = {}
	parameters.status = $(this).prop('checked') ? 1 : 0
	axios.put(url,parameters).then(function(response){
		if(response.data.status==1)
			alert(response.data.message)
	}).catch(function(error){
		console.log(error)
	})
})

$(document).on('click','.color-container img',function(){
	$(this).parent().find('[type="checkbox"]').click()
})