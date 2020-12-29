$(document).on('change','#car-tab-add [name="brand_id"]',function(){
	var url = $(this).attr('data-url')
	var parameters = {}
	parameters.brand_id = $(this).val()
	var block = $('.car-mark-add')
	block.find('select').html('')
	$('[name="complect_id"]').html('')
	getRender(url,parameters,block)
})

$(document).on('change','#car-tab-add [name="mark_id"]',function(){
	var url = $(this).attr('data-url-complect')
	parameters = {}
	parameters.mark_id = $(this).val()
	var block = $('.car-complect-add')
	block.find('select').html('')
	$('[name="complect_id"]').html('')
	getRender(url,parameters,block)
})

$(document).on('change','#car-tab-add [name="complect_id"]',function(){
	var url = $(this).attr('data-url-carview')
	var parameters = {}
	parameters.complect_id = $(this).val()
	var block = $('#car-view')
	block.html('')
	axios.post(url,parameters).then(function(response){
		if(response.data.status==1)
			block.html(response.data.view)
		FillColorDiv('.car-color')
	}).catch(function(error){
		console.log(error)
	})
})

$(document).on('click','.car-color',function(){
	var back = $('.alpha-back')
	var text = $('.color-name')
	back.css({'background':$(this).attr('data-color')})
	text.html($(this).attr('data-code'))
	$('.car-color').removeClass('active')
	$(this).addClass('active')
	$('#car-tab-add [name="color_id"]').val($(this).attr('data-id'))
})