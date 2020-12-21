function fillPreviewColor()
{
	var mas = []
	$('input[type="color"]').each(function(i,item){
		if($(this).val()!='')
			mas.push($(this).val())
	})

	var str = ''
	if(mas.length==1)
	{
		str = mas[0]
	}
	else if(mas.length==2)
	{
		str = 'linear-gradient(to bottom,'+mas[0]+' 50%,'+mas[1]+' 50%)'
	}
	
	$('.color-preview').css({'background':str})
}

window.FillColorDiv = function(selector){
	$(selector).each(function(){
		var colorStr = $(this).attr('data-color')
		var colorMas = colorStr.split(',')
		var str = ''
		if(colorMas.length==1)
		{
			str = colorMas[0]
		}
		else if(colorMas.length==2)
		{
			str = 'linear-gradient(to bottom,'+colorMas[0]+' 50%,'+colorMas[1]+' 50%)'
		}
		
		$(this).css({'background':str})
	})
}

$(document).on('click','.append-color',function(){
	if($('.append-color').length==1)
	{
		var newColor = $(this).closest('.item-color').clone()
		newColor.find('input').val('#ffffff')
		newColor.find('.shift-color').removeClass('btn-dark').addClass('btn-danger').removeAttr('disabled')
		$('.colors').append(newColor)
		fillPreviewColor()
	}

})

$(document).on('click','.shift-color',function(){
	$(this).closest('.item-color').remove()
	fillPreviewColor()
})


$(document).on('change','input[type="color"]',function(){
	fillPreviewColor()
})

$('.color-preview').ready(function(){
	fillPreviewColor()
})

$('.color-pic').ready(function(){
	$('.color-pic').each(function(){
		var colorStr = $(this).attr('data-color')
		var colorMas = colorStr.split(',')
		var str = ''
		if(colorMas.length==1)
		{
			str = colorMas[0]
		}
		else if(colorMas.length==2)
		{
			str = 'linear-gradient(to bottom,'+colorMas[0]+' 50%,'+colorMas[1]+' 50%)'
		}
		
		$(this).css({'background':str})
	})
})