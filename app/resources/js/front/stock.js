$(document).ready(function(){
	var stock = $(document).find('.stock')
	var page = 2
	var status = 1
	const bottomOffset = 1500
	//Скролинг и подзагрузка
	$(window).scroll(function(){
		var currentScroll = $(this).scrollTop()

		if(stock instanceof Object && stock.length)
		{
			if(parseInt(currentScroll) > (document.body.clientHeight-bottomOffset) && status != 0)
			{	console.log(currentScroll)
				for(i = 1; i <= 10; i++)
					stock.append('<div class="text-center spiner py-5"><i class="fa fa-spinner wait-ajax"></i></div>')
				status = 0
				var me = $(this)
				var form = $('.stock-filter-form')
				var url = form.attr('action')
				var parameters = '?'+form.serialize()+'&page='+page
				url+=parameters
				axios.get(url).then(function(response){
					if(response.data.status=="1")
					{
						stock.find('.spiner').remove()
						if(page != parseInt(response.data.page) + 1)
						{
							page = response.data.page
							stock.append(response.data.view)
							status = 1
							
						}
					}
					else{
						stock.find('.spiner').remove()
					}
				}).catch(function(error){

				})				
			}

		}
	})

	//Клик по поиску
	$(document).on('click','.search',function(){
		var me = $(this)
		var form = me.closest('form')
		var url = form.attr('action')
		page = 1
		var parameters = '?'+form.serialize()+'&page='+page
		page = 2
		url+=parameters
		getRender(url,'',stock,'get',10)
		status = 1
	})
	//клик по очистить
	$(document).on('click','.clear',function(){
		var me = $(this)
		var form = me.closest('form')
		form[0].reset();
		form.find("[name='favorites']").val('')
		form.find('.show-favorite').attr('data-status',0)
		var url = form.attr('action')
		page = 1
		getRender(url,'',stock,'get',10)
		page = 2
		status = 1
	})

	$(document).on('click','.order',function(){
		var me = $(this)
		var form = me.closest('form')
		var submit = form.find('.search')
		var hidden = form.find('[name="order"]')
		hidden.val(me.attr('data-order'))
		
		submit.click()
	})

	$(document).on('click','.show-favorite',function(){
		var me = $(this)
		if(me.attr('data-status') == 0)
		{
			me.attr('data-status',1)
			var form = me.closest('form')
			form[0].reset();
			var favorites = form.find('[name="favorites"]')
			favorites.val(1)
			var url = form.attr('action')
			var block = $(document).find('.stock')
			page = 1
			var parameters = '?'+form.serialize()+'&page='+page
			url+=parameters			
			getRender(url,parameters,block,'get',10)
			page = 2
			status =1
		}
		else
		{
			me.attr('data-status',0)
			$('.clear').click()
		}
	})


})