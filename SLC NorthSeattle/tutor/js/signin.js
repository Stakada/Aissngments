$(document).ready(function(){
    //when a user submit the login form 
	$('#signin').click(function(e){
		e.preventDefault();
        //create vars
		var sid = $('#sid').val();
		var errorMss = $("#errorMss");
		var rememberMe = $("#remember").prop('checked');
        
		var sid = checkSid(sid);
		
		if(sid != 'false'){
			//Sign in

			Cookies.set('tutorLogin', 'login', {expires:1});

			window.location = "http://seton.northseattle.edu/tutor/";
		
		}else{
			
			alert("SID doesn't exist. Please create your account first.");
			window.location ="http://seton.northseattle.edu/tutor/timekeeper.html"
		}
	});
});


function checkSid(sid){
	var sid;
	$.ajax({
		async:false,
		type:"POST",
		url:"../tutor/controller/signin.php",
		data:{
			sid:sid,
		},
		success:function(response){	
			sid = response;
		}
	});
	
	return sid.trim();
}

