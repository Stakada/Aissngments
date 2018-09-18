$(document).ready(function(){
	loadType();
	
});

function loadType(){
	$.ajax({
		type:"POST",
		url:"../tutor/controller/typeCntrl.php",
		success:function(response){
			$.each(JSON.parse(response).TutorTypes,function(i,item){
				$('<option>').addClass(item['tt_id']).html(item['type']).appendTo('#type');
			});
		}
		
	});
}