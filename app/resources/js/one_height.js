window.toOneHeight = function (separator, subHeight = 0){
	var max = 0
	$(document).find(separator).each(function(){
		if($(this).height()>max)
			max = $(this).height()
	})
	if(subHeight)
		max += subHeight
	$(document).find(separator).height(max)
}

