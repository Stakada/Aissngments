$(document).ready(function(){
	createNotifTable();
	
	
	$('#addNotif').on('click',function(event){
		event.preventDefault();
		var notification = $('#notif').val();
		addNotif(notification);
	});
	
	
	$('#notif-table-body').on('click','.btn', function(){
		deleteNotif($(this).attr('id'));
	})
});

function createNotifTable(){
	$.ajax({
		type:'POST',
		url:'../admin/controller/notifCntrl.php',
		data:{
			req:'load'
		},
		success:function(response){
			$.each(JSON.parse(response).Notification, function(i, item){
				$('#notif-table-body').append(
					"<tr class='pb-1 pt-1'>"+	
					"<td id="+ item['notif_id'] +">"+item['notification'] + 
					"<button class='btn btn-danger ml-3 p-1' id="+ item['notif_id'] +">-</button></td>"+
					"</tr>"
				);
			});
		}
		
	});
}

function addNotif(notif){
	$.ajax({
		type:'POST',
		url:'../admin/controller/notifCntrl.php',
		data:{
			req:'add',
			notif:notif
		},
		success:function(){
			location.reload();	
		}
		
	})
}

function deleteNotif(notif_id){
	$.ajax({
		type:'POST',
		url:'../admin/controller/notifCntrl.php',
		data:{
			req:'delete',
			notif_id:notif_id,
		},
		success:function(){
			location.reload();
		}
		
	})
}