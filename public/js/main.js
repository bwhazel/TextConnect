/* 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Title : main.js
Author : Bobby Hazel
Description : main js file for TextConnect
 - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
*/

$(function(){

var campus_data = {};
	// Detects changes for Open-Textbooks API
	$.ajax({
		url: '../Open-Textbooks/content/api.php',
		type: 'GET',
		data: {'placeholder' : ''},
		dataType: 'json',
		success: function(data){

			$('#school').select2({
				data:{ results: data.data, text: function(item) {return item.name; } },
    			formatSelection: format,
    			formatResult: format,
    			allowClear: true,
    			placeholder: 'Select A School',
    		});

			$('#school').on('change', function(){

				$('#school-loading').html('<i class="icon-spinner icon-spin"></i>');

				delete campus_data['term'];
				delete campus_data['division'];
				delete campus_data['department'];
				delete campus_data['course'];
				delete campus_data['section'];
				
				var campus_id = $('#school').val(); ; 
				if(isNaN(campus_id))
				{
					alert('Please choose a school from the list provided');
				}
				else{			
					campus_data['campus'] = campus_id;
					loadTerms(campus_data);
				}
			});
		}
	});

	function loadTerms(campus_data){
		$.ajax({
			url: '../Open-Textbooks/content/api.php',
			type: 'GET',
			data: campus_data,
			dataType: 'json',
			success: function(data){

				$('#school-loading').html('')

				$('#term-select2').removeClass('select2-hidden');

				$('#term').select2({
					data:{ results: data.data, text: function(item) {return item.name; } },
	    			formatSelection: format,
	    			formatResult: format,
	    			allowClear: true,
	    			placeholder: 'Select A Term',
	    		});

	    		$('#term').on('change', function(){	

	    			$('#term-loading').html('<i class="icon-spinner icon-spin"></i>');

					delete campus_data['division'];
					delete campus_data['department'];
					delete campus_data['course'];
					delete campus_data['section'];

					var campus_id = $('#term').val(); ; 

					if(isNaN(campus_id))
					{
						alert('Please choose a term from the list provided');
					}
					else{	
						campus_data['term']=campus_id;
						loadDivision(campus_data);
					}
				});
			}
		});
	}

	function loadDivision(campus_data){
		$.ajax({
			url: '../Open-Textbooks/content/api.php', 
			type: 'GET',
			data: campus_data,
			dataType: 'json',
			success: function(data){

				if(data.data[0]['name'] == null)
				{
					campus_data['division'] = data.data[0]['id'];
					loadDepartment(campus_data);
				}
				else
				{
					$('#term-loading').html('');

					$('#division-select2').removeClass('select2-hidden');
					$('#division').select2({
						data:{ results: data.data, text: function(item) {return item.name; } },
		    			formatSelection: format,
		    			formatResult: format,
		    			allowClear: true,
		    			placeholder: 'Select A Division',
	    			});

		    		$('#division').on('change', function(){

		    			$('#division-loading').html('<i class="icon-spinner icon-spin"></i>');
		    			delete campus_data['division'];
						delete campus_data['course'];
						delete campus_data['section'];
						var campus_id = $('#division').val();

						if(isNaN(campus_id))
						{
							alert('Please choose a division from the list provided');
						}
						else
						{	
							campus_data['division']=campus_id;
							loadDepartment(campus_data);
						}
					});
				}
				
			}
		});
	}

	function loadDepartment(campus_data){
		$.ajax({
			url: '../Open-Textbooks/content/api.php',
			type: 'GET',
			data: campus_data,
			dataType: 'json',
			success: function(data){

				$('#term-loading').html('');
				$('#division-loading').html('');

				$('#department-select2').removeClass('select2-hidden');

				$('#dept').select2({
					data:{ results: data.data, text: function(item) {return item.name; } },
	    			formatSelection: format,
	    			formatResult: format,
	    			allowClear: true,
	    			placeholder: 'Select A Department',
	    		});

	    		$('#dept').on('change', function(){

	    			$('#dept-loading').html('<i class="icon-spinner icon-spin"></i>');
	
	    			delete campus_data['course'];
					delete campus_data['section'];

					var campus_id = $('#dept').val(); ; 

					if(isNaN(campus_id))
					{
						alert('Please choose a department from the list provided');
					}
					else
					{	
						campus_data['dept']=campus_id;
						loadCourse(campus_data);
					}
				});
			}
		});
	}

	function loadCourse(campus_data){
		$.ajax({
			url: '../Open-Textbooks/content/api.php',
			type: 'GET',
			data: campus_data,
			dataType: 'json',
			success: function(data){

				$('#dept-loading').html('');

				$('#course-select2').removeClass('select2-hidden');

				$('#course').select2({
					data:{ results: data.data, text: function(item) {return item.name; } },
	    			formatSelection: format,
	    			formatResult: format,
	    			allowClear: true,
	    			placeholder: 'Select A Course',
	    		});

	    		$('#course').on('change', function(){	

	    			$('#course-loading').html('<i class="icon-spinner icon-spin"></i>');	
	    			delete campus_data['section'];

					var campus_id = $('#course').val(); ; 

					if(isNaN(campus_id))
					{
						alert('Please choose a department from the list provided');
					}
					else
					{	
						campus_data['course']=campus_id;
						loadSection(campus_data);
					}
				});
			}
		});
	}

	function loadSection(campus_data){
		$.ajax({
			url: '../Open-Textbooks/content/api.php',
			type: 'GET',
			data: campus_data,
			dataType: 'json',
			success: function(data){

				$('#course-loading').html('');

				$('#section-select2').removeClass('select2-hidden');

				$('#section').select2({
					data:{ results: data.data, text: function(item) {return item.name; } },
	    			formatSelection: format,
	    			formatResult: format,
	    			allowClear: true,
	    			placeholder: 'Select A Course',
	    		});

	    		$('#section').on('change', function(){	

	    			$('#section-loading').html('<i class="icon-spinner icon-spin"></i>');

					var campus_id = $('#section').val(); ; 

					if(isNaN(campus_id))
					{
						alert('Please choose a department from the list provided');
					}
					else
					{	
						campus_data['section']=campus_id;
						loadBooks(campus_data);
					}
				});
			}
		});
	}

	function loadBooks(campus_data){
		$.ajax({
			url: '../Open-Textbooks/content/api.php',
			type: 'GET',
			data: campus_data,
			dataType: 'json',
			success: function(data){

				alert(JSON.stringify(data));
				
			}
		});
	}

	function format(item){ 
		return item.name; 
	};

	function pushToAry(name, val) {
	   var obj = {};
	   obj[name] = val;
	   campus_data.push(obj);
	};

	function startLoad(input){
		$(input).addClass('loading');
	}

	function endLoad(input){
		$(input).removeClass('loading');
	}

			
		/* OLD METHOD

			var schools = [];

			$.each(data.data, function(i, obj){
					schools.push('' + [obj.name] + '');
			});

			$('#school').typeahead({source : schools, minLength : 2});

			$.each( data.data, function(i, obj) {
  					if (obj.name === $('#school').val()){
  						campus_id = obj.id;
  					} 
				});
			*/



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


