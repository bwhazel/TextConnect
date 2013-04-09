/* 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Title : main.js
Author : Bobby Hazel
Description : main js file for TextConnect
 - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
*/

$(function(){

	// Detects changes for Open-Textbooks API
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
				loadMultiSelect(data);
			}
		});
	});

	/*
	* Function: loadMultiSelect(data);
	* Accpets JSON to be parsed and placed into multiselect
	*/
	function loadMultiSelect(data){
		var items = [];
		$.each(data.data, function(i, data){
			 items.push('<option value="' + data.name + '">' + data.name + '</option>');
		});
		$('#name').html(items.join(''));	
	}

});


