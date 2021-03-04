window.getRender = function(url,parameters,pastInto,method="post"){
	pastInto.html('<div class="text-center py-5"><i class="fa fa-spinner wait-ajax"></i></div>')
	if(method=="post")
	{
		axios.post(url,parameters).then(function(response){
			if(response.data.status==1)
				pastInto.html(response.data.view)
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
				pastInto.html(response.data.view)
			else
				console.log('Ничего не нашлось')
		}).catch(function(error){
			console.log(error)
		})
	}
}