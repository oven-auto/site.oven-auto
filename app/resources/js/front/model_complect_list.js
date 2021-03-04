$(document).ready(function(){
	$(document).on('click','.model-complect-control',function(){
		var me = $(this)
		var url_complect = me.attr('data-url-complect')
		var url_cars = me.attr('data-url-cars')
		var block = me.parent().find('.model-complect-content')
		var block_desc = me.parent().find('.model-complect-description')
		var block_cars = me.parent().find('.model-complect-cars')
		var condition = me.attr('data-condition')
		if(condition=="0")
		{
			block.removeClass('d-none')
			getRender(url_cars,'',block_cars,'get')
			getRender(url_complect,'',block_desc,'get')
			me.attr('data-condition',1)
			me.find('.model-complect-open').removeClass('fa-angle-down').addClass('fa-angle-up')
			me.addClass('fill-grey')
		}
		else{
			block.addClass('d-none')
			me.attr('data-condition',0)
			me.find('.model-complect-open').removeClass('fa-angle-up').addClass('fa-angle-down')
			me.removeClass('fill-grey')
		}
	})
})