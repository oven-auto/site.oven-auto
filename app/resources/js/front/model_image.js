$(document).ready(function(){
	FillColorDiv('.color-btn')
	$(document).on('click','.color-btn', function(){
		var url = $(this).parent().attr('data-url')
		url+=$(this).attr('data-color-id')
		$('.color-btn').removeClass('active')
		$(this).addClass('active')
		axios.get(url).then(function(response){
			if(response.data.status == 1)
			{
				$('.color-img img').attr('src',response.data.img)
				$('.color-name').html(response.data.name+'<div>(Автомобиль на эскизе может отличаться от реального)</div>')
			}
			else
				alert('Изображение отсутствует')
		}).catch(function(error){
			console.log(error)
			alert('Изображение отсутствует')
		})
	})
})