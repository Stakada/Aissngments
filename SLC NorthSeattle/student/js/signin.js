$(document).ready(function(){
    //when a user submit the login form 
	$('#signin').click(function(e){
        e.preventDefault();
        //create vars
		var sid = $('#sid').val();
		var errorMss = $("#errorMss");
		var rememberMe = $("#remember").prop('checked');
        
		var username = getUsername(sid);
		
		if(username != 'false'){
			if(confirm('Is this you? ' + username)){
				
				//Sign in
				var id = signin(sid);
				if(id == 'false'){
				   alert("Sign in refused");
				   
				}else{
					Cookies.set('id', id,{expires:1});	
					Cookies.set('loginStudent', 'login', {expires:1});
					
					window.location = "http://seton.northseattle.edu";
				}
				
			}else{
				alert("Log in refused");
			}	
		}else{
			alert("Please sign up first.");
			window.location = "http://seton.northseattle.edu/signup.html";
		}
	});
});


function getUsername(sid){
	var username;
	$.ajax({
		async:false,
		type:"POST",
		url:"../controller/signin.php",
		data:{
			sid:sid,
			req:'getUsername'
		},
		success:function(response){	
			username = response;
		}
	});
	
	return username.trim();
}

function signin(sid){
	var result;
	$.ajax({
		async:false,
		type:"POST",
		url:"../controller/signin.php",
		data:{
			sid:sid,
			req:'signin'
		},
		success:function(response){
			result = response;
		}
	});
	return $.trim(result);
}
