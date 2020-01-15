$(function(){
	$('#area').on('change', selectOption);
});

function selectOption(){
	var areaId = $(this).val();
	
	//ajax
	$.get('/api/area/'+areaId+'/cargos', function(data) {
		var html_select='<option selected value="" disabled>Seleccione un cargo</option>';
		for (var i=0; i<data.length; i++)
			html_select += '<option value="'+data[i].id+'">'+data[i].nombreCargo+'</option>';
		//console.log(html_select);
		$('#cargo').html(html_select);
	});
}