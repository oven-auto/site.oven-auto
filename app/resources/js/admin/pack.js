window.getRender = function(url,parameters,pastInto){
	axios.post(url,parameters).then(function(response){
		if(response.data.status==1)
			pastInto.html(response.data.view)
			//console.log(response.data.view)
		else
			console.log('Ничего не нашлось')
	}).catch(function(error){
		console.log(error)
	})
}

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