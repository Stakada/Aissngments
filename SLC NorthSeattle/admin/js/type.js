$(document).ready(function(){
	$('#addType').on('click',function(){
		var type = $('#type-name').val();
		if(type != ''){
			addType(type);
		}
	});
	
	$('#type-table-body').on('click','.btn',function(){
		var tt_id = $(this).attr('id');
		if(confirm('Are you sure to delete this type?')){
			deleteType(tt_id);
		}
	});

});

function addType(type){
	$.ajax({
		type:'POST',
		url:'../admin/controller/typeCntrl.php',
		data:{
			req:'add',
			type_name:type
		},
		success:function(){
			location.reload();
		}
	});
	
}

function deleteType(tt_id){
	$.ajax({
		type:'POST',
		url:'../admin/controller/typeCntrl.php',
		data:{
			req:'delete',
			tt_id:tt_id
		},
		success:function(){
			location.reload();
		}
	});
}
