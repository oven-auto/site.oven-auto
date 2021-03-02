$(document).ready(function(){
	FillColorDiv('.color-btn')
	$(document).on('click','.color-control span', function(){
		var url = $(this).parent().attr('data-url')
		url+=$(this).attr('data-color-id')
		
		axios.get(url).then(function(response){
			if(response.data.status == 1)
			{
				$('.color-img img').attr('src',response.data.img)
				$('.color-name').html(response.data.name)
			}
			else
				alert('Изображение отсутствует')
		}).catch(function(error){
			console.log(error)
			alert('Изображение отсутствует')
		})
	})
})