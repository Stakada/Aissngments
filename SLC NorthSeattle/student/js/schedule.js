$(document).ready(function(){
	$('#type').on('change',function(){
		generateTable($('#type option').filter(':selected').text());
	});
	//var table = $(".tableMath");
	//var center = table.attr('id');
	
});

function generateTable(center){
	$('.table-body').empty();
	$.ajax({
		type:"POST",
		url:'../controller/tutor.php',
		data:{
			center:center
		},
		success:function(response){
			//var tutors =  $.parseJSON(response);
			$.each($.parseJSON(response).Tutor,function(i, item){
				
				var num = i+1;
				$('.table-body').append(
					"<tr class = 'tbody-tr'>" + 
						'<th scope="row">' + num + '</th>' +
						'<td>' + item['FirstName'] + '</td>' +
						'<td>' + item['LastName'] + '</td>' +
					'</tr>'					   
				);
			
			});
		}
	});
}