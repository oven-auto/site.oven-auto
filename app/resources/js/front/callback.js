$(document).ready(function(){
	$(document).on('click','.send-btn',function(){
		
		var me = $(this)
		var form = me.closest('form')
		var url = form.attr('action')

		var parameters = {}
		var formInput = form.serializeArray()
		formInput.forEach(function(item,i){
			parameters[item.name] = item.value
		})


		parameters.url = document.location.href
			
		axios.post(url,parameters).then(function(response){

		}).catch(function(errors){

		})
	})
})