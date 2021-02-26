window.getRender = function(url,parameters,pastInto){
	axios.post(url,parameters).then(function(response){
		if(response.data.status==1)
			pastInto.html(response.data.view)
		else
			console.log('Ничего не нашлось')
	}).catch(function(error){
		console.log(error)
	})
}