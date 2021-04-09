$(document).ready(function(){
	$(document).on('click','.send-btn',function(){
		
		var me = $(this)
		var form = me.closest('form')
		var url = form.attr('action')
		var modal = $('#main_modal')
		var modal_content = modal.find('.modal-body')
		var parameters = {}
		var formInput = form.serializeArray()
		formInput.forEach(function(item,i){
			parameters[item.name] = item.value
		})

		//Если это обсудить покупку то добираем доп параметры
		if(me.attr('data-type')=='sale')
		{
			var company_ids = []
			var packs = []
			if($(document).find('[name="hidden_vin"]').length > 0)
				parameters.vin = $('[name="hidden_vin"]').val()
			if($(document).find('[name="hidden_complect"]').length > 0)
			{
				parameters.complect = $('[name="hidden_complect"]').val()
				$(document).find('.color-btn').each(function(){
					if($(this).hasClass('active'))
						parameters.color_id = $(this).attr('data-color-id')
				})
				$(document).find('.config-pack').each(function(){
					if($(this).prop('checked')==true)
						packs.push($(this).val())
				})
				if(packs.length>0)
					parameters.pack_ids = packs;
			}


			$(document).find('[name="company_ids[]"]').each(function(){
				if($(this).prop('checked')==true)
					company_ids.push($(this).val())
			})
			parameters.company_ids = company_ids
		}

		parameters.url = document.location.href
		modal_content.html(cog())
		axios.post(url,parameters).then(function(response){
			if(response.data.view)
			{
				modal_content.html(response.data.view)
				modal.modal('show')
			}
		}).catch(function(errors){

		})
	})
})