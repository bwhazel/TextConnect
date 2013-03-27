$(function(){

	$('.open_textbooks').on('change', function(){
		var data = {
			'section' : '499',
		};

		$.ajax({
			url: '../Open-Textbooks/content/api.php',
			type: 'GET',
			data: data,
			dataType: 'json',
			success: function(data){
				loadForm(data);
			}
		});
	});

function loadForm(data){
	var items = [];
	$.each(data.data, function(i, data){
		 items.push('<option value="' + data.name + '">' + data.name + '</option>');
	});
	$('#name').html(items.join(''));	
}

});


