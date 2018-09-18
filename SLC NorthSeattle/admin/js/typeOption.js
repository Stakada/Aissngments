$(document).ready(function(){
	loadType();
	
});

function loadType(){
	$.ajax({
		type:"GET",
		url:"../admin/controller/typeCntrl.php",
		data:{
			req:'load'
		},
		success:function(response){
			$.each(JSON.parse(response).TutorTypes,function(i,item){
				$('<option>').addClass(item['tt_id']).html(item['type']).appendTo('#type');
			});
		}
		
	});
}