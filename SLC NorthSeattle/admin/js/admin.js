$(document).ready(function(){
	load();
	$('#addAdmin').on('click',function(){
		var fname = $('#fname').val();
		var lname = $('#lname').val();
		var email = $('#email').val();
		var pass = $('#pass').val();
		if(fname != '' && lname != '' && email != '' && pass != '' ){
			add(fname, lname, email, pass);
		}
	});
	
	$("#admin-list").on('click','.btn',function(){
		var admin_id = $(this).attr('id');
		if(confirm('Are you sure to delete this administrator?')){
			deleteAdmin(admin_id);
		}
	});
});

function load(){
	$.ajax({
		type:'GET',
		url:'../admin/controller/adminCntrl.php',
		data:{
			req:'load'
		},
		success:function(response){
			$.each(JSON.parse(response).Admins, function(i, item){
				var num = i + 1;
				$('#admin-table-body').append(
					"<tr class='pb-1 pt-1'>"+
					"<td>"+num+"</td>"+
					"<td>"+item['FirstName']+"</td>"+
					"<td>"+item['LastName']+"</td>"+
					"<td>"+item['Email']+
						"<button id="+ item['admin_id']+" class='btn btn-danger ml-2'> - </button></td>"+
					+"<tr>"
				);
			});
		}
	});
}

function add(fname, lname, email, pass){
	$.ajax({
		type:'GET',
		url:'../admin/controller/adminCntrl.php',
		data:{
			req:'add',
			FirstName:fname,
			LastName:lname,
			email:email,
			password:pass
		},
		success:function(res){
			
		}
	});
}
		   
		
function deleteAdmin(admin_id){
		$.ajax({
			type:'GET',
			url:'../admin/controller/adminCntrl.php',
			data:{
				req:'delete',
				admin_id:admin_id
			},
			success:function(){
				location.reload();
			}
		});
}