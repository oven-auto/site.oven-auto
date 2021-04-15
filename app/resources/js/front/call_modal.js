$(document).ready(function(){
	
	var modal = $('#main_modal')
	var modal_content = modal.find('.modal-body')

	$(document).on('click','.modal-btn',function(){
		var me = $(this)
		var url = me.attr('data-url')
		axios.get(url).then(function(response){
			modal_content.html(response.data.view)
			modal.modal('show')
		}).catch(function(errors){

		})
	})
})