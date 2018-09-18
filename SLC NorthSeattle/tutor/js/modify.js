$(document).ready(function(){
	$("#session").on('click',".btn",function(){
		//alert("Button is clicked");
        item = $(this);
        id = item.attr('id');
		modifySession(id, item.text());
    });
});


function modifySession(id, req){	
	$.ajax({
		type:"POST",
		url:"../tutor/model/modifySession.php",
		data:{id:id, request:req}
	})
}