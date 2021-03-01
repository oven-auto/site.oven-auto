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


window.setCheckedColor = function(){
	var block = $('.color-content')
	block.find('.color-check').each(function(){
		$('.modal [data-color-id="'+$(this).attr('data-color-id')+'"]').addClass('checked-color')
	})
}


//Получение палитры цветов по бренду
$(document).on('click','#get-color',function(){
	var modal = $('#bigModal')
	var parameters = {}
	parameters.brand_id = $('[name="brand_id"]').val()
	var url = $(this).attr('data-url')
	axios.post(url,parameters).then(function(response){
		modal.find('.modal-body').html(response.data.view)
		FillColorDiv('.color-pic')
		setCheckedColor()
		modal.modal('show')
	}).catch(function(error){
		console.log(error)
	})
})

$(document).on('click','.modal .color-check',function(){
	var me = $(this)
	var colorId = me.attr('data-color-id')
	var block = $('.color-content')
	var isSet = block.find('[data-color-id='+colorId+']').length
	if(!isSet)
	{
		$('.modal [data-color-id="'+me.attr('data-color-id')+'"]').addClass('checked-color')
		var clone = me.clone()
			.addClass('col-3')
			.removeClass('border')
		clone.find('.color-pic').css({width:'20px',height:'20px'})
		clone.append('<img>'+
						'<div class="custom-file mt-2">'+
					    '<input type="file" class="custom-file-input model-img" name="colors_ids['+colorId+']">'+
					    '<label class="custom-file-label" for="validatedCustomFile">Укажите фаил</label>'+
					    //'<input type="hidden" name="hidden_ids['+colorId+']" value="'+colorId+'">'+
					'</div>')
		block.append(clone)
	}
	else
	{
		$('.modal [data-color-id="'+me.attr('data-color-id')+'"]').removeClass('checked-color')
		block.find('[data-color-id='+colorId+']').remove()
	}
})
$(document).on('change','.model-img',function(){
	me = $(this)
	var input = $(this)[0];
	if ( input.files && input.files[0] ) {
		if ( input.files[0].type.match('image.*') ) {
	  		var reader = new FileReader();
	  		reader.onload = function(e) { me.closest('.color-check').find('img').attr('src', e.target.result); }
	  		reader.readAsDataURL(input.files[0]);
		} else console.log('is not image mime type');
	} else console.log('not isset files data or files API not supordet');
})
