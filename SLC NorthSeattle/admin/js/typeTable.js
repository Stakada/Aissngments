$(document).ready(function(){
	createTableType();	
});

function createTableType(){
	$.ajax({
		type:"POST",
		url:"../admin/controller/typeCntrl.php",
		data:{
			req:'load'
		},
		success:function(response){
			$.each(JSON.parse(response).TutorTypes,function(i,item){
				var num = i + 1;
				$('#type-table-body').append(
					"<tr scope='row' class='pb-1pt-1'>"+
						"<td>"+num+"</td>"+
						"<td>"+item['type']+" <button id="+ item['tt_id'] +" class='btn btn-danger  ml-3 right'>-</button></td>"+
					"</tr>"
				);
			});
		}
		
	});
}