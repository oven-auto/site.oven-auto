window.getRender = function(url,parameters,pastInto,method="post",spiner_count=1){
	pastInto.html('')
	for(i = 1; i <= spiner_count; i++)
		pastInto.append('<div class="text-center py-5"><i class="fa fa-spinner wait-ajax"></i></div>')
	if(method=="post")
	{
		axios.post(url,parameters).then(function(response){
			if(response.data.status==1)
				pastInto.html(response.data.view)
			else
				pastInto.html(response.data.view)
		}).catch(function(error){
			console.log(error)
		})
	}
	else if(method=='get')
	{
		axios.get(url,parameters).then(function(response){
			if(response.data.status==1)
				pastInto.html(response.data.view)
			else
				pastInto.html(response.data.view)
		}).catch(function(error){
			console.log(error)
		})
	}
}

window.ajaxAppend = function(url,parameters,pastInto,method="post",spiner_count){
	for(i = 1; i <= spiner_count; i++)
		pastInto.append('<div class="text-center py-5 spiner"><i class="fa fa-spinner wait-ajax"></i></div>')
	if(method=="post")
	{
		axios.post(url,parameters).then(function(response){
			if(response.data.status==1)
			{
				pastInto.find('.spiner').remove()
				pastInto.append(response.data.view)
			}
			else
				console.log('Ничего не нашлось')
		}).catch(function(error){
			console.log(error)
		})
	}
	else if(method=='get')
	{
		axios.get(url,parameters).then(function(response){
			if(response.data.status==1)
			{
				pastInto.find('.spiner').remove()
				pastInto.append(response.data.view)
			}
			else
				console.log('Ничего не нашлось')
		}).catch(function(error){
			console.log(error)
		})
	}
}
