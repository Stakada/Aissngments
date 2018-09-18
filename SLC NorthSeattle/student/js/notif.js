$(document).ready(function(){
	loadNotif();
});


function loadNotif(){
	$.ajax({
		type:"POST",
		url:"../controller/notification.php",
		success:function(response){
			$.each(JSON.parse(response).Notification, function(i, item){
				$("<li>" + item['notif'] + "</li>").appendTo(".notif");
			});
		}
	})
}