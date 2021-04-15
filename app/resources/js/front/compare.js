$(document).ready(function(){
	toOneHeight('.compare-img')
	toOneHeight('.compare-car-info')

	$('.compare-name').find('.compare-option').each(function(){
		toOneHeight('.compare-option[data-id="'+$(this).attr('data-id')+'"]')
	})



})