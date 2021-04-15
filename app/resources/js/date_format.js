window.date_format = function(date,format){
	var day = String(date.getDate())
	var month = String(date.getMonth()+1)
	var year = String(date.getFullYear())
	if(month.length<2)
		month='0'+month
	format = format.replace('dd',day)
	format = format.replace('mm',month)
	format = format.replace('yyyy',year)
	return format
	// format = format.replace(/[^a-zA-z0-9]/g,'-')
	// format = format.split('-')
	// var formatDate = []
	// format.forEach(function(item,i){
	// 	if(item=='yyyy')
	// 		formatDate.push(year)
	// 	if(item=='mm')
	// 		formatDate.push(month)
	// 	if(item=='dd')
	// 		formatDate.push(day)
	// })
	// formatDate = formatDate.join('-')
	// console.log(formatDate)
}