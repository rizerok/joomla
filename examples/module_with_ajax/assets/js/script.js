//jQuery
$(document).ready(function(){
$.ajax({
	type: 'GET',
	dataType: 'json',
	url: 'url page\'s',
	data: {
	option: 'com_ajax',
	module: 'module_with_ajax',
	format: 'json',
	},
	success: function(response) {
		alert(response);
	}
});
});//ready