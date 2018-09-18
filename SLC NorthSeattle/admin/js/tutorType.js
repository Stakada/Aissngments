$(document).ready(function(){
	$.ajax({
		type:'GET',
		url:'../admin/model/type.php',
		success:function(response){
			$.each(JSON.parse(response), function(i,item){
				
				$('.tutorType').append(
					$('<option>').html(item)
				);
			});
		}
		
		
	});
});	


