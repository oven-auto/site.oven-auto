/*
	section 
	1 = скидка
	2 = Подарок
	3 = Сервис
	4 = Акция
	5 = Продукт
	6 = Уведомение
*/

$(document).ready(function(){
	toOneHeight('.company-block',60)

	var icon = '<i class="fa fa-check"></i>'

	$(document).on('click','.company-block', function(){
		var me = $(this)
		var checkboxButton = me.find('.company-checkbox')
		var input = me.find('input')

		if(input.prop('checked')==true)
		{
			input.prop('checked',false)
			checkboxButton.html('')
			removeDisabledClass(me)
		}
		else
		{
			input.prop('checked',true)
			checkboxButton.html(icon)
			addDisabledClass(me)
		}

		getOfferFromCheckedCompany()

	})

	function addDisabledClass(click_company)
	{
		if(click_company.hasClass('company-main'))
		{
			$(document).find('.company-block').each(function(){
				if($(this).hasClass('company-mortal') && click_company.attr('data-company-id') != $(this).attr('data-company-id'))
				{
					$(this).addClass('company-disabled')
					$(this).find('.company-checkbox').html('')
					$(this).find('input').prop('checked',false)
				}
			})
		}
	}

	function removeDisabledClass(click_company)
	{
		if(click_company.hasClass('company-main'))
		{
			$(document).find('.company-block').each(function(){
				if($(this).hasClass('company-mortal') && click_company != $(this))
				{
					$(this).removeClass('company-disabled')
					$(this).find('.company-checkbox').html('')
					$(this).find('input').prop('checked',false)
				}
			})
		}
	}

	//отрисовка в чек
	function getOfferFromCheckedCompany()
	{
		var mas = []
		var basePrice = $('.base-price').attr('data-base')
		var packsPrice = $('.packs-price').attr('data-packs')
		var optionPrice = $('.option-price').attr('data-option')
		var total = parseInt(basePrice)+parseInt(packsPrice)+parseInt(optionPrice)

		$(document).find('.company-block').each(function(){			
			var me = $(this)
			var checkbox = me.find('input')
			var offer = me.find('.company-offer').text()
			var value = me.attr('data-value');
			var title = me.closest('.row').find('.block-title').text()
			var section = me.attr('data-company-section')
			if(checkbox.prop('checked')==true)
				mas.push({offer:offer,value:value,title:title,section:section})
		})	

		$('.company-description').html('')
		var title = ''
		mas.forEach(function(item,i){
			if(title != item.title)
			{
				title = item.title
				$('.company-description').append('<div class="row  border-bottom-dotted"><div class="col-6 px-0">'+item.title+'</div><div class="col-6 px-0 text-right">'+number_format(sectionSum(mas,title),0,'',' ')+' руб.</div></div>')
			}
			item.value = item.value.replace(/['"]+/g, '')
			var appended = '<div class="row"><div class="col-8 px-0">'+item.offer+'</div><div class="col-4 px-0 text-right">'+number_format(item.value,0,'',' ')+' руб.</div></div>'
			$('.company-description').append(appended)
		})
		$('.company-description').append('<div class="row"><div class="col text-right px-0 block-title pt-3">'+number_format(total+sectionSum(mas),0,'',' ')+' руб.</div></div>')
	}

	//получить сумму выбраных акций, если поиск есть то считает сумму только в такой секции
	function sectionSum(mas,search='')
	{
		var sum = 0
		mas.forEach(function(item,i){
			if(item.title == search && search != '')
			{
				if(item.section == 1 || item.section == 2 || item.section == 4)
					sum-=parseInt(item.value.replace(/['"]+/g, ''))
				else
					sum+=parseInt(item.value.replace(/['"]+/g, ''))
			}

			if(search == '')
			{
				if(item.section == 1 || item.section == 2 || item.section == 4)
					sum-=parseInt(item.value.replace(/['"]+/g, ''))
				else
					sum+=parseInt(item.value.replace(/['"]+/g, ''))
			}
		})	
		return sum
	}

	$(document).scroll(function(){
		var currentTop = $(this).scrollTop()
		var block = $('.company-calculator')
		var width = block.parent().width()
		var area = $('.company-content')
		var offsetTop = area.offset().top
		var offsetLeft = area.offset().left
		var maxDownPoint = offsetTop+area.height()-block.height()-30
		block.css({'width':width+'px'})
		if(currentTop>offsetTop)
			block.addClass('fixed-calc')
		if(currentTop<offsetTop)
			block.removeClass('fixed-calc')
		if(currentTop>maxDownPoint)
			block.removeClass('fixed-calc')

	})
})
