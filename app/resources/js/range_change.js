$(document).on('input change','[type="range"]',function(){
	$(this)
		.closest('.range-block')
		.find('.range-value')
		.html($(this).val())
})