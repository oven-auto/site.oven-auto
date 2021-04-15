$(document).ready(function()
{
	var url = $('.sortable').attr('data-url')
	$( ".sortable" ).sortable({
		update: function( event, ui ) {
			var i = 0
			var parameters = []
			$('.zone').each(function(){
				$(this).attr('data-sort',++i)
				parameters.push(({
					id:$(this).attr('data-id'),
					sort:i
				}) ) 
			})
			
			var send = {}
			send.data = (parameters) 

			axios.put(url,send).then(function(response){
				if(response.data.status==1)
					alert(response.data.message)
			}).catch(function(error){
				console.log(error)
			})
		}
	});
})
