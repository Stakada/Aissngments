$(document).ready(function(){
	$.ajax({
		type:"GET",
		url:"../controller/type.php",
		success:function(response){
			$.each(JSON.parse(response).TutorTypes,function(i,item){
				$('<option>').addClass(item['tt_id']).html(item['type']).appendTo('#type');
			});
		}
		
	});
	
	
	
});